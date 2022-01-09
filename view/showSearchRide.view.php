<?php $pageTitle = 'Show search' ?>

<?php $contentCss = array('./public/css/showSearchRide.css'); ?>

<h2>All rides :</h2>
<div class="showSearch-wrapper">

    <?php
    if (isset($rides) and !empty($rides)) :
        foreach ($rides as $ride) :
    ?>
            <div class="card">
                <div class="avatar-container">
                    <div>
                        <img src="<?php echo '../public/asset/avatar/' . $ride['avatar']; ?> " alt="avatar">
                    </div>
                </div>
                <div class="square-container">
                    <div class="square1"></div>
                    <div class="square2"></div>
                    <div class="square3"></div>
                </div>
                <div class="card-content">
                    <div class="card-en-tete">
                        <h3><?php echo htmlspecialchars($ride['pseudo']); ?></h3>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="schedule">
                            <div>
                                <h4><?php echo htmlspecialchars($ride['startingPlace']); ?>:</h4>
                                <h4><?php echo substr(htmlspecialchars($ride['startingTime']), 0, -3); ?></h4>
                            </div>
                            <div class="ride-duration">
                                <div>
                                    <ion-icon name="arrow-down-outline"></ion-icon>
                                    <div>
                                        <p><?php echo htmlspecialchars($ride['rideDistance']); ?> km</p>
                                        <p><?php echo htmlspecialchars(intval($ride['rideTime'])) . 'h' . htmlspecialchars(floor(($ride['rideTime'] - intval($ride['rideTime'])) * 60)) . "min"; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4><?php echo htmlspecialchars($ride['endingPlace']); ?>:</h4>
                                <h4><?php echo substr(htmlspecialchars($ride['endingTime']), 0, -3); ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="<?php switch ($ride['talk']) {
                                        case 'Talking all the way!':
                                            echo 'iconGood';
                                            break;
                                        case 'Yeah why not':
                                            echo 'iconMoyen';
                                            break;
                                        case 'No talking!':
                                            echo 'iconBad';
                                            break;
                                    } ?>">
                            <ion-icon name="chatbubbles-outline"></ion-icon>
                        </div>
                        <div class="<?php switch ($ride['music']) {
                                        case 'Music non-stop!':
                                            echo 'iconGood';
                                            break;
                                        case 'Yeah why not':
                                            echo 'iconMoyen';
                                            break;
                                        case 'No music!':
                                            echo 'iconBad';
                                            break;
                                    } ?>">
                            <ion-icon name="musical-notes-outline"></ion-icon>
                        </div>
                        <?php 
                        if ($ride['smoker'] == 'No smoker!') : 
                            ?>
                            <div class="iconBad" >
                                <ion-icon name="logo-no-smoking"></ion-icon>
                            </div>
                            <?php
                        endif;
                        if ($ride['pet'] == 'No pet allowed!') : 
                            ?>
                        <div class="iconBad">
                            <ion-icon name="paw-outline"></ion-icon>
                        </div>
                        <?php
                        endif; 
                        ?>
                    </div>
                </div>
            </div>
    <?php
        endforeach;
    else:

    endif;
    ?>

</div>