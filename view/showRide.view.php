<?php $pageTitle = 'Ride'; ?>

<?php $contentCss = array('./public/css/showRide.css'); ?>

<div class="ride-wrapper">
    <h2><?php echo htmlspecialchars($rideById['startingPlace']); ?> <ion-icon name="arrow-forward-outline"></ion-icon> <?php echo htmlspecialchars($rideById['endingPlace']); ?></h2>

    <h3>Date: <span><?php echo htmlspecialchars($rideById['dateRide']); ?></span></h3>
    <div class="schedule">
        <div>
            <h5><?php echo htmlspecialchars($rideById['startingPlace']); ?> <?php echo substr(htmlspecialchars($rideById['startingTime']), 0, -3); ?></h5>
        </div>
        <div class="ride-duration">
                <div class="line"></div>
                <div>
                    <p><?php echo htmlspecialchars($rideById['rideDistance']); ?> km</p>
                    <p><?php echo htmlspecialchars(intval($rideById['rideTime'])) . 'h' . htmlspecialchars(floor(($rideById['rideTime'] - intval($rideById['rideTime'])) * 60)) . "min"; ?></p>
                </div>
        </div>
        <div>
            <h5><?php echo htmlspecialchars($rideById['endingPlace']); ?> <?php echo substr(htmlspecialchars($rideById['endingTime']), 0, -3); ?></h5>
        </div>
    </div>
    <div class="reservation">
        <form action="../index.php?contr=ride&action=book" method="POST">
            <input type="hidden" name="rideId" value="<?php echo htmlspecialchars($rideById['journey_id']) ?>">
            <input type="submit" name="book" value="Book this ride!">
        </form>
        <div>
            <p>Number of seat already booked: <?php echo count($reservation); ?>/<?php echo htmlspecialchars($rideById['nbSeat']); ?></p>
        </div>
        <div class="reservation-all">
        <?php
        if (isset($reservation)) :
            foreach ($reservation as $r) :
        ?>
                <div class="reservation-single">
                    <div class="avatar-container">
                        <img src="<?php echo '../public/asset/avatar/' . $r['avatar']; ?>" alt="avatar">
                    </div>
                    <div>
                        <p><?php echo htmlspecialchars($r['pseudo']); ?></p>
                        <p><?php echo htmlspecialchars($r['name']); ?></p>
                        <p><?php echo htmlspecialchars($r['surname']); ?></p>
                    </div>
                </div>
        <?php
            endforeach;
        endif;
        ?>
        </div>
    </div>
    <div class="person-description">
        <div class="line"></div>
        <div>
            <div class="avatar-container" >
                <a href="<?php echo '../index.php?contr=user&action=showUser&id=' . htmlspecialchars($rideById['person_id']); ?>">
                    <img src="<?php echo '../public/asset/avatar/' . $rideById['avatar']; ?> " alt="avatar">
                </a>
            </div>
            <div>
                <h4>Posted by <?php echo htmlspecialchars($rideById['name']) . ' ' . htmlspecialchars($rideById['surname']); ?> </h4>
                <h4><?php echo htmlspecialchars($rideById['datePost']); ?></h4>
            </div>
        </div>
        <div class="preference-container">
            <p>Pet : </p>
            <span><?php echo htmlspecialchars($rideById['pet']); ?></span>
            <p>Smoker : </p>
            <span><?php echo htmlspecialchars($rideById['smoker']); ?></span>
            <p>Music : </p>
            <span><?php echo htmlspecialchars($rideById['music']); ?></span>
            <p>Talking : </p>
            <span><?php echo htmlspecialchars($rideById['talk']); ?></span>
        </div>


    </div>
</div>

<?php if (isset($erreur)) : ?>
    <div class="erreur">
        <p> <?php echo htmlspecialchars($erreur) ?></p>
    </div>
<?php endif;
