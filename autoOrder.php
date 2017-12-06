<?php

require_once "phpwebdriver/WebDriver.php";

$webdriver = new WebDriver("localhost", "4444");
$webdriver->connect("firefox");
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

sleep(2);

$element= $webdriver->findElementBy(LocatorStrategy::id, "mainmenu-order");
if ($element) {
    $element->click();
}
sleep(20);

$webdriver->focusFrame(ContentFrame);

sleep(2);



$element= $webdriver->findElementBy(LocatorStrategy::name, "q_0");
if ($element) {
    $element->sendKeys(array("1" ) );
}

sleep(2);
$element= $webdriver->findElementBy(LocatorStrategy::linkText, "Place Order");
if ($element) {
    $element->click();
}

header("Location:IOrder.php");



?>
