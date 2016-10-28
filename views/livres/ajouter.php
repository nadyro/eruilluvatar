<div class="all_little_half"></div>
<div class="all_first_half">
    <div class="titre_first_half">
        <p></p>
    </div>
    <div class="ajouter_livre">
        <form action="<?php echo $global_url_src . '/livres/ajouterlivres' ?>" method="post" class="ajouter_livres_form" enctype="multipart/form-data">
            <input type="hidden" name="id_user_livre" value="<?php echo $_SESSION['user']['id']; ?>">
            <div class="first_part_form_livre">
                <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error error_livre_vue error_img_title_length">
                <p class="error_title_length error_text_livre_vue">La longueur du titre doit être comprise entre 1 et 50 caractères.</p>
                <p>Titre du livre</p>
                <input type="text" class="titre_livre" name="titre_livre" value="<?php echo!empty($_POST) ? $_POST['titre_livre'] : "" ?>" placeholder="Titre du livre">
                <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error error_livre_vue error_img_autor_name_length">
                <p class="error_autor_name_length error_text_livre_vue">La longueur du nom de l'auteur doit être comprise entre 2 et 255 caractères.</p>
                <p>Nom de l'auteur</p>
                <input type="text" class="nom_auteur_livre" name="nom_auteur_livre" value="<?php echo!empty($_POST) ? $_POST['nom_auteur_livre'] : "" ?>" placeholder="Nom de l'auteur">
                <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error error_livre_vue error_img_collection_length">
                <div class="conteneur_error">
                    <p class="error_collection_length error_text_livre_vue">La longueur de la collection doit être comprise entre 1 et 50 caractères.</p>
                </div>
                <p>Collection</p>
                <input type="text" class="collection_livre" name="collection_livre" value="<?php echo!empty($_POST) ? $_POST['collection_livre'] : "" ?>" placeholder="Collection">
            </div>
            <div class="second_part_form_livre">
                <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error error_livre_vue error_img_editeur_length">
                <p class="error_editeur_length error_text_livre_vue">La longueur de l'editeur doit être comprise entre 1 et 50 caractères.</p>
                <p>Editeur</p>
                <input type="text" class="editeur_livre" name="editeur_livre" value="<?php echo!empty($_POST) ? $_POST['editeur_livre'] : "" ?>"placeholder="Editeur">
                <p class="error_genre_length error_text_livre_vue">La longueur du genre doit être comprise entre 1 et 50 caractères.</p>
                <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error error_livre_vue error_img_genre_length">
                <p>Genre du livre</p>
                <select class="genre_livre" name="genre_livre" value="<?php echo!empty($_POST) ? $_POST['genre_livre'] : "" ?>"placeholder="Genre du livre">
                    <option value=""></option>
                    <?php foreach ($genres as $kk => $vv) { ?>
                        <option value="<?php echo $vv['id']; ?>">
                            <?php echo $vv['libelle']; ?>
                        </option>
                    <?php } ?>
                </select>
                <p>Date de parution</p>
                <input type="date" class="date_parution_livre" name="date_parution_livre" value="<?php echo!empty($_POST) ? $_POST['date_parution_livre'] : "" ?>">
            </div>
            <p>
                Synopsis
            </p>
            <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error error_livre_vue error_img_synopsis_livre">
            <p class="error_synopsis error_text_livre_vue">Veuillez entrer le synopsis du livre.</p>
            <textarea placeholder="Entrez un synopsis" name="synopsis" class="synopsis"><?php echo!empty($_POST) ? $_POST['synopsis'] : "" ?></textarea>
            <p>Image du livre</p>
            <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error error_livre_vue error_img_img_livre">
            <div class="errors_img">
                <p class="error_error_img_livre error_text_livre_vue">Une erreur sur l'image est survenue.</p>
                <p class="error_type_img_livre error_text_livre_vue">Le type de l'image doit être au format JPG.</p>
                <p class="error_size_img_livre error_text_livre_vue">La taille de l'image doit être inférieurn à 5Mo.</p>
            </div>
            <input type="file" name="img_livre" value="<?php echo!empty($_POST) ? $_FILES['img_livre']['name'] : "" ?>">
            <input type="submit" value="Ajouter" class="submit_livre" name="submit_livre">
        </form>
    </div>
</div>
<div class="all_second_half">
    <div class="titre_second_half">
        <p></p>
    </div>
    <div class="modification_livre">

    </div>
</div>

<div class="all_little_half"></div>