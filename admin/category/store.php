<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/
$_name = $_POST['name'];
$_link = $_POST['link'];

if(array_key_exists('is_draft',$_POST)){
    $_is_draft = $_POST['is_draft'];

}
else{
    $_is_draft = 0;
}
$_created_at = date('Y-m-d h:i:s', time());

$conn =new PDO("mysql:host=localhost;dbname=ecommerce", 'root','');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query="INSERT INTO `category` ( `name`,`link`,`is_draft`,`created_at`) VALUES (:name,:link,:is_draft,:created_at);"; 
$stmt = $conn->prepare($query);
$stmt->bindParam(':name', $_name);
$stmt->bindParam(':link', $_link);
$stmt->bindParam(':is_draft', $_is_draft);
$stmt->bindParam(':created_at', $_created_at);

$result = $stmt->execute();
if ($result){
    $_SESSION['message']="product is added Successfully,";
}else{
    $_SESSION['message']="product is added Successfully,";
}

//var_dump($result);
header("location:index.php");

