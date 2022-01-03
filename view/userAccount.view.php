<?php $pageTitle = 'Your Account'; ?>

<p>This is the user account</p>



    <h2>Personnal Information</h2>
    <form action="../index.php?contr=user&action=update" method="POST" >
        <div>
            <label for="pseudo">Pseudo</label>
            <input type="text" value="<?php echo htmlspecialchars($personals['pseudo']); ?>" name="pseudo" >
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

    <h2>Preferences</h2>
    <form action="../index.php?contr=user&action=update" method="POST" >
        <div>
            <label for="avatar">Your Avatar</label>
            <input type="text" value="<?php echo htmlspecialchars($preferences['avatar']); ?>" name="avatar">
            <input type="submit" value="modify" name="modifyPreference">
        </div>
        <div>
            <label for="music">Music</label>
            <input type="text" value="<?php echo htmlspecialchars($preferences['music']); ?>" name="music" >
            <input type="submit" value="modify" name="modifyPreference">
        </div>
        <div>
            <label for="talk">Talk</label>
            <input type="text" value="<?php echo htmlspecialchars($preferences['talk']); ?>" name="talk">
            <input type="submit" value="modify" name="modifyPreference">
        </div>
        <div>
            <label for="pet">Pet</label>
            <input type="text" value="<?php echo htmlspecialchars($preferences['pet']); ?>" name="pet">
            <input type="submit" value="modify" name="modifyPreference">
        </div>
        <div>
            <label for="smoker">Smoker</label>
            <input type="email" value="<?php echo htmlspecialchars($preferences['smoker']); ?>" name="smoker">
            <input type="submit" value="modify" name="modifyPreference">
        </div>
    </form>
    