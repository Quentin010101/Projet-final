<?php $pageTitle = "publish"; ?>

<?php $contentCss = array('./public/css/formulaire.css', './public/css/publishRide.css'); ?>

<?php if(isset($erreur)): ?>
    <div class="erreur" >
        <p> <?php echo htmlspecialchars($erreur)?></p>
    </div>
<?php else: ?>
    
    <div class="wrapper-form">

        <h2>Publish a ride</h2>
        <form action="../index.php?contr=ride&action=set" method="POST">
            <div class="form-content" >
                <div class="square">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="form-input" id="fI-1" >
                    <label for="">Starting Place:</label>
                    <div>
                        <input class="inputStartingPlace" type="text" name="startingPlace" autocomplete="off">
                        <div class="menu"></div>
                    </div>
                    <input class="startingLat" type="hidden" value="" name="startingPlaceLatitude" >
                    <input class="startingLong" type="hidden" value="" name="startingPlaceLongitude" >
                </div>
                <div class="form-input" id="fI-2" >
                    <label for="">Ending Place:</label>
                    <div>
                        <input class="inputEndingPlace" type="text" name="endingPlace" autocomplete="off">
                        <div class="menu"></div>
                    </div>
                    <input class="endingLong" type="hidden" value="" name="endingPlaceLongitude" >
                    <input class="endingLat" type="hidden" value="" name="endingPlaceLatitude" >
                </div>
                <div class="form-input" >
                    <p class="distance" ></p>
                    <input type="hidden" name="rideDistance" class="rideDistance">
                    <p class="temps" ></p>
                    <input type="hidden" name="rideTime" class="rideTime">
                </div>
                <div class="form-input" >
                    <label for="">Date:</label>
                    <input type="date" name="dateRide">
                </div>
                <div class="form-input" >
                    <label for="">Starting Time:</label>
                    <input class="startingTime" type="time" name="startingTime">
                </div>
                <div class="form-input" >
                    <label for="">Number of seat:</label>
                    <input type="text" name="nbSeat">
                </div>
                <div class="form-input" >
                    <input type="submit" value="Post" name="setJourney">
                </div>
            </div>
            <div class="square-out">
                            <div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
        </form>
    </div>

<script src="../public/js/findLocalisation.js"></script>

<?php endif; 
