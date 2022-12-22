<?php
try {
$db=new PDO("mysql:host=localhost;dbname=toptanmanav;charset=utf8",'root','');
}

catch(PDOException $e) {
echo $e ->getMessage();
}
?>