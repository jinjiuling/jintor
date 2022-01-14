<?php
function gethtml($url,$args=null){
	$proxy = $args["proxy"]?$args["proxy"]:'';
	$headers = $args["headers"]?$args["headers"]:['User-Agent:Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36'];
	$nobody = $args["nobody"]?$args["nobody"]:0;
	$header = $args["header"]?$args["header"]:0;
	$ch = curl_init();
	$options = array(
		CURLOPT_URL => @$url,
		CURLOPT_PROXY  => @$proxy,
		CURLOPT_HTTPHEADER => @$headers,
		CURLOPT_NOSIGNAL => 1,
		CURLOPT_HEADER => @$header,
		CURLOPT_NOBODY => @$nobody,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_FOLLOWLOCATION => 1
	);
	if (preg_match('/^https/',$url)){
		$options[CURLOPT_SSL_VERIFYHOST] = 2;
		$options[CURLOPT_SSL_VERIFYPEER] = 0;
	}
	curl_setopt_array($ch, $options);
	$data = curl_exec($ch);
	$curl_errno = curl_errno($ch); 
	curl_close($ch);
	if($curl_errno>0){
		return 'error';
	}else{
		return $data;
	}
}
?>