#settings
USER=$1;
PASSWORD=$2
P12=$3
MOB=$4

echo ========================
echo USER = $USER;
echo PASSWORD = $PASSWORD;
echo P12 = $P12;
echo MOB = $MOB;
echo ========================



security unlock-keychain -p 12qw12 $USER.keychain
security import $P12 -P $PASSWORD -k $USER.keychain -A
security add-certificates -k $USER.keychain /data/AppleWWDRCA.cer

#cp $MOB ~/Library/MobileDevice/Provisioning\ Profiles/
