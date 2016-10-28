<div class="top_page_suggestions">
    <a href="<?php echo $global_url_src . "/livres/ajouterlivres" ?>">
        <img src="<?php echo $global_url_src ?>/images/ajout_livre.jpg" class="img_suggestions" alt="Ajouter un livre">
        <div class="overlay_img">
            <p>Suggérer un livre</p>
        </div>
    </a>
</div>
<div class="all_little_half"></div>
<div class="all_first_half">
    <div class="titre_first_half">
        <p>Les genres</p>
    </div>
    <div class="conteneur_all_lines">
        <div class="first_line">
            <?php foreach ($genres as $key => $value) { ?>
                <div class="infos_genre" post-id="<?php echo $value['id']; ?>">
                    <img src="<?php echo $global_url_src ?>/images/genres_images/<?php echo $value['image'] ?>">
                    <div class="overlay_img_genre" post-id="<?php echo $value['id'] ?>">
                        <p><?php echo $value['libelle'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="third_line">

        </div>
    </div>
</div>
<div class="all_second_half">
    <div class="titre_second_half">
        <p>Les livres</p>
    </div>
    <div class="conteneur_all_lines">
        <div class="first_line">
            <?php foreach ($livres as $kk => $vv) { ?>
                <div class="infos_livre" post-id="<?php echo $vv['id']; ?>">
                    <img src="<?php echo $global_url_src ?>/images/livres_images/<?php echo $vv['image'] ?>" alt="<?php echo $vv['titre'] ?>" class="img_livre">
                </div>

            <?php } ?>
        </div>
    </div>
</div>

<div class="all_little_half"></div>