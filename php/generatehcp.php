<?php
/**
 * Created by PhpStorm.
 * User: Roger Filomeno
 * Date: 6/11/2016
 * Time: 1:15 AM
 */

error_reporting(0);
$shortopts  = "";
$longopts  = array(
	'transactionKey:', 	//required
	'txnType:',         //required
	'txnReference:',    //required
	'txnAmount:',       //required
	'txnCurrency:',     //required
	'merchantID:',      //required
	'shortCode::',      //required
	'altMerchantID::',  //optional
	'customerID:',      //required

	'txnTimeStamp::',   //optional
	'txnHMAC::',        //optional

	'captureEXT::',
	'captureAgentName::',

	'captureEnabled::',
	'captureCTI::',

	'ddMaskAcct::',
	'ccMaskFormat::',
	'cardsTypesAccepted::',
	'cardholderName::',
	'txnDescription::',
	'firstname::',
	'lastname::',
	'userIP::',
	'locationReference::',
	'txnDisplayLayout::',
	'merchantLogo::',
	'merchantStyleSheet::',
	'pageTitle::',
	'apiVersion::',
	'priorAuthApprovalCode::',
	'storeToken::',
	'receiptRedirect::',
	'returnURLLink::',
	'returnURLTarget::',
	'responsePostURL::',
	'payload::'
);
$options = getopt($shortopts, $longopts);

$params = [
	'txnType'               =>  isset($options['txnType'])                  ? filter_var($options['txnType'],              FILTER_SANITIZE_NUMBER_INT) : 0,
	'txnReference'          =>  isset($options['txnReference'])             ? filter_var($options['txnReference'],         FILTER_SANITIZE_STRING) : 'INV98765',
	'txnAmount'             =>  isset($options['txnAmount'])                ? filter_var($options['txnAmount'],            FILTER_SANITIZE_NUMBER_INT) : '10000',
	'txnCurrency'           =>  isset($options['txnCurrency'])              ? filter_var($options['txnCurrency'],          FILTER_SANITIZE_STRING) : 'AUD',
	'merchantID'            =>  isset($options['merchantID'])               ? filter_var($options['merchantID'],           FILTER_SANITIZE_STRING) : '**default-merchantID**',
	'shortCode'             =>  isset($options['shortCode'])                ? filter_var($options['shortCode'],            FILTER_SANITIZE_STRING) : '',
	'altMerchantID'         =>  isset($options['altMerchantID'])            ? filter_var($options['altMerchantID'],        FILTER_SANITIZE_STRING) : '',
	'customerID'            =>  isset($options['customerID'])               ? filter_var($options['customerID'],           FILTER_SANITIZE_STRING) : '',

	'txnTimeStamp'          =>  isset($options['txnTimeStamp'])             ? filter_var($options['txnTimeStamp'],         FILTER_SANITIZE_STRING) : false,
	'txnHMAC'               =>  isset($options['txnHMAC'])                  ? filter_var($options['txnHMAC'],              FILTER_SANITIZE_STRING) : false,

	'captureEXT'            =>  isset($options['captureEXT'])               ? filter_var($options['captureEXT'],           FILTER_SANITIZE_NUMBER_INT) : '3002',
	'captureAgentName'      =>  isset($options['captureAgentName'])         ? filter_var($options['captureAgentName'],     FILTER_SANITIZE_STRING) : '',

	'captureEnabled'        =>  isset($options['captureEnabled'])           ? filter_var($options['captureEnabled'],       FILTER_SANITIZE_NUMBER_INT) : 1,
	'captureCTI'            =>  isset($options['captureCTI'])               ? filter_var($options['captureCTI'],           FILTER_SANITIZE_NUMBER_INT) : 2,

	'ddMaskAcct'            =>  isset($options['ddMaskAcct'])               ? filter_var($options['ddMaskAcct'],           FILTER_SANITIZE_NUMBER_INT) : 0,
	'ccMaskFormat'          =>  isset($options['ccMaskFormat'])             ? filter_var($options['ccMaskFormat'],         FILTER_SANITIZE_NUMBER_INT) : 7,
	'cardsTypesAccepted'    =>  isset($options['cardsTypesAccepted'])       ? filter_var($options['cardsTypesAccepted'],   FILTER_SANITIZE_STRING) : 'V|MC|AMEX|D|DC|JCB',
	'cardholderName'        =>  isset($options['cardholderName'])           ? filter_var($options['cardholderName'],       FILTER_SANITIZE_STRING) : 1,
	'txnDescription'        =>  isset($options['txnDescription'])           ? filter_var($options['txnDescription'],       FILTER_SANITIZE_STRING) : '',
	'firstname'             =>  isset($options['firstname'])                ? filter_var($options['firstname'],            FILTER_SANITIZE_STRING) : '',
	'lastname'              =>  isset($options['lastname'])                 ? filter_var($options['lastname'],             FILTER_SANITIZE_STRING) : '',
	'userIP'                =>  isset($options['userIP'])                   ? filter_var($options['userIP'],               FILTER_SANITIZE_NUMBER_INT) : '',
	'locationReference'     =>  isset($options['locationReference'])        ? filter_var($options['locationReference'],    FILTER_SANITIZE_STRING) : '',
	'txnDisplayLayout'      =>  isset($options['txnDisplayLayout'])         ? filter_var($options['txnDisplayLayout'],     FILTER_SANITIZE_NUMBER_INT) : 0,
	'merchantLogo'          =>  isset($options['merchantLogo'])             ? filter_var($options['merchantLogo'],         FILTER_SANITIZE_STRING) : '',
	'merchantStyleSheet'    =>  isset($options['merchantStyleSheet'])       ? filter_var($options['merchantStyleSheet'],   FILTER_SANITIZE_STRING) : '',
	'pageTitle'             =>  isset($options['pageTitle'])                ? filter_var($options['pageTitle'],            FILTER_SANITIZE_STRING) : '',
	'apiVersion'            =>  isset($options['apiVersion'])               ? filter_var($options['apiVersion'],           FILTER_SANITIZE_NUMBER_INT) : 1,
	'priorAuthApprovalCode' =>  isset($options['priorAuthApprovalCode'])    ? filter_var($options['priorAuthApprovalCode'],FILTER_SANITIZE_STRING) : '',
	'storeToken'            =>  isset($options['storeToken'])               ? filter_var($options['storeToken'],           FILTER_SANITIZE_NUMBER_INT) : 0,
	'receiptRedirect'       =>  isset($options['receiptRedirect'])          ? filter_var($options['receiptRedirect'],      FILTER_SANITIZE_NUMBER_INT) : 0,
	'returnURLLink'         =>  isset($options['returnURLLink'])            ? filter_var($options['returnURLLink'],        FILTER_SANITIZE_STRING) : '',
	'returnURLTarget'       =>  isset($options['returnURLTarget'])          ? filter_var($options['returnURLTarget'],      FILTER_SANITIZE_STRING) : '',
	'responsePostURL'       =>  isset($options['responsePostURL'])          ? filter_var($options['responsePostURL'],      FILTER_SANITIZE_STRING) : '',
	'payload'               =>  isset($options['payload'])                  ? html_entity_decode (trim(filter_var($options['payload'],              FILTER_SANITIZE_STRING))) : '{"test-mode":true}'
];

