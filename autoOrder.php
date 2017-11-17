<?php
/*
Copyright 2011 3e software house & interactive agency

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

     http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
*/


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

sleep(3);

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
