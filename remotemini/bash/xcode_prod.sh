USER=$1
IDENTITY=$2
TARGET="gomobile001"
CONFIGURATION="Release"
USERDIR=/data/users/$USER

whoami
echo ========================
echo USER =  $USER;
echo USERDIR =  $USERDIR;
echo IDENTITY = $IDENTITY;
echo CONFIGURATION = $CONFIGURATION;
echo ========================


function deleteKeychain() {
    security delete-keychain xcodebuild.keychain
    security default-keychain -s login.keychain
}

function createKeychain() {
    security create-keychain -p 12qw12 xcodebuild.keychain
    security add-certificates -k xcodebuild.keychain /data/AppleWWDRCA.cer
    security unlock-keychain -p 12qw12 xcodebuild.keychain
    security import $USERDIR/prod.p12 -P 12qw12 -k xcodebuild.keychain -A
    security default-keychain -s xcodebuild.keychain
}

cp $USERDIR/prod.mobileprovision ~/Library/MobileDevice/Provisioning\ Profiles/
cd /data/$TARGET/


createKeychain;

xcodebuild -target "$TARGET" -configuration "$CONFIGURATION" CODE_SIGN_IDENTITY="$IDENTITY" OTHER_CODE_SIGN_FLAGS="--keychain xcodebuild.keychain" CONFIGURATION_BUILD_DIR="$USERDIR"
/usr/bin/xcrun -sdk iphoneos PackageApplication -v "$USERDIR/$TARGET.app" -o "$USERDIR/$TARGET.ipa" --embed "$USERDIR/prod.mobileprovision"

deleteKeychain;

exit