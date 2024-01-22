<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tom Troc</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <img src="../images/logo.png" class="logo"/>
        <p>Accueil</p>
        <p>Nos livres à l'échange</p>
        <div class="headerSeparation"></div>
        <p><i class="fa-regular fa-comment"></i>Messagerie</p>
        <p>Mon compte</p>
        <p>Connexion</p>
    </header>

    <main>
        <?php require_once("./view/template/register.php")?>
    </main>

    <footer>
        <p>Politique de confidentialité</p>
        <p>Mention légales</p>
        <p>Tom Troc©</p>
        <img src="../images/logo_footer.png" />
    </footer>
</body>