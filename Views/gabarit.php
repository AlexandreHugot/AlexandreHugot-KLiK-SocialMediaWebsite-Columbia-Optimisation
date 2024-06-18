<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title> 
    <link href="css/list-page.css" rel="stylesheet">
    <link href="css/loader.css" rel="stylesheet">
    <?php include 'assets/HTML-head.php'; ?>
</head>
<body>
    <!-- Including the navbar from an other file (for no code regression) -->
    <?php include 'assets/navbar.php'; ?>

    <?= $content ?>

    <!-- Including the footer from an other file (for no code regression) -->
    <?php include 'assets/footer.php'; ?>
    
    <!-- Including some js script -->
    <?php include 'assets/HTML-footer.php'; ?>
</body>
</html>
