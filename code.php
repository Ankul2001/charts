<?php

include("connection.php");


if(isset($_POST['submitbtn'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $course=$_POST['course'];


    if($object->insrtdata($name,$email,$phone,$course)){
        ?>
        <script>
            alert("data added!!");
            window.location.href="form.php";
        </script>
        <?php
    }
}
if(isset($_POST['action']) && $_POST['action']=="studentAddmisson"){
    $res=  $object->drawChart();
    while($row= mysqli_fetch_assoc($res)){
         $data[]= $row;
    }

    echo json_encode($data);
 }
?>