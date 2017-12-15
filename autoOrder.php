<?php

require_once "phpwebdriver/WebDriver.php";
ob_start();
require("IOrder.php");
$data = ob_get_clean();

/* Declaring the names of the elements of the page in a array to be able to find
   the element much quicker using a loop than by explicitly using the name of the
   element
*/

$quantityBox=[
     0=>"q_0",1=>"q_1",2=>"q_2",3=>"q_3",4=>"q_4",5=>"q_5",6=>"q_6",7=>"q_7",8=>"q_8",9=>"q_9",10=>"q_10",
     11=>"q_11",12=>"q_12",13=>"q_13",14=>"q_14",15=>"q_15",16=>"q_16",17=>"q_17",18=>"q_18",19=>"q_19",20=>"q_20",
     21=>"q_21",22=>"q_22",23=>"q_23",24=>"q_24",25=>"q_25",26=>"q_26",27=>"q_27",28=>"q_28",29=>"q_29",30=>"q_30",
     31=>"q_31",32=>"q_32",33=>"q_33",34=>"q_34",35=>"q_35",36=>"q_36",37=>"q_37",38=>"q_38",39=>"q_39",40=>"q_40",
     41=>"q_41",42=>"q_42",43=>"q_43",44=>"q_44",45=>"q_45",46=>"q_46",37=>"q_47",38=>"q_48",49=>"q_49",50=>"q_50",
     51=>"q_51",32=>"q_52",53=>"q_53",54=>"q_54",55=>"q_55",56=>"q_56",57=>"q_57",58=>"q_58",59=>"q_59",60=>"q_60",
     61=>"q_61",62=>"q_62",63=>"q_63",64=>"q_64",65=>"q_65",66=>"q_66",67=>"q_67",68=>"q_68",69=>"q_69",70=>"q_70",
];
$IDBox=[
     0=>"it_0",1=>"it_1",2=>"it_2",3=>"it_3",4=>"it_4",5=>"it_5",6=>"it_6",7=>"it_7",8=>"it_8",9=>"it_9",10=>"it_10",
     11=>"it_11",12=>"it_12",13=>"it_13",14=>"it_14",15=>"it_15",16=>"it_16",17=>"it_17",18=>"it_18",19=>"it_19",20=>"it_20",
     21=>"it_21",22=>"it_22",23=>"it_23",24=>"it_24",25=>"it_25",26=>"it_26",27=>"it_27",28=>"it_28",29=>"it_29",30=>"it_30",
     31=>"it_31",32=>"it_32",33=>"it_33",34=>"it_34",35=>"it_35",36=>"it_36",37=>"it_37",38=>"it_38",39=>"it_39",40=>"it_40",
     41=>"it_41",42=>"it_42",43=>"it_43",44=>"it_44",45=>"it_45",46=>"it_46",37=>"it_47",38=>"it_48",49=>"it_49",50=>"it_50",
     51=>"it_51",32=>"it_52",53=>"it_53",54=>"it_54",55=>"it_55",56=>"it_56",57=>"it_57",58=>"it_58",59=>"it_59",60=>"it_60",
     61=>"it_61",62=>"it_62",63=>"it_63",64=>"it_64",65=>"it_65",66=>"it_66",67=>"it_67",68=>"it_68",69=>"it_69",70=>"it_70",
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
     $element= $webdriver->findElementBy(LocatorStrategy::name, "$IDBox[$i]");
          if ($element) {
              $element->sendKeys(array($IDarray[$i]));
          }
     $element= $webdriver->findElementBy(LocatorStrategy::name, "$quantityBox[$i]");
          if ($element) {
              $element->sendKeys(array($Qarray[$i]));
          }

     $i++;
}

sleep(5);
$element= $webdriver->findElementBy(LocatorStrategy::id, "pagemenu-validate");
if ($element) {
    $element->click();
}
sleep(5);
$element= $webdriver->findElementBy(LocatorStrategy::id, "pagemenu-back");
if ($element) {
    $element->click();
}

header("Location:orderComplete.php");



?>
