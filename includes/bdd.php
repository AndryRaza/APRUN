<?php

/* Pour ouvrir notre bdd */

$servername = "localhost";
$username = "root";
$password = NULL;
$dbname = "bdd_app_aprun";

$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);