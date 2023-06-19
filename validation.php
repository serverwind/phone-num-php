<?php
require __DIR__ . "/vendor/autoload.php";

use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumber;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

$phoneUtil = PhoneNumberUtil::getInstance();

try {
  //получаем значение с введенным номером телефона из input (#phone)
  if (isset($_POST['value'])){
    $INPUT = $_POST['value'];
    $response = array('value' => $INPUT);
  }

  //обрабатываем номер, используя библиотеку libphonenumber-php
  $parsed_number = $phoneUtil->parse($INPUT); //номер
  $countryCode = $parsed_number->getCountryCode(); //код страны
  $countryName = $phoneUtil->getRegionCodeForCountryCode($countryCode); //название страны

  //создаем массив с данными
  $data = array(
    'phoneNum' => $INPUT,
    'country' => $countryName,
  );

  $jsonResponse = json_encode($data);
  print $jsonResponse;
} 
catch (NumberParseException $e) {
  print json_encode(array('error' => 'Invalid phone number'));
}
?>
