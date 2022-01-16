<?php $pageTitle = 'Show search' ?>

<?php $contentCss = array('./public/css/showSearchRide.css'); ?>

<h2>All rides :</h2>
<div class="showSearch-wrapper">
    <div class="nav-wrapper">
        <div>
            <form action="../index.php?contr=ride&action=showsearch" method="POST">
                <h3>Sort out by:</h3>
                <div>
                    <h4>Smoker:</h4>
                    <div class="input-content">
                        <input type="radio" value="sY" name="smoker" id="smokerY" <?php if (isset($variableStockage2) and !empty($variableStockage2)) : if ($variableStockage2[0] == 'sY') : echo 'checked';
                                                                                        endif;
                                                                                    endif; ?>>
                        <label for="smokerY">Smoker allowed</label>
                    </div>
                    <div class="input-content">
                        <input type="radio" value="sN" name="smoker" id="smokerN" <?php if (isset($variableStockage2) and !empty($variableStockage2)) : if ($variableStockage2[0] == 'sN') : echo 'checked';
                                                                                        endif;
                                                                                    endif; ?>>
                        <label for="smokerN">Smoker not allowed</label>
                    </div>
                    <div class="input-content">
                        <input type="radio" value="sAll" name="smoker" id="smokerAll" <?php if (isset($variableStockage2) and !empty($variableStockage2)) : if ($variableStockage2[0] == 'sAll') : echo 'checked';
                                                                                            endif;
                                                                                        else : echo 'checked';
                                                                                        endif; ?>>
                        <label for="smokerAll">All</label>
                    </div>
                </div>
                <div class="barre"></div>
                <div>
                    <h4>Pet:</h4>
                    <div class="input-content">
                        <input type="radio" value="pY" name="pet" id="petY" <?php if (isset($variableStockage2) and !empty($variableStockage2)) : if ($variableStockage2[1] == 'pY') : echo 'checked';
                                                                                endif;
                                                                            endif; ?>>
                        <label for="petY">pet allowed</label>
                    </div>
                    <div class="input-content">
                        <input type="radio" value="pN" name="pet" id="petN" <?php if (isset($variableStockage2) and !empty($variableStockage2)) : if ($variableStockage2[1] == 'pN') : echo 'checked';
                                                                                endif;
                                                                            endif; ?>>
                        <label for="petN">pet not allowed</label>
                    </div>
                    <div class="input-content">
                        <input type="radio" value="pAll" name="pet" id="petAll" <?php if (isset($variableStockage2) and !empty($variableStockage2)) : if ($variableStockage2[1] == 'pAll') : echo 'checked';
                                                                                    endif;
                                                                                else : echo 'checked';
                                                                                endif; ?>>
                        <label for="petAll">All</label>
                    </div>
                </div>
                <div class="barre"></div>
                <input type="hidden" name="startingPlace" value="<?php echo htmlspecialchars($variableStockage[0]); ?>">
                <input type="hidden" name="endingPlace" value="<?php echo htmlspecialchars($variableStockage[1]); ?>">
                <input type="hidden" name="dateRide" value="<?php echo htmlspecialchars($variableStockage[2]); ?>">
                <div class="nav-submit">
                    <input type="submit" name="search" value="Search">
                </div>
            </form>
        </div>
    </div>
    <div class="card-wrapper">

        <?php
        if (isset($rides) and !empty($rides)) :
            foreach ($rides as $ride) :
        ?>
                <div class="card">
                    <a href="<?php echo '../index.php?contr=user&action=showUser&id=' . htmlspecialchars($ride['person_id']); ?>" class="avatar-container">
                        <div>
                            <img src="<?php echo '../public/asset/avatar/' . $ride['avatar']; ?> " alt="avatar">
                        </div>
                    </a>
                    <div class="square-container">
                        <div class="square1"></div>
                        <div class="square2"></div>
                        <div class="square3"></div>
                    </div>
                    <a class="card-content" href="<?php echo './index.php?contr=ride&action=showOneRide&id=' . htmlspecialchars($ride['journey_id']); ?>">
                        <div class="card-en-tete">
                            <h3><?php echo htmlspecialchars($ride['pseudo']); ?></h3>
                        </div>
                        <div class="barre"></div>
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
                                <div class="iconBad">
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
                    </a>
                </div>
        <?php
            endforeach;
        else :

        endif;
        ?>
    </div>
</div>