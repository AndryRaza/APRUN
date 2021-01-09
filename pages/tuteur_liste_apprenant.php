<?php
$titre = 'Liste de vos apprenants';
require_once '../includes/header.php';

?>

<div class="d-flex flex-column text-center mt-5">
    <h1>
        Liste d'apprenants
    </h1>

</div>

<section class="container text-center bg-light py-5" id="liste_apprenant_tuteur">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Absence(s)</th>
                <th scope="col">Nbre total d'heure <br> de la formation</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"><a href="#">Doe </a></th>
                <td>John</td>
                <td> 50h</td>
                <td>480h</td>
            </tr>
            <tr>
                <th scope="row"><a href="#">Doe </a></th>
                <td>John</td>
                <td> 50h</td>
                <td>480h</td>
            </tr>
            <tr>
                <th scope="row"><a href="#">Doe </a></th>
                <td>John</td>
                <td> 50h</td>
                <td>480h</td>
            </tr>
        </tbody>
    </table>


</section>

<?php

require_once '../includes/footer.php';

?>