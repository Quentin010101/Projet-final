<?php $pageTitle = "publish"; ?>


<?php if(isset($erreur)): ?>
    <div class="erreur" >
        <p> <?php echo htmlspecialchars($erreur)?></p>
    </div>
<?php else: ?>    
<h2>Publish</h2>
<form action="../index.php?contr=ride&action=set" method="POST">
    <div>
        <label for="">Starting Place</label>
        <input class="inputStartingPlace" type="text" name="startingPlace" autocomplete="off">
        <div class="menu"></div>
        <input class="startingLat" type="hidden" value="" name="startingPlaceLatitude" >
        <input class="startingLong" type="hidden" value="" name="startingPlaceLongitude" >
    </div>
    <div>
        <label for="">Ending Place</label>
        <input class="inputEndingPlace" type="text" name="endingPlace" autocomplete="off">
        <div class="menu"></div>
        <input class="endingLong" type="hidden" value="" name="endingPlaceLongitude" >
        <input class="endingLat" type="hidden" value="" name="endingPlaceLatitude" >
    </div>
    <div>
        <p class="distance" ></p>
        <input type="hidden" name="rideDistance" class="rideDistance">
        <p class="temps" ></p>
        <input type="hidden" name="rideTime" class="rideTime">
    </div>
    <div>
        <label for="">Date</label>
        <input type="date" name="dateRide">
    </div>
    <div>
        <label for="">Starting Time</label>
        <input class="startingTime" type="time" name="startingTime">
    </div>
    <div>
        <label for="">Number of seat</label>
        <input type="text" name="nbSeat">
    </div>
    <input type="submit" value="Post" name="setJourney">
</form>

<script src="../public/js/findLocalisation.js"></script>

<?php endif; 
