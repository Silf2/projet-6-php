<div class="otherProfile">
    <div class="profileLeft">
        <?php 
            if(!$user->getProfilePicture()){
                echo '<img src="../src/images/profilePicture/Mask group.png" class="profilePicture"/>';
            } else {
                echo '<img src=' . $user->getProfilePicture() . ' class="profilePicture"/>';
            }
        ?>
        <div class="profileSeparation"></div>
        <h1 class="username"><?php echo $user->getUsername();?></h1>
        <p class="member">Membre depuis 1 an</p>
        <p class="library">Bibliothèque</p>
        <p class="bookPossessed"><?php echo $quantityOfBookPossessed; ?> livre(s)</p>
        <button>Écrire un message</button>
    </div>
    <div class="profileRight">
        <table class="allBookPossessed">
            <thead>
                <tr>
                    <th class="pictureArray">Photo</th>
                    <th class="titleArray">Titre</th>
                    <th class="autorArray">Auteur</th>
                    <th class="commentArray">Description</th>
                    <th class="disponibilityArray">Disponibilite</th>
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
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>