<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tom Troc</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>

<body>
    <header>
        <img src="../src/images/logo.png" class="logo" alt="logo TomTroc"/>
        <a href="index.php?action=home">Accueil</a>
        <a href="?action=library">Nos livres à l'échange</a>
        <div class="headerSeparation"></div>
        <a href="?action=message"><i class="fa-regular fa-comment"></i>Messagerie</a>
        <a href="?action=profile"><i class="fa-solid fa-user"></i>Mon compte</a>
        <?php 
            if (isset($_SESSION['user'])){
                echo'<a href="index.php?action=disconnectUser">Déconnexion</a>';
            }else{
                echo'<a href="index.php?action=register">Connexion</a>';
            }
        ?>    
    </header>

    <main>
        <?= $content /* Ici est affiché le contenu réel de la page. */ ?>
    </main>

    <footer>
        <p>Politique de confidentialité</p>
        <p>Mention légales</p>
        <p>Tom Troc©</p>
        <img src="../src/images/logo_footer.png" alt="logo TomTroc"/>
    </footer>
</body>