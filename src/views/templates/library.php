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
            <?php foreach($books as $book) {
                echo sprintf('
                    <a href="?action=detail&id=%d" class="cardBook">
                        <img src="%s" class="bookCoverCard" />
                        <p class="titleCard">%s</p>
                        <p class="autorCard">%s</p>
                        <p class="vendorCard">Vendu par : %s</p>'
                    ,
                    $book->getId(),
                    $book->getPicture(),
                    $book->getTitle(),
                    $book->getAutor(),
                    $book->getUsername()
                );
                if($book->getDisponibility() === "non dispo."){
                    echo '<p class="nonDispoCard">' . $book->getDisponibility() . '</p>';
                };
                echo'</a>'; 
            } ?>
        </div>
    </div>
</div>