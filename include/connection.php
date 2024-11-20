<?php
try
{
    $pdo = new PDO('mysql:host=localhost;dbname=cafe','root','',[
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
    ]);
    
}
catch(PDOEXception $e){
die();
echo "there is problem with the connection ...";
}
?>