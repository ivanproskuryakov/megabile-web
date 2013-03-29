<?php 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
require_once __DIR__.'/../silex/vendor/autoload.php'; 
$app = new Silex\Application(); 
$root = 'administrator';


//************************** install keychain

$app->get('/install/keychain/{user}/', function($user) use($app,$root) {
    $keychain = $user.'.keychain';
    $command = sprintf('sudo -u %s security list-keychains',$root); 
    $response = shell_exec($command);
    
    if (!strpos($response,$keychain )) {
        $command = sprintf('sudo -u %s security create-keychain -p 12qw12 %s',$root,$keychain); 
        shell_exec($command);
        
    } 
    
    $return = array();    
    $return['status'] = true;
    echo json_encode($return);
    exit();
});  
//security delete-certificate -c

//************************** check sertificate

$app->get('/check/sertificate/{user}/', function($user) use($app,$root) {
    $keychain = $user.'.keychain';
    $command = sprintf('sudo -u %s security find-certificate -a %s',$root,$keychain); 
    $response = shell_exec($command);
    
//    var_dump($response);
    $return = array();    
    $return['dev']['status'] = false;
    $return['prod']['status'] = false;
    
    if (strpos($response,'Developer')) {
        preg_match('/"alis"<blob>="iPhone Developer(.*?)"/s', $response, $identityDev);
        if ($identityDev[1]) {
            $return['dev']['status'] = true;
            $return['dev']['identity'] = 'iPhone Developer'.$identityDev[1];
        }
    } 
    if (strpos($response,'Distribution')) {
        preg_match('/"alis"<blob>="iPhone Distribution(.*?)"/s', $response, $identityProd);
        if ($identityProd[1]) {        
            $return['prod']['status'] = true;
            $return['prod']['identity'] = 'iPhone Distribution'.$identityProd[1];        
        } 
    } 
    
    echo json_encode($return);
    exit();
}); 

//************************** delete sertificate

$app->get('/delete/sertificate/{user}/{type}/', function($user,$type) use($app,$root) {
    $keychain = $user.'.keychain';
    
    if ($type == 'dev') $command = sprintf('sudo -u %s security find-certificate -a -Z -c "iPhone Developer" %s |grep SHA-1',$root,$keychain); 
    if ($type == 'prod') $command = sprintf('sudo -u %s security find-certificate -a -Z -c "iPhone Distribution" %s |grep SHA-1',$root,$keychain); 
    
    $sha = shell_exec($command);
    $sha = str_replace("SHA-1 hash: ", "", $sha);
    $command = sprintf('sudo -u %s security delete-certificate -Z %s %s',$root,$sha,$keychain); 
    $response = shell_exec($command);    
    
    $return = array();    
    $return['status'] = true;
    echo json_encode($return);
    exit();
}); 


//************************** install Sertificate DEV
$app->post('/install/sertificate/', function(Request $request) use($app,$root) {
    
    // VARS 
    $type = $request->get('type');
    $user = $request->get('user');
    $password = $request->get('password');
    $p12 = $request->get('p12');
    $mob = $request->get('mob');
    $type = $request->get('type');
    $userdir = '/data/users/'.$user;
    
    // CREATE    
    if (!is_dir($userdir))
    if (mkdir($userdir) ==  false) {
        $response['message'] = 'Unnable to create user directory';
        $response['status'] = false;
        echo json_encode($response);
        exit();        
    }
    
    $p12_filename = $userdir.'/'.$type.'.p12';
    $mob_filename = $userdir.'/'.$type.'.mobileprovision';
    file_put_contents($p12_filename, $p12);
    file_put_contents($mob_filename, $mob);
    
    $command = sprintf('sudo -u %s /data/bash/install.sh %s %s %s %s',$root,$user,$password,$p12_filename,$mob_filename);     
    $response = shell_exec($command);
    
    $return = array();    
    $return['status'] = true;
    echo json_encode($return);
    exit();
}); 



//************************** buildapplication
$app->post('/compile/iphone/', function(Request $request) use($app,$root) {
    
    // VARS 
    $icon = $request->get('icon');
    $iconRetina = $request->get('icon@2x');
    $default = $request->get('Default');
    $defaultRetina = $request->get('Default@2x');
    $defaultRetina2x = $request->get('Default-568h@2x');
    
    $xml = $request->get('info');
    $plist = $request->get('plist');
    
    $identity = $request->get('identity');    
    $type = $request->get('type');
    $user = $request->get('user');
    
    if (file_exists('/data/xcodebusy.lock')) {
        $return['status'] = false;
        $return['error'] = 'Server is busy now, try again after one minute.';
        exit('xcode busy');
    } else {
        touch('/data/xcodebusy.lock');
    }
    
    file_put_contents('/data/gomobile001/icon.png', $icon);
    file_put_contents('/data/gomobile001/icon@2x.png', $iconRetina);
    file_put_contents('/data/gomobile001/Default.png', $default);
    file_put_contents('/data/gomobile001/Default@2x.png', $defaultRetina);
    file_put_contents('/data/gomobile001/Default-568h@2x.png', $defaultRetina2x);
    file_put_contents('/data/gomobile001/info.xml', $xml);
    file_put_contents('/data/gomobile001/gomobile001/gomobile001-Info.plist', $plist);
    
    // BASH
    if ($type=='dev')  $command = sprintf('sudo -u %s bash /data/bash/xcode_dev.sh %s "%s"',$root,$user,$identity);     
    if ($type=='prod') $command = sprintf('sudo -u %s bash /data/bash/xcode_prod.sh %s "%s"',$root,$user,$identity);      
    
    $response = shell_exec($command);
    echo $response;
    

    unlink('/data/xcodebusy.lock');
    exit();
    
}); 

//************************** downloadIphone
$app->get('/download/iphone/{user}/', function($user) use($app,$root) {
    $file = '/data/users/'.$user.'/gomobile001.ipa';
    if (file_exists($file)) {
        echo file_get_contents($file);
    }
}); 
$app->run(); 
?>