//THERE IS NO LINE #97!

if(!$params['txnTimeStamp']) {
	date_default_timezone_set('Australia/Sydney');
	$date_utc = new \DateTime(null, new \DateTimeZone("UTC"));
	$params['txnTimeStamp'] =  date("YmdHis",$date_utc->getTimestamp());
}


if(!$params['txnHMAC'] && isset($options['transactionKey'])) {
	$value = $params['txnType'].'_'.$params['merchantID'].'_'.$params['txnReference'].'_'.$params['txnAmount'].'_'.$params['txnTimeStamp'].'_'.$params['txnCurrency'];
	$params['txnHMAC'] = hash_hmac('sha256', $value, $options['transactionKey']);
}

$postFields = http_build_query($params);
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://domain.tld/hcp/capture.php",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_SSL_VERIFYPEER => 0,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_SSLVERSION => 1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => $postFields ,
	CURLOPT_COOKIESESSION => 1,
	CURLOPT_HEADER =>0,
	CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache",
		"content-type: application/x-www-form-urlencoded"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);
$info = curl_getinfo($curl);


if ($err) {
	echo "Cannot connect to Gateway. " . $err . PHP_EOL;
}elseif(!empty($info['redirect_url'])) {
	echo $info['redirect_url'] . PHP_EOL;
} else {
	echo 'ERROR '.$response.PHP_EOL;
}
