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
        <p class="bookPossessed"><?php echo $quantityOfBookPossessed; ?> livre</p>
        <button>Écrire un message</button>
    </div>
    <div class="profileRight">
            <table>
                <thead>
                    <tr>Oui</tr>
                    <tr>Oui</tr>
                    <tr>Oui</tr>
                    <tr>Oui</tr>
                    <tr>Oui</tr>
                </thead>
            </table>
    </div>
</div>