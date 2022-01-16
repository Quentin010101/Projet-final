<?php $pageTitle = 'search'; ?>

<?php $contentCss = array('./public/css/formulaire.css', './public/css/searchRide.css'); ?>



<div class="wrapper-form">
        <h2>Where do you want to go?</h2>
        <form action="../index.php?contr=ride&action=showSearch" method="POST" >
                <div class="form-content" >          
                    <div class="square">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="form-input">
                        <label for="">Departure: </label>
                        <input type="text" name="startingPlace" >
                    </div>
                    <div class="form-input">
                        <label for="">Arrival: </label>
                        <input type="text" name="endingPlace" >
                    </div>
                    <div class="form-input">
                        <label for="">Date: </label>
                        <input type="date" name="dateRide" >
                    </div>
                    <div class="form-input">
                        <input type="submit" value="Search" name="search">
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



<?php
if(isset($erreur)):
    ?>
        <div class="erreur" >
            <p><?php  echo htmlspecialchars($erreur); ?></p>
        </div>
     <?php
     endif;   