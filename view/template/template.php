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
    <link rel="stylesheet" href="../public/css/general.css" >
    <link rel="stylesheet" href="../public/css/header.css" >
    <link rel="stylesheet" href="../public/css/formulaire.css" >
</head>
<body>
    
    <?php if(isset($contentHeader)){echo $contentHeader; }?>
    
    <?php echo $content; ?>

    <script src="../public/js/erreurSucess.js"></script>

</body>
</html>