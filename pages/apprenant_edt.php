<?php
$titre = 'Emploi du temps';
$allow = '1';

?>
<?php require_once '../includes/header.php' ?>

<section class="container-fluid h-100 text-center mt-5" id="edt_apprenant">

    <h1>Bonjour</h1>

    <h2>Emploi du temps</h2>
    <div class="row">
        <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
            </div>
        </div>
        <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane  show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                    <div class="container" id='calendar'>
                    </div>
                </div>
                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                <?php 
                    require_once 'apprenant_presence.php';
                ?>
                </div>

            </div>
        </div>
    </div>

</section>

<?php

require_once '../includes/footer.php';

?>