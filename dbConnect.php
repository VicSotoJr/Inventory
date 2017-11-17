

<?php

DEFINE ('DB_HOST','us-cdbr-iron-east-05.cleardb.net');
DEFINE ('DB_USER','be579759e49bd1');
DEFINE ('DB_PSWD','a623f1e2');
DEFINE ('DB_NAME','heroku_4dd8172fe7a14c4');


$conn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
if(!$conn){
     die('Error connecting to database');
}
echo "Welcome!";

?>
