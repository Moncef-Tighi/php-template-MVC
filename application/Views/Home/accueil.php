<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue</h1>
    <p><?php echo htmlspecialchars($name);?></p>

    <ul>
        <?php foreach($couleurs as $couleur) {
            echo "<li>".htmlspecialchars($couleur)."</li>";
        }
        ?>
    </ul>
</body>
</html>
