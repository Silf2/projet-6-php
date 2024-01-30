<div class="greyBackground">
    <a href="?action=profile" class="back">retour</a>
    <h1>Modifier un Livre</h1>
    <form action="?action=editBook&id=<?php echo $book->getId(); ?>" method="post" enctype="multipart/form-data" class="addBook">
        <div class="addBookLeft">
            <p class="requiredValue">Photo</p>
            <img src="<?php echo $book->getPicture(); ?>" class="bookPicture"/>
            <label for="bookPictureButton" class="uploadBookPicture">Modifier la photo</label>
            <input type="file" name="bookPicture" id="bookPictureButton">
        </div>
        <div class="addBookRight">
            <p class="requiredValue">Titre</p>
            <input type="text" name="title" id="title" value ="<?php echo $book->getTitle(); ?>" required>
            <p class="requiredValue">Auteur</p>
            <input type="text" name="autor" id="autor" value ="<?php echo $book->getAutor(); ?>"  required>
            <p class="requiredValue">Commentaire</p>
            <textarea name="comment" id="comment" required><?php echo $book->getComment(); ?></textarea>
            <p class="requiredValue">Disponibilité</p>
            <select id="disponibility" name="disponibility">
                <option value="disponible">Disponible</option>
                <option value="non dispo.">Non disponible</option>
            </select>
            <button>Ajouter</button>
        </div>
    </form>
</div>