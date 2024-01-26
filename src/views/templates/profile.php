<div class="greyBackground">
    <h1 class="pageTitle">Mon compte</h1>
    <div class="profileTop">
        <div class="profileLeft">
            <?php 
                if(!$user->getProfilePicture()){
                    echo '<img src="../src/images/profilePicture/Mask group.png" class="profilePicture"/>';
                } else {
                    echo '<img src=' . $user->getProfilePicture() . ' class="profilePicture"/>';
                }
            ?>
            <form action="?action=modifyPP" method="post" enctype="multipart/form-data" class="modifyPictureForm">
                <label for="profilePictureButton" class="uploadPP">Choisir un fichier</label>
                <input type="file" name="profilePicture" id="profilePictureButton" required>
                <button type="submit" class="modifyPicture">Modifier</button>
            </form>
            <div class="profileSeparation"></div>
            <h1 class="username"><?php echo $user->getUsername();?></h1>
            <p class="member">Membre depuis 1 an</p>
            <p class="library">Bibliothèque</p>
            <p class="bookPossessed">0 livre</p>
        </div>
        <div class="profileRight">
            <form action="index.php?action=modifyUser" method="post" class="formProfile">
                <p class="formProfileTitle">Vos informations personnelles</p>
                <p class="requiredValue">Adresse email</p>
                <input type="email" name="email" id="email" value="<?php echo $user->getEmail(); ?>" required>
                <p class="requiredValue">Mot de passe</p>
                <input type="password" name="password" id="password" required>
                <p class="requiredValue">Pseudo</p>
                <input type="text" name="username" id="username" value="<?php echo $user->getUsername(); ?>"required>
                </br>
                <button>Enregistrer</button>
            </form>
        </div>
    </div>
</div>