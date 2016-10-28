<div class="all_little_half"></div>
<div class="all_page">
    <div class="titre_first_half">
        <p></p>
    </div>
    <div class="ajouter_livre">
        <?php foreach ($livres as $kk => $value) { ?>
            <form action="<?php echo $global_url_src . '/livres/modifierlivres?profile_livre=' . $_GET['profile_livre']; ?>" method="post" class="ajouter_livres_form" enctype="multipart/form-data"
                  style="<?php if (!empty($value['image'])) { ?>background: url('../images/livres_images/<?php echo $value['image'] ?>') no-repeat;
                      background-size: 100% 100%;<?php } else { ?>
                      background-color: rgba(0,0,0,0.7);
                  <?php } ?>
                  ">
                <input type='hidden' name='id_livre' class='id_livre' value="<?php echo $value['id']; ?>">
                <div class="first_part_form_livre">
                    <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error error_livre_vue error_img_title_length">
                    <p class="error_title_length error_text_livre_vue">La longueur du titre doit être comprise entre 1 et 255 caractères.</p>
                    <p>Titre du livre</p>
                    <input type="text" class="titre_livre" name="titre_livre" value="<?php echo $value['titre'] ?>" placeholder="Titre du livre">
                    <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error error_livre_vue error_img_autor_name_length">
                    <p class="error_autor_name_length error_text_livre_vue">La longueur du nom de l'auteur doit être comprise entre 2 et 50 caractères.</p>
                    <p>Nom de l'auteur</p>
                    <input type="text" class="nom_auteur_livre" name="nom_auteur_livre" value="<?php echo $value['nom_auteur'] ?>" placeholder="Nom de l'auteur">
                    <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error error_livre_vue error_img_collection_length">
                    <div class="conteneur_error">
                        <p class="error_collection_length error_text_livre_vue">La longueur de la collection doit être comprise entre 1 et 50 caractères.</p>
                    </div>
                    <p>Collection</p>
                    <input type="text" class="collection_livre" name="collection_livre" value="<?php echo $value['collection'] ?>" placeholder="Collection">
                </div>
                <div class="second_part_form_livre">
                    <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error error_livre_vue error_img_editeur_length">
                    <p class="error_editeur_length error_text_livre_vue">La longueur de l'editeur doit être comprise entre 1 et 50 caractères.</p>
                    <p>Editeur</p>
                    <input type="text" class="editeur_livre" name="editeur_livre" value="<?php echo $value['editeur'] ?>" placeholder="Editeur">
                    <p class="error_genre_length error_text_livre_vue">La longueur du genre doit être comprise entre 1 et 50 caractères.</p>
                    <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error error_livre_vue error_img_genre_length">
                    <p>Genre du livre</p>
                    <select class="genre_livre" name="genre_livre" value="<?php echo $value['genre'] ?>" placeholder="Genre du livre">
                        <?php
                        foreach ($genre_libelle as $kh => $vh) {
                            if ($kh == $value['id']) {
                                ?>
                                <option value="<?php echo $vh[0]['id'] ?>"><?php echo $vh[0]['libelle'] ?></option>
                                <?php
                            }
                        }
                        ?>
                        <?php foreach ($genres as $kk => $vv) { ?>
                            <option value="<?php echo $vv['id']; ?>">
                                <?php echo $vv['libelle']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <p>Date de parution</p>
                    <input type="date" class="date_parution_livre" name="date_parution_livre" value="<?php echo $value['date_parution'] ?>">
                </div>
                <p>
                    Synopsis
                </p>
                <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error error_livre_vue error_img_synopsis_livre">
                <p class="error_synopsis error_text_livre_vue">Veuillez entrer le synopsis du livre.</p>
                <textarea placeholder="Entrez un synopsis" name="synopsis" class="synopsis"><?php echo $value['synopsis'] ?></textarea>
                <p>Image du livre</p>
                <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error error_livre_vue error_img_img_livre">
                <div class="errors_img">
                    <p class="error_error_img_livre error_text_livre_vue">Une erreur sur l'image est survenue.</p>
                    <p class="error_type_img_livre error_text_livre_vue">Le type de l'image doit être au format JPG.</p>
                    <p class="error_size_img_livre error_text_livre_vue">La taille de l'image doit être inférieurn à 5Mo.</p>
                </div>
                <?php if (empty($value['image'])) { ?>
                    <div class='conteneur_label_text_livre'>
                        <label for="img_livre" class="label_text_livre">Sélectionnez une image</label>
                    </div>
                <?php } else { ?>
                    <!--<div class='conteneur_label_img_livre'></div>-->
                    <label for="img_livre" class='label_img_livre'
                           style="background: url('../images/livres_images/<?php echo $value['image'] ?>') no-repeat;
                           background-size: 100% 100%;">
                                 <!--<img src='<?php // echo $global_url_src;  ?>/images/livres_images/<?php // echo $value['image'];  ?>'>-->
                    </label>
                    <div class='overlay_img_livre' post-id='<?php echo $value['id']; ?>'>
                        <p>Changer d'image</p>
                    </div>
                <?php } ?>
                <input type='hidden' value='<?php echo $value['image'] ?>' name="img_livre_hidden">
                <input type="file" name="img_livre" id="img_livre" post-id="<?php echo $value['id']; ?>" title="Test" value="<?php echo $value['image'] ?>" style="display:none;">
                <input type="submit" value="Modifier" class="submit_livre" name="submit_livre">
            </form>
        <?php } ?>
    </div>
</div>
<div class="all_little_half"></div>