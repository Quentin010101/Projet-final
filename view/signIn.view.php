<?php $pageTitle = 'SignIn'; ?>

<?php $contentCss = array('./public/css/log.css'); ?>


<form action="index.php?contr=sign&action=signIn" method="POST" >
    <input type="email" name="email" >
    <input type="password" name="password" >
    <input type="submit">
</form>

