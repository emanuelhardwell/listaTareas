<?php

//se va a crear una sesion para que nos permita guardar un dato
//en este caso seran los mensajes
session_start();


$conn = mysqli_connect('localhost', 'root', 'hardwell100', 'listatareas');

//if(isset($conn)){
//    echo 'conexion exitosa';
//} 

?>