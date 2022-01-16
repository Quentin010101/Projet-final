<?php $pageTitle = 'User'; ?>

<?php $contentCss = array('./public/css/showUser.css'); ?>

<div class="user-wrapper">
    <div class="avatar">
        <img src="<?php echo '../public/asset/avatar/' . htmlspecialchars($preferences['avatar']); ?>" alt="avatar">
    </div>
    <div>
        <div class="line"></div>
        <div>
            <div>
                <h3>Personnal information: </h3>
            </div>
            <div class="personal-container" >
                <h4><?php echo htmlspecialchars($personals['pseudo']); ?></h4>
                <h5><?php echo htmlspecialchars($personals['name']); ?></h5>
                <h5><?php echo htmlspecialchars($personals['surname']); ?></h5>
                <h6>User since: <?php echo substr(htmlspecialchars($personals['date']), 0, 10); ?></h6>
            </div>
        </div>
        <?php
        if (isset($_SESSION['person_id']) and !empty($_SESSION['person_id'])) :
        ?>
            <div class="message-container">
                <button id="button" >Send a message</button>
                <div class="form-container" >
                    <form action="../index.php?contr=user&action=sendMessage" method="post" >
                        <input type="hidden" name="destinataire_id" value="<?php echo htmlspecialchars($personals['person_id'])?>">
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message (500 charactère max)"></textarea>
                        <input type="submit" value="send">
                    </form>
                </div>
            </div>
        <?php
        endif;
        ?>
        <div class="line"></div>
        <div>
            <div>
                <h3>Preferences: </h3>
            </div>
            <div class="preference-container">
                <h5>Music: </h5>
                <span><?php echo htmlspecialchars($preferences['music']); ?></span>
                <h5>Talking: </h5>
                <span><?php echo htmlspecialchars($preferences['talk']); ?></span>
                <h5>Smoker: </h5>
                <span><?php echo htmlspecialchars($preferences['smoker']); ?></span>
                <h5>Pet: </h5>
                <span><?php echo htmlspecialchars($preferences['pet']); ?></span>
            </div>
        </div>
    </div>
</div>

<script src="../public/js/showUserMessage.js"></script>