<?php
/* API Proxy for Water System ID */ 
   
header('Access-Control-Allow-Origin: *'); 

$primacyagency = $_GET['pa'];

$post_url = '[ENDPOINT URL]/ref-data/inventory/'.$primacyagency.'/water-system';

/* Set Basic Autentication Username & Password */                                                                             
$username = '[Username]';   
$password = '[Password]'; 
                                                                                                
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $post_url);    
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
curl_setopt($ch, CURLOPT_HTTPGET, true);                                                                
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
    'Accept: application/json',
    'Content-Type: application/json')                                                           
);             

if(curl_exec($ch) === false)
{
    echo 'Curl error: ' . curl_error($ch);
}                                                                                                      
$errors = curl_error($ch);                                                                                                            
$result = curl_exec($ch);
//$returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);  
//echo $returnCode;
//var_dump($errors);


$json = json_decode($result, true);

foreach($json['pridexElement']['waterSystem'] as $item) {
    $watersystemid = $item['waterSystemId'];
    $watersystemname = $item['waterSystemName'];
    $watersys[] = array('pwsid' => ''.$watersystemid,'pwsname' => $watersystemname);
}

//print_r($watersys);

echo json_encode($watersys);

?>

