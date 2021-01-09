<?php

$title=$_POST['title'];
$start=$_POST['start'];
$end=$_POST['end'];

$id = uniqid();

echo $title;

require_once 'bdd.php';

$req = $bdd->prepare("INSERT INTO `evenement`(`id_evenement`, `id_promo`, `titre`, `start`, `end`) 
VALUES ('$id,'5ff8e46e857dd','$title','$start','$end')");

$req->execute();
