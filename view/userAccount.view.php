<?php $pageTitle = 'Your Account'; ?>
<?php $contentCss = array("../public/css/userAccount.css", "../public/css/formulaireUserAccount.css"); ?>


<div class="wrapper">
    <div class="user-nav">
        <nav>

            <div class="avatar">
                <img src="<?php echo './public/asset/avatar/' . htmlspecialchars($preferences['avatar']); ?>" alt="user-avatar">
            </div>
            <div class="description">
                <p><?php echo htmlspecialchars($personals['pseudo']); ?></p>
                <p>user since: <span><?php $date = date_create(htmlspecialchars($personals['date']));
                                        echo date_format($date, 'd/m/Y'); ?></span></p>
            </div>
            <ul>
                <li id="list-ride" class="navIndex"><button id="button-ride" class="button-nav">
                        <ion-icon name="car"></ion-icon><span>Ride</span>
                    </button></li>
                <div class="barre"></div>
                <li id="list-personnal"><button id="button-personnal" class="button-nav">
                        <ion-icon name="person"></ion-icon><span>Personnal Information</span>
                    </button></li>
                <div class="barre"></div>
                <li id="list-preference"><button id="button-preference" class="button-nav">
                        <ion-icon name="color-palette"></ion-icon><span>Preference</span>
                    </button></li>
                <div class="barre"></div>
                <li id="list-message"><button id="button-message" class="button-nav">
                        <ion-icon name="mail"></ion-icon><span>Message</span>
                    </button></li>
            </ul>
        </nav>
    </div>
    <div class="section-container">
        <section id="personnalInformation" class="hideSection">
            <h2>
                <ion-icon name="person"></ion-icon>Personnal Information
            </h2>
            <h3>Update your personnal information</h3>
            <form action="../index.php?contr=user&action=update" method="POST">
                <div>
                    <label for="pseudo">Pseudo</label>
                    <input type="text" value="<?php echo htmlspecialchars($personals['pseudo']); ?>" name="pseudo">
                    <input type="submit" value="modify" name="modifyPersonnal">
                </div>
                <div>
                    <label for="name">Name</label>
                    <input type="text" value="<?php echo htmlspecialchars($personals['name']); ?>" name="name">
                    <input type="submit" value="modify" name="modifyPersonnal">
                </div>
                <div>
                    <label for="surname">Surname</label>
                    <input type="text" value="<?php echo htmlspecialchars($personals['surname']); ?>" name="surname">
                    <input type="submit" value="modify" name="modifyPersonnal">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" value="<?php echo htmlspecialchars($personals['email']); ?>" name="email">
                    <input type="submit" value="modify" name="modifyPersonnal">
                </div>
                <div>
                    <label for="phoneNumber">Phone number</label>
                    <input type="text" value="<?php echo htmlspecialchars($personals['phoneNumber']); ?>" name="phoneNumber">
                    <input type="submit" value="modify" name="modifyPersonnal">
                </div>
            </form>
        </section>
        <section id="preference" class="hideSection">
            <h2>
                <ion-icon name="color-palette"></ion-icon>Preferences
            </h2>
            <h3>Update your preferences</h3>
            <form action="../index.php?contr=user&action=update" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="avatar">Your Avatar</label>
                    <div class="file-container">
                        <input id="avatar" type="file" value="" name="avatar">
                        <div class="file-div">
                            <p>Click or drop to upload your image</p>
                        </div>
                    </div>
                    <input type="submit" value="modify" name="modifyPreference">
                </div>
                <div>
                    <label for="music">Music</label>
                    <select name="music">
                        <option value="<?php echo htmlspecialchars($preferences['music']); ?>" selected><?php echo htmlspecialchars($preferences['music']); ?></option>
                        <option value="No music!">No music!</option>
                        <option value="Yeah why not">Yeah why not</option>
                        <option value="Music non-stop!">Music non-stop!</option>
                    </select>
                    <input type="submit" value="modify" name="modifyPreference">
                </div>
                <div>
                    <label for="talk">Talk</label>
                    <select name="talk">
                        <option value="<?php echo htmlspecialchars($preferences['talk']); ?>" selected><?php echo htmlspecialchars($preferences['talk']); ?></option>
                        <option value="No talking!">No talking!</option>
                        <option value="Yeah why not">Yeah why not</option>
                        <option value="Talking all the way!">Talking all the way!</option>
                    </select>
                    <input type="submit" value="modify" name="modifyPreference">
                </div>
                <div>
                    <label for="pet">Pet</label>
                    <div class="radio-div">
                        <div>
                            <input type="radio" value="No pet allowed!" name="pet" id="noPet" <?php if ($preferences['pet'] == 'No pet allowed!') : echo 'checked';
                                                                                                endif; ?>>
                            <label for="noPet">No pet allowed!</label>
                        </div>
                        <div>
                            <input type="radio" value="I love pet!" name="pet" id="yesPet" <?php if ($preferences['pet'] == 'I love pet!') : echo 'checked';
                                                                                            endif; ?>>
                            <label for="yesPet">I love pet!</label>
                        </div>
                    </div>
                    <input type="submit" value="modify" name="modifyPreference">
                </div>
                <div>
                    <label for="smoker">Smoker</label>
                    <div class="radio-div">
                        <div>
                            <input type="radio" value="No smoker!" name="smoker" id="noSmoke" <?php if ($preferences['smoker'] == 'No smoker!') : echo 'checked';
                                                                                                endif; ?>>
                            <label for="noSmoke">Smoke-free ride!</label>
                        </div>
                        <div>
                            <input type="radio" value="Smoker allowed" name="smoker" id="yesSmoke" <?php if ($preferences['smoker'] == 'Smoker allowed') : echo 'checked';
                                                                                                    endif; ?>>
                            <label for="yesSmoke">Smoker Allowed</label>
                        </div>
                    </div>
                    <input type="submit" value="modify" name="modifyPreference">
                </div>
                <div>
                    <label for="light">Light mode :</label>
                    <div class="radio-div">
                        <div>
                            <input type="radio" value="dark" name="light" id="lightD" <?php if ($preferences['light'] == 'dark') : echo 'checked';
                                                                                        endif; ?>>
                            <label for="lightD">Dark mode</label>
                        </div>
                        <div>
                            <input type="radio" value="bright" name="light" id="lightB" <?php if ($preferences['light'] == 'bright') : echo 'checked';
                                                                                        endif; ?>>
                            <label for="lightB">Bright mode</label>
                        </div>
                    </div>
                    <input type="submit" value="modify" name="modifyPreference">
                </div>
            </form>
        </section>
        <section id="showRide">
            <h2>
                <ion-icon name="car"></ion-icon>Ride
            </h2>
            <div class="allRides ">
                <h3>
                    <p> As Driver <span><?php echo count($journeys); ?></span></p>
                    <ion-icon name="chevron-down-outline"></ion-icon>
                </h3>
                <div class="allRide rideDrivers">
                    <?php
                    foreach ($journeys as $journey) :
                    ?>
                        <div class="rideDriver">
                            <?php
                            if ($journey['statusRide'] = 'in progress') :
                            ?>
                                <p>Date : <span><?php echo htmlspecialchars($journey['dateRide']) ?></span></p>
                                <div>
                                    <div>
                                        <p>Departure : <span><?php echo htmlspecialchars($journey['startingPlace']) ?></span></p>
                                        <p>at : <span><?php echo htmlspecialchars(substr($journey['startingTime'], 0, -3)); ?></span></p>
                                    </div>
                                    <div>
                                        <p>Arrival : <span><?php echo htmlspecialchars($journey['endingPlace']) ?></span></p>
                                        <p>at : <span><?php echo htmlspecialchars(substr($journey['endingTime'], 0, -3)); ?></span></p>
                                    </div>
                                    <div>
                                        <p>Number of seat booked : <?php echo htmlspecialchars($journey['nbReservation']) ?> / <span><?php echo htmlspecialchars($journey['nbSeat']) ?></span></p>
                                    </div>
                                    <form action="../index.php?contr=ride&action=cancelRide" method="POST">
                                        <input type="hidden" name="rideId" value="<?php echo $journey['journey_id'] ?>">
                                        <input type="submit" name="cancelRide" value="cancel ride">
                                    </form>
                                </div>
                            <?php
                            else :
                            ?>
                                <p>No ride</p>
                            <?php
                            endif;
                            ?>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
                <h3>
                    <p>As Passenger <span><?php echo count($journeysPassenger); ?></span></p>
                    <ion-icon name="chevron-down-outline"></ion-icon>
                </h3>
                <div class="allRide ridePassengers">
                    <?php
                    if (isset($journeysPassenger) and !empty($journeysPassenger)) :
                        foreach ($journeysPassenger as $journeyPassenger) :
                    ?>
                            <div class="rideDriver">
                                <?php
                                if ($journeyPassenger['statusRide'] = 'in progress') :
                                ?>
                                    <p>Date : <span><?php echo htmlspecialchars($journeyPassenger['dateRide']) ?></span></p>
                                    <div>
                                        <div>
                                            <p>Departure : <span><?php echo htmlspecialchars($journeyPassenger['startingPlace']) ?></span></p>
                                            <p>at : <span><?php echo htmlspecialchars(substr($journeyPassenger['startingTime'], 0, -3)); ?></span></p>
                                        </div>
                                        <div>
                                            <p>Arrival : <span><?php echo htmlspecialchars($journeyPassenger['endingPlace']) ?></span></p>
                                            <p>at : <span><?php echo htmlspecialchars(substr($journeyPassenger['endingTime'], 0, -3)); ?></span></p>
                                        </div>
                                        <form action="../index.php?contr=ride&action=cancelReservation" method="POST">
                                            <input type="hidden" name="rideId" value="<?php echo $journeyPassenger['reservation_id'] ?>">
                                            <input type="submit" name="cancelRide" value="cancel reservation">
                                        </form>
                                    </div>
                                <?php
                                else :
                                ?>
                                    <p>No ride</p>
                                <?php
                                endif;
                                ?>
                            </div>
                        <?php
                        endforeach;
                    else :
                        ?>
                        <div>
                            <p>You have booked no ride as passenger</p>
                        </div>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </section>
        <section id="message" class="hideSection">
            <h2>
                <ion-icon name="mail"></ion-icon>Message
            </h2>
            <div class="message-container allRides">
                <h3>
                    <p>Message Recieved <span><?php echo count($messagesRecieved); ?></span></p>
                    <ion-icon name="chevron-down-outline"></ion-icon>
                </h3>
                <div class="message-single" >
                    <?php 
                        if(isset($messagesRecieved) AND !empty($messagesRecieved)):
                            foreach($messagesRecieved as $mR):
                                if(!$mR['messageDeletedDestinataire']):
                                ?>
                                <div class="message-unit">
                                    <h4>Sent by: <span><?php echo htmlspecialchars($mR['name']) . ' ' . htmlspecialchars($mR['surname']);?></span></h4>
                                    <h5><?php echo substr(htmlspecialchars($mR['dateSent']), 0, 10);?></h5>
                                    <p><?php echo htmlspecialchars($mR['content']); ?></p>
                                    <a href="<?php echo '../index.php?contr=user&action=deleteMessageD&id=' . htmlspecialchars($mR['message_id']); ?>">Delete message</a>
                                    <a href="<?php echo '../index.php?contr=user&action=reportMessage&id=' . htmlspecialchars($mR['message_id']); ?>">Report this message</a>
                                </div>
                                <?php
                                endif;
                            endforeach;
                        endif;
                    ?>
                </div>
                <h3>
                    <p>Message Sent <span><?php echo count($messagesSent); ?></span></p>
                    <ion-icon name="chevron-down-outline"></ion-icon>
                </h3>
                <div class="message-single" >
                <?php 
                        if(isset($messagesSent) AND !empty($messagesSent)):
                            foreach($messagesSent as $mS):
                                if(!$mS['messageDeletedSender']):
                                ?>
                                <div class="message-unit">
                                    <h4>Sent to: <span><?php echo htmlspecialchars($mS['name']) . ' ' . htmlspecialchars($mS['surname']);?></span></h4>
                                    <h5><?php echo substr(htmlspecialchars($mS['dateSent']), 0, 10);?></h5>
                                    <p><?php echo htmlspecialchars($mS['content']); ?></p>
                                    <a href="<?php echo '../index.php?contr=user&action=deleteMessageS&id=' . htmlspecialchars($mS['message_id']); ?>">Delete message</a>
                                </div>
                                <?php
                                endif;
                            endforeach;
                        endif;
                    ?>
                </div>
            </div>
        </section>
    </div>
</div>

<?php
if (isset($msg) and !empty($msg)) :
?>
    <div class="<?php if ($msg[1] == 'error') : echo 'erreur';
                else : echo 'sucess';
                endif; ?>"><?php echo $msg[0]; ?></div>
<?php
endif;
?>


<script src="../public/js/userAccountNav.js"></script>