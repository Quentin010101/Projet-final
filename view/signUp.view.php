<?php $pageTitle = 'SignUp' ?>

<form action="../index.php?contr=sign&action=signUp" method="POST" >
    <div>
        <label for="">Enter Pseudo</label>
        <input type="text" name="pseudo" >
    </div>
    <div>
        <label for="">Enter Name</label>
        <input type="text" name="name" >
    </div>
    <div>
        <label for="">Enter Surname</label>
        <input type="text" name="surname">
    </div>
    <div>
        <label for="">Enter Email</label>
        <input type="email" name="email">
    </div>
    <div>
        <label for="">Enter password</label>
        <input type="password" name="password" >
    </div>
    <div>
        <label for="">Enter password</label>
        <input type="password" name="passwordConfirmed" >
    </div>
    <div>
        <input type="submit" value="Send">
    </div>

</form>