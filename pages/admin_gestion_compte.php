<?php
$titre = 'Choissir une promotion';
$allow = '0';
require_once '../includes/header.php';

?>
    
    <section class="container-fluid d-flex flex-column justify-content-center align-items-center p-5">
        <div id="choix_promo_formateur">
            <form>

                <div class="d-flex flex-column p-5  bg-light" style="border:2px solid black">
                <label for="choix_promo_formateur">Sélectionnez la promotion :</label>
                    <select class="form-control my-5" name="choix_promo_formateur">
                        <option>2020-2021 - Developpeur Web</option>
                    </select>
                    <input type="submit" class="btn btn-primary w-50 align-self-end" value="Valider" name="valider_promo_formateur">
                </div>

            </form>

        </div>
    </section>

    <?php

    require_once '../includes/footer.php';

    ?>