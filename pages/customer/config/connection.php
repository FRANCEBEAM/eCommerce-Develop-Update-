<?php 

    $conn=new mysqli('localhost','root','','rjavancena');
    
    if(!$conn){
        die(mysqli_error($conn));
    }
?>