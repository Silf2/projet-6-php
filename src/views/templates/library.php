<div class="greyBackground">
    <div class="libraryHeader">
        <h1>Nos livres à l'échange</h1>
        <form action="?action=filter" method="post">
            <div class="search-container">
                <button type="submit" class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
                <input type="text" name="filter" id="filter" class="search-input" placeholder="Rechercher un livre" />
            </div>
        </form>
    </div>
    <div class="cardBookContainerCenter">
        <div class="cardBookContainer">
            <?php foreach($books as $book) {?>
                <div class="cardBook">
                    <img src="<?= $book->getPicture(); ?>" class="bookCoverCard" />
                    <?php if($book->getDisponibility() === "non dispo."){
                        echo '<p class="nonDispoCard">' . $book->getDisponibility() . '</p>';
                    } 
                    ?>
                    <p class="titleCard"><?= $book->getTitle(); ?></p>
                    <p class="autorCard"><?= $book->getAutor(); ?></p>
                    <p class="vendorCard">Vendu par : <?= $book->getUsername(); ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>