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
            <p class="bookPossessed"><?php echo $quantityOfBookPossessed; ?> livre</p>
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
    <table class="allBookPossessed">
        <thead>
            <tr>
                <th class="pictureArray">Photo</th>
                <th class="titleArray">Titre</th>
                <th class="autorArray">Auteur</th>
                <th class="commentArray">Description</th>
                <th class="disponibilityArray">Disponibilite</th>
                <th class="actionArray">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book) { ?>
                <tr>
                    <td class="pictureInArray"><img src="<?= $book->getPicture(); ?>" class="bookPictureSmall"/></td>
                    <td class="titleInArray"><?= $book->getTitle(); ?></td>
                    <td><?= $book->getAutor(); ?></td>
                    <?php 
                        $comment = (strlen($book->getComment()) > 100) ? substr($book->getComment(), 0 , 100) . '...' : $book->getComment();
                        echo'<td class="commentInArray">' . $comment .'</td>';
                    ?>
                    <?php if($book->getDisponibility() === "disponible"){
                        echo '<td><p class="disponible">' . $book->getDisponibility(). '</p></td>';
                    }else{
                        echo '<td><p class="nonDispo">' . $book->getDisponibility(). '</p></td>';
                    }
                    ?>
                    <td class="linkArray"><a>Editer</a><a href="?action=deleteBook&id=<?= $book->getId();?>" class="deleteFromArray">Supprimer</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="?action=formAddBook">Ajouter un livre</a>
</div>