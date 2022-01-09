<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800&family=Open+Sans:wght@300;400;500;600;700&family=Poppins:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <?php 
            if(isset($_SESSION['light']) AND !empty($_SESSION['light'])):
                if($_SESSION['light'] == 'bright'):
                    ?><link rel="stylesheet" href="../public/css/brightMode.css"><?php
                    elseif($_SESSION['light'] == 'dark'):
                    ?><link rel="stylesheet" href="../public/css/darkMode.css"><?php
                endif;
            else:
                ?><link rel="stylesheet" href="../public/css/brightMode.css"><?php
            endif;   
    ?>
    <link rel="stylesheet" href="../public/css/general.css" >
    <link rel="stylesheet" href="../public/css/header.css" >
    <?php      
        if(isset($contentCss)):
        foreach($contentCss as $c):
            ?><link rel="stylesheet" href=<?php echo $c; ?>><?php
            endforeach;
        endif;
    ?>
</head>
<body>
    
    <?php if(isset($contentHeader)){echo $contentHeader; }?>
    
    <?php echo $content; ?>

    <script src="../public/js/erreurSucess.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>