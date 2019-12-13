<?php

require_once '../config/DB_Connection.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$age = $_POST['age'];
$img_name = $_FILES['img']['name'];
$img_loc = $_FILES["img"]["tmp_name"];

$ImageSavefolder = "../images/";

move_uploaded_file($img_loc, "$ImageSavefolder" . $img_name);



$sql = "INSERT INTO users (first_name,last_name,email,age,img_path) values ('$first_name','$last_name','$email','$age','$img_name');";



try {
    if ($db->query($sql) === TRUE) {
        header("Location: ../view/list.php");
    } else {
        echo 'Failed';
    }
} catch (Exception $th) {
    echo $th->getMessage();
}
