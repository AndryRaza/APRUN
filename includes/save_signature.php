<?php

require_once '../includes/bdd.php';

session_start();

$data = $_POST['url'];

$id = uniqid();

$_SESSION['absence_imprimer'] = $id;



define('UPLOAD_DIR', '../ressources/signature/');
$image_parts = explode(";base64,", $data); //récupère les données bizarres

$image_type_aux = explode("image/", $image_parts[0]);   //récupère le format (.png)


$image_type = $image_type_aux[1]; //contient le format

$image_base64 = base64_decode($image_parts[1]);

$file = UPLOAD_DIR . $_SESSION['user'] . '.png';

$ifp = fopen( $file, 'wb' ); 

fwrite( $ifp, $image_base64 );

fclose( $ifp ); 
