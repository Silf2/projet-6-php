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
        <a href="?action=otherProfile&username=<?= $book->getUsername(); ?>"class="ownerDetail">
            <img src="<?= $book->getProfilePicture(); ?>" class="profilePictureDetail"/>
            <p class="ownerUsername"><?= $book->getUsername(); ?></p>
        </a>
        <a href="?action=message&id=<?= $book->getIdUser(); ?>"><button class="detailButton">Envoyer un message</button></a>
    </div>
</div>