<p class="headerDetailPage"><a href="?action=library">Nos livres</a> > <?= $book->getTitle();?></p>
<div class="detailPage">
    <img src="<?= $book->getPicture(); ?>"/>

    <div class="detailPageInfo">
        <h1><?= $book->getTitle(); ?></h1>
        <p class="autorDetail">par <?= $book->getAutor(); ?></p>
        <div class="separationDetail"></div>
        <p class="categorieDetail">DESCRIPTION</p>
        <p class="commentDetail"><?= nl2br($book->getComment());; ?></p>
        <p class="categorieDetail">PROPRIETAIRE</p>
        <div class="ownerDetail">
            <img src="<?= $book->getProfilePicture(); ?>" class="profilePictureDetail"/>
            <p class="ownerUsername"><?= $book->getUsername(); ?></p>
        </div>
        <a><button class="detailButton">Envoyer un message</button></a>
    </div>
</div>