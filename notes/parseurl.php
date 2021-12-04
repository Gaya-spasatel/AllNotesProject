<?php
function my_parse_url($filename){
	$string = file_get_contents($filename);
        $data = json_decode($string, true);
	if(is_array($data) and isset($data['url'])) return $data['url'];
	return false;
}
function get_post($data, $url){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;

}