<div class="greyBackground">
    <a href="?action=profile" class="back">retour</a>
    <h1>Modifier un Livre</h1>
    <form action="?action=editBook&id=<?= $book->getId(); ?>" method="post" enctype="multipart/form-data" class="addBook">
        <div class="addBookLeft">
            <p class="requiredValue">Photo</p>
            <img src="<?= $book->getPicture(); ?>" class="bookPicture" alt="Photo de la couverture du livre <?= $book->getTitle(); ?>"/>
            <label for="bookPictureButton" class="uploadBookPicture">Modifier la photo</label>
            <input type="file" name="bookPicture" id="bookPictureButton">
        </div>
        <div class="addBookRight">
            <p class="requiredValue">Titre</p>
            <input type="text" name="title" id="title" value ="<?= $book->getTitle(); ?>" required>
            <p class="requiredValue">Auteur</p>
            <input type="text" name="autor" id="autor" value ="<?= $book->getAutor(); ?>"  required>
            <p class="requiredValue">Commentaire</p>
            <textarea name="comment" id="comment" required><?= $book->getComment(); ?></textarea>
            <p class="requiredValue">Disponibilité</p>
            <select id="disponibility" name="disponibility">
                <option value="disponible">Disponible</option>
                <option value="non dispo.">Non disponible</option>
            </select>
            <button>Ajouter</button>
        </div>
    </form>
</div>