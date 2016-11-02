<?php
if (!empty($livre_like)) {
    foreach ($livre_like as $des_livres_like => $un_livre_like) {
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
//echo '<pre>';
//print_r($commentaires_like);
//echo'<pre>';
//foreach($commentaires_like as $kk => $vv){
//echo '<pre>';
//print_r($vv);
//echo'<pre>';
//    !empty($vv) ? $count_com = count($vv) : $count_com = 0;
//    
//}
//echo $count_com;
if (!empty($commentaires_like)) {
    foreach ($commentaires_like as $des_commentaires_like => $un_commentaire_like) {
        if (!empty($un_commentaire_like[0]['id_user'])) {
            if ($un_commentaire_like[0]['sum_commentaires_like'] == 0 || $un_commentaire_like[0]['sum_commentaires_like'] == -1) {
                ?>
                <input type="hidden" value="-1" post-id="<?php echo $un_commentaire_like[0]['id'] ?>" class="un_livre_commentaire_like_negatif">
            <?php } else { ?>
                <input type="hidden" value="1" post-id="<?php echo $un_commentaire_like[0]['id'] ?>" class="un_livre_commentaire_like_positif">
                <?php
            }
        }
    }
}
?>
<div class="all_little_half"></div>
<div class="big_all">
    <div class="all_first_half un_livre_first_half">
        <div class="titre_first_half">
            <p><?php echo $un_livre[0]['titre'] ?></p>
        </div>
        <div class="infos_un_livre">
            <p>
                <span> Auteur</span>  : <?php echo $un_livre[0]['nom_auteur'] ?>
            </p>
            <p>
                <span>  Collection</span> : <?php echo $un_livre[0]['collection'] ?>
            </p>
            <p>
                <span>  Editeur</span> : <?php echo $un_livre[0]['editeur'] ?>
            </p>
            <p>
                <span>  Date de publication</span> : <?php echo date("d/m/Y", strtotime($un_livre[0]['date_parution'])) ?>
            </p>
        </div>
    </div>
    <div class="all_page">
        <div class="conteneur_image_livre">
            <img src="<?php echo $global_url_src ?>/images/livres_images/<?php echo $un_livre[0]['image'] ?>" class="img_livre_affiche">
            <div class="overlay_img_livre_affiche">
                <div class="first_tool_img_livre_affiche tool_img_livre_affiche">
                    <?php // if (empty($_COOKIE['like_livre_user'])) {      ?>
                    <img src="<?php echo $global_url_src ?>/images/loved.png" alt="J'ai aimé ce livre" post-id="-1" livre-id="<?php echo $un_livre[0]['id'] ?>" element-type="like" like="1" class="like_favorite_png loved_png">
                    <?php // } else{      ?>
                    <img src="<?php echo $global_url_src ?>/images/loved_colored.png" alt="J'ai aimé ce livre" post-id="-1" livre-id="<?php echo $un_livre[0]['id'] ?>" element-type="like" like="-1" class="like_favorite_png second_loved_png second_img_livre_affiche">
                    <?php // }         ?>
                </div>
                <div class="second_tool_img_livre_affiche tool_img_livre_affiche">
                    <img src="<?php echo $global_url_src ?>/images/comment.png" alt="Commenter" class="ecrire_commentaire_comment_png base_img_livre_affiche">
                    <img src="<?php echo $global_url_src ?>/images/comment_colored.png" alt="J'ai aimé ce livre" class="ecrire_commentaire_second_comment_png">
                </div>
                <div class="third_tool_img_livre_affiche tool_img_livre_affiche">
                    <img src="<?php echo $global_url_src ?>/images/favorite.png" alt="J'ai aimé ce livre" post-id="-1" livre-id="<?php echo $un_livre[0]['id'] ?>" element-type="favorite" favorite="1" class="favorite_png like_favorite_png">
                    <img src="<?php echo $global_url_src ?>/images/favorite_colored.png" alt="J'ai aimé ce livre" post-id="-1" livre-id="<?php echo $un_livre[0]['id'] ?>" element-type="favorite" favorite="-1" class="like_favorite_png second_favorite_png second_img_livre_affiche">
                </div>
            </div>
            <div class="ecrire_commentaire">
                <input type="hidden" class="hidden_commentaire" livre-id="<?php echo $un_livre[0]['id'] ?>">
                <textarea placeholder="Ecrire un commentaire..." class="text_commentaire"></textarea> 
                <input type="button" class="submit_commentaire" id_element="<?php echo $un_livre[0]['id'] ?>" livre_user="<?php echo $un_livre[0]['id_user'] ?>" value="Commenter !">
            </div>

        </div>
    </div>

    <div class="all_second_half un_livre_second_half">
        <div class="titre_second_half">
            <p>
                Commentaires
            </p>
        </div>
        <?php if (!empty($commentaires)) { ?>
            <?php foreach ($commentaires as $les_commentaires => $un_commentaire) { ?>
                <?php
                $check = check($un_commentaire['date_ajout']);
                ?>
                <div class="commentaires_livre">
                    <div class="infos_user_commentaire">
                        <p>
                            <?php echo $un_commentaire['nom_user'] . " " . $un_commentaire['prenom_user']; ?>
                        </p>
                    </div>
                    <div class="le_commentaire">
                        <p>
                            <?php echo $un_commentaire['valeur']; ?>
                        </p>
                    </div>
                    <div class="like_commentaire">
                        <img src="<?php echo $global_url_src ?>/images/loved.png" alt="J'ai aimé ce commentaire" id_commentaire="<?php echo $un_commentaire['id']; ?>" post-id="<?php echo $les_commentaires; ?>" id_element="<?php echo $un_livre[0]['id'] ?>" element-type="like" like="1" class="comment_png loved_png">
                        <img src="<?php echo $global_url_src ?>/images/loved_colored.png" alt="J'ai aimé ce commentaire" id_commentaire="<?php echo $un_commentaire['id']; ?>" post-id="<?php echo $les_commentaires; ?>" id_element="<?php echo $un_livre[0]['id'] ?>" element-type="like" like="-1" class="comment_png second_loved_png second_img_livre_affiche">
                    </div>
                    <div class="date_commentaire">
                        <?php echo ($check); ?>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>
<div class="all_little_half"></div>