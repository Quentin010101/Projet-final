<?php $pageTitle = 'search' ?>

<?php
if (isset($rides) and !empty($rides)) :
    ?>
    <?php
    foreach ($rides as $ride) :
?>
    <div>
        <h3><?php echo htmlspecialchars($ride['pseudo'])?></h3>
        <h3>Departure : <?php echo htmlspecialchars($ride['startingPlace'])?> at : <?php echo htmlspecialchars($ride['startingTime'])?></h3>
        <h3>Arrival : <?php echo htmlspecialchars($ride['endingPlace'])?> at : <?php echo htmlspecialchars($ride['endingTime'])?></h3>
    </div>
    <?php
    endforeach;
else :
    ?>

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

<?php endif;
?>

<?php
if(isset($erreur)):
    ?>
        <div class="erreur" >
            <p><?php  echo htmlspecialchars($erreur); ?></p>
        </div>
     <?php
     endif;   