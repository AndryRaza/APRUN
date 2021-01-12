<?php

$allow = 2;
$titre = "Validation de la feuille d'appel";

require_once '../includes/header.php';
require_once '../includes/bdd.php';
?>

<canvas id="signature" width="200" height="200"></canvas>

<a href="#" id="effacer">Effacer</a>
<a href="#" id="enregistrer">Enregistrer</a>

<script src="../scripts/script_signature.js"></script>
<script src="../scripts/Signature.js"></script>


<?php 

require_once '../includes/footer.php';

?>