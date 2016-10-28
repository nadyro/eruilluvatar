<div style="color:white;">
    <?php
//    var_dump($livre_like);
//    die();
//var_dump($_COOKIE['like_livre_user']);
//var_dump($un_livre[0]['id'] . "_" . "1" . "_" . $_SESSION['user']['id']);
    ?>
</div>
<?php
//var_dump($_SESSION['user']['id']);
if (!empty($livre_like)) {
    foreach ($livre_like as $des_livres_like => $un_livre_like) {
//        var_dump($un_livre_like['id_user']);
        if ($un_livre_like['id_user'] == $_SESSION['user']['id']) {
            if ($un_livre_like['sum_livre_like'] == 0 || $un_livre_like['sum_livre_like'] == -1) {
                ?>
                <input type="hidden" value="-1" id="un_livre_like_negatif">
            <?php } else { ?>
                <input type="hidden" value="1" id="un_livre_like_positif">
                <?php
            }
        }
    }
}

if (!empty($livre_favorite)) {
    foreach ($livre_favorite as $des_livres_favorite => $un_livre_favorite) {
        if ($un_livre_favorite['id_user'] == $_SESSION['user']['id']) {
            if ($un_livre_favorite['sum_livre_favorite'] == 0 || $un_livre_favorite['sum_livre_favorite'] == -1) {
                ?>
                <input type="hidden" value="-1" id="un_livre_favorite_negatif">
            <?php } else { ?>
                <input type="hidden" value="1" id="un_livre_favorite_positif">
                <?php
            }
        }
    }
}
?>
<div class="all_page">
    <div class="conteneur_image_livre">
        <img src="/myproject/images/livres_images/<?php echo $un_livre[0]['image'] ?>" class="img_livre_affiche">
        <div class="overlay_img_livre_affiche">
            <div class="first_tool_img_livre_affiche tool_img_livre_affiche">
                <?php // if (empty($_COOKIE['like_livre_user'])) {   ?>
                <img src="/myproject/images/loved.png" alt="J'ai aimé ce livre" livre-id="<?php echo $un_livre[0]['id'] ?>" like="1" class="loved_png base_img_livre_affiche">
                <?php // } else{   ?>
                <img src="/myproject/images/loved_colored.png" alt="J'ai aimé ce livre" livre-id="<?php echo $un_livre[0]['id'] ?>" like="-1" class="second_loved_png second_img_livre_affiche">
                <?php // }    ?>
            </div>
            <div class="second_tool_img_livre_affiche tool_img_livre_affiche">
                <img src="/myproject/images/comment.png" alt="Commenter" livre-id="<?php echo $un_livre[0]['id'] ?>" like="1"  class="comment_png base_img_livre_affiche">
                <img src="/myproject/images/comment_colored.png" alt="J'ai aimé ce livre" livre-id="<?php echo $un_livre[0]['id'] ?>" like="-1" class="second_comment_png second_img_livre_affiche">
            </div>
            <div class="third_tool_img_livre_affiche tool_img_livre_affiche">
                <img src="/myproject/images/favorite.png" alt="J'ai aimé ce livre" livre-id="<?php echo $un_livre[0]['id'] ?>" favorite="1" class="favorite_png base_img_livre_affiche">
                <img src="/myproject/images/favorite_colored.png" alt="J'ai aimé ce livre" livre-id="<?php echo $un_livre[0]['id'] ?>" favorite="-1" class="second_favorite_png second_img_livre_affiche">
            </div>
        </div>

    </div>
</div>
<div class="all_little_half"></div>
<div class="all_first_half un_livre_first_half">
    <div class="titre_first_half">
        <p><?php echo $un_livre[0]['titre'] ?></p>
    </div>
    <div class="infos_un_livre">
        <p>
            Auteur : <span><?php echo $un_livre[0]['nom_auteur'] ?></span>
        </p>
        <p>
            Collection : <span><?php echo $un_livre[0]['collection'] ?></span>
        </p>
        <p>
            Editeur : <span><?php echo $un_livre[0]['editeur'] ?></span>
        </p>
        <p>
            Date de publication : <span><?php echo date("d/m/Y", strtotime($un_livre[0]['date_parution'])) ?></span>
        </p>
    </div>
</div>
<div class="all_second_half">
    <div class="titre_second_half">
        <p></p>
    </div>
</div>
<div class="all_little_half"></div>