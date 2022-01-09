<?php $pageTitle = 'search'; ?>

<?php $contentCss = array('./public/css/formulaire.css'); ?>



    <h2>Search</h2>
    <form action="../index.php?contr=ride&action=showSearch" method="POST" >
        <div>
            <label for="">Departure: </label>
            <input type="text" name="startingPlace" >
        </div>
        <div>
            <label for="">Arrival: </label>
            <input type="text" name="endingPlace" >
        </div>
        <div>
            <label for="">Date: </label>
            <input type="date" name="dateRide" >
        </div>
        <div>
            <input type="submit" value="Search" name="search">
        </div>
    </form>



<?php
if(isset($erreur)):
    ?>
        <div class="erreur" >
            <p><?php  echo htmlspecialchars($erreur); ?></p>
        </div>
     <?php
     endif;   