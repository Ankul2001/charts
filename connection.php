<?php

    class link{

        function __construct(){
            $this->connect=mysqli_connect("localhost","root","","charts");
            session_start();
        }

        function insrtdata($name,$email,$phone,$course){
            $sql="INSERT INTO `students_add_chart`(`name`, `email`, `phone`, `course`) VALUES ('$name','$email','$phone','$course')";
            return mysqli_query($this->connect,$sql);
        }
        function drawChart(){
            $sql= "SELECT COUNT(sn) AS Students, course FROM students_add_chart GROUP BY course";
            return mysqli_query($this->connect, $sql);
        }


    }
    $object= new link();
?>