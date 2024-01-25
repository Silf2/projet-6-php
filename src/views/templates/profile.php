<div class="greyBackground">
    <h1 class="pageTitle">Mon compte</h1>
    <div class="profileTop">
        <div class="profileLeft">
            <img src="../src/images/Mask group.png" class="profilePicture"/>
            <a class="modifyPicture">modifier</a>
            <div class="profileSeparation"></div>
            <h1 class="username"><?php echo $user->getUsername();?></h1>
            <p class="member">Membre depuis 1 an</p>
            <p class="library">Bibliothèque</p>
            <p class="bookPossessed">0 livre</p>
        </div>
        <div class="profileRight">
            <form action="index.php?action=Rine" method="post" class="formProfile">
                <p class="formProfileTitle">Vos informations personnelles</p>
                <p class="requiredValue">Adresse email</p>
                <input type="email" name="email" id="email" value="<?php echo $user->getEmail(); ?>" required>
                <p class="requiredValue">Mot de passe</p>
                <input type="password" name="password" id="password" value="FauxMotDePasse"required>
                <p class="requiredValue">Pseudo</p>
                <input type="text" name="username" id="username" value="<?php echo $user->getUsername(); ?>"required>
                </br>
                <button>Enregistrer</button>
            </form>
        </div>
    </div>
</div>