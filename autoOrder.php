<?php

require_once "phpwebdriver/WebDriver.php";
ob_start();
require("IOrder.php");
$data = ob_get_clean();

$quantityBox=[
     0=>"q_0",1=>"q_1",
     2=>"q_2",3=>"q_3",
     4=>"q_4",5=>"q_5",
     6=>"q_6",7=>"q_7",
     8=>"q_8",9=>"q_9",
     10=>"q_10",11=>"q_11",
     12=>"q_12",13=>"q_13",
     14=>"q_14",15=>"q_15",
     16=>"q_16",17=>"q_17",
     18=>"q_18",19=>"q_19",
     20=>"q_20",
];
$IDBox=[
     0=>"it_0",1=>"it_1",
     2=>"it_2",3=>"it_3",
     4=>"it_4",5=>"it_5",
     6=>"it_6",7=>"it_7",
     8=>"it_8",9=>"it_9",
     10=>"it_10",11=>"it_11",
     12=>"it_12",13=>"it_13",
     14=>"it_14",15=>"it_15",
     16=>"it_16",17=>"it_17",
     18=>"it_18",19=>"it_19",
     20=>"it_20",
];




$webdriver = new WebDriver("localhost", "4444");
$webdriver->connect("chrome");
$webdriver->get("https://www.lceforum.com/lceforum/login.aspx?ReturnUrl=%2flceforum%2f");
$webdriver->forward();
$element = $webdriver->findElementBy(LocatorStrategy::name, "dnn\$ctr14813\$View\$txtUsername");
if ($element) {
    $element->sendKeys(array("30640000" ) );
}

$element = $webdriver->findElementBy(LocatorStrategy::name, "dnn\$ctr14813\$View\$txtPassword");
if ($element) {
    $element->sendKeys(array("manaka" ) );
}
$element= $webdriver->findElementBy(LocatorStrategy::name, "dnn\$ctr14813\$View\$btnLogin");
if ($element) {
    $element->click();
}

$webdriver->get("https://www.lceforum.com//lceforum/DesktopModules/LitteCaesars-Links/put.aspx?LinkId=79&MId=1857&UserName=30640000");

sleep(5);

$element= $webdriver->findElementBy(LocatorStrategy::id, "mainmenu-order");
if ($element) {
    $element->click();
}
sleep(10);

$webdriver->focusFrame(ContentFrame);

sleep(5);

$i=0;
while($i<=count($IDarray)){
$element= $webdriver->findElementBy(LocatorStrategy::name, "$quantityBox[$i]");
if ($element) {
    $element->sendKeys(array($Qarray[$i]));
}
$element= $webdriver->findElementBy(LocatorStrategy::name, "$IDBox[$i]");
if ($element) {
    $element->sendKeys(array($IDarray[$i]));
}
$i++;
}

sleep(5);
$element= $webdriver->findElementBy(LocatorStrategy::linkText, "Place Order");
if ($element) {
    $element->click();
}

header("Location:IOrder.php");



?>
