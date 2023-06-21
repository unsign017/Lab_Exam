<?php
include('../db.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM `product` WHERE id = {$id}";
    
    
    if($conn->query($sql)){
        header("Location: home.php");
    }
}