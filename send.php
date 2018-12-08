<?php

$username = "yjain@gmail.com";
$password = "Ka130168";

define("SOAP_CLIENT_BASEDIR", "Force.com-Toolkit-for-PHP-master/soapclient");

require_once (SOAP_CLIENT_BASEDIR.'/SforceEnterpriseClient.php');
require_once (SOAP_CLIENT_BASEDIR.'/SforceHeaderOptions.php');

try {

  $mySforceConnection = new SforceEnterpriseClient();
  $mySoapClient = $mySforceConnection->createConnection(SOAP_CLIENT_BASEDIR.'/enterprise.wsdl.xml');
  $mylogin = $mySforceConnection->login($username, $password);

  $sObject = new stdclass();
  $sObject->latitude__c = 'Test';
  $sObject->longitude__c = 'Test';
//   $sObject->Email__c = 'test@test.com';
//   $sObject->RecordType = "MyCustomRecordType";
//   $sObject->Name = "API Testing";

  $createResponse = $mySforceConnection->create(array($sObject), 'CustomObject__c');

} catch (Exception $e) {
  var_dump($e);
  echo $mySforceConnection->getLastRequest();
  echo $e->faultstring;
}

?>