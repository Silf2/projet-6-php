<div class="greyBackground">
    <a class="back">retour</a>
    <h1>Ajouter un Livre</h1>
    <form action="?action=addBook" method="post" enctype="multipart/form-data" class="addBook">
        <div class="addBookLeft">
            <p class="requiredValue">Photo</p>
            <img src="../src/images/bookCover/frosty-ilze-tfYL1j1jKNo-unsplash 1.png" class="bookPicture"/>
            <label for="bookPictureButton" class="uploadBookPicture">Ajouter une photo</label>
            <input type="file" name="bookPicture" id="bookPictureButton">
        </div>
        <div class="addBookRight">
            <p class="requiredValue">Titre</p>
            <input type="text" name="title" id="title" required>
            <p class="requiredValue">Auteur</p>
            <input type="text" name="autor" id="autor" required>
            <p class="requiredValue">Commentaire</p>
            <textarea name="comment" id="comment" required></textarea>
            <p class="requiredValue">Disponibilité</p>
            <select id="disponibility" name="disponibility">
                <option value="disponible">Disponible</option>
                <option value="non dispo.">Non disponible</option>
            </select>
            <button>Ajouter</button>
        </div>
    </form>
</div>