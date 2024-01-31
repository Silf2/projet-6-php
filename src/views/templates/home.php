<div class="homeDiscover">
    <div class="homeLeftContainer">
        <h1>Rejoignez nos lecteurs passionnés</h1>
        <p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage des connaissances et d'histoires à travers les livres</p>
        <button>Découvrir</button>
    </div>
    <img src="../src/images/hamza-nouasria-KXrvPthkmYQ-unsplash 1.png"/>
</div>

<div class="lastUpdate">
    <h1>Les derniers livres ajoutés</h1>
    <div class="cardBookContainer">
        <?php for ($i = 0; $i < min(4, count($books)); $i++) { ?>
            <div class="cardBook">
                <img src="<?= $books[$i]->getPicture(); ?>" class="bookCoverCard" />
                <?php if($books[$i]->getDisponibility() === "non dispo."){
                    echo '<p class="nonDispoCard">' . $books[$i]->getDisponibility() . '</p>';
                } 
                ?>
                <p class="titleCard"><?= $books[$i]->getTitle(); ?></p>
                <p class="autorCard"><?= $books[$i]->getAutor(); ?></p>
                <p class="vendorCard">Vendu par : <?= $books[$i]->getUsername(); ?></p>
            </div>
        <?php } ?>
    </div>
    <button>Voir tous les livres</button>
</div>

<div class="homePresentation">
    <h1>Comment ça marche ?</h1>
    <p>Échanger des livres avec TomTroc c'est simple et amusant ! Suivez ces étapes pour commencer :</p>
    <div class="homePresentationDisplayCards">
        <p class="homeCards">Inscrivez-vous gratuitement sur notre plateforme.</p>
        <p class="homeCards">Ajoutez les livres que vous souhaitez échanger à votre profil.</p>
        <p class="homeCards">Parcourez les livres disponibles chez d'autres membres.</p>
        <p class="homeCards">Proposez un échange et discutez avec d'autres passionnés de lecture.</p>
    </div>
    <button>Voir tous les livres</button>
   <img src="../src/images/clay-banks-4uH8rdyEbH4-unsplash 1.png" class="band" />

   <div class="homePresentationText">
        <h1>Nos valeurs</h1>
        <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.</p>
        <p>Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.</p>
        <p>Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>
   </div>
    
</div>