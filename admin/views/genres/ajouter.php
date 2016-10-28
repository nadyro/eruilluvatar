<div class="all_little_half"></div>
<div class="all_first_half">
    <div class="titre_first_half">
        <p></p>
    </div>
    <div class="ajouter_livre">
        <form action="<?php echo $global_url_src_admin . 'genres/ajoutergenres' ?>" method="post" class="ajouter_livres_form" enctype="multipart/form-data">
            <div class="first_part_form_livre">
                <img src="<?php echo $global_url_src_admin ?>/images/error.png" class="img_error error_livre_vue error_img_title_length">
                <p class="error_title_length error_text_livre_vue">La longueur du titre doit être comprise entre 1 et 50 caractères.</p>
                <p>Libelle du genre</p>
                <input type="text" class="titre_livre" name="libelle_genre" value="<?php echo!empty($_POST) ? $_POST['libelle_genre'] : "" ?>" placeholder="Libelle du genre">
                <p>Image du genre</p>
                <img src="<?php echo $global_url_src_admin ?>/images/error.png" class="img_error error_livre_vue error_img_img_livre">
                <div class="errors_img">
                    <p class="error_error_img_livre error_text_livre_vue">Une erreur sur l'image est survenue.</p>
                    <p class="error_type_img_livre error_text_livre_vue">Le type de l'image doit être au format JPG.</p>
                    <p class="error_size_img_livre error_text_livre_vue">La taille de l'image doit être inférieurn à 5Mo.</p>
                </div>
                <input type="file" name="img_genre" value="<?php echo !empty($_POST) ? $_FILES['img_genre']['name'] : "" ?>">
            </div>
            <input type="submit" value="Ajouter" class="submit_livre" name="submit_genre">
        </form>
    </div>
</div>
<div class="all_second_half">
    <div class="titre_second_half">
        <p></p>
    </div>
</div>

<div class="all_little_half"></div>