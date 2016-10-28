<?php

class genresController {

    public function indexAction($args) {
        $v = new view();
        $v->setView("livres/afficher");
    }

    public function ajoutergenresAction($args) {
        $v = new view();
        $v->setView("genres/ajouter");
        $validation_form = true;
        $dir_name = dirname(dirname(dirname(__FILE__)));
        if (!empty($_POST)) {
            if (!empty($_POST['libelle_genre']) && !empty($_FILES['img_genre'])) {
                if (strlen($_POST['libelle_genre']) <= 1 || strlen($_POST['libelle_genre']) > 50) {
                    echo "<input type='hidden' value='0' class='error_livre error_title_length'>";
                    $validation_form = false;
                }
                if ($_FILES['img_genre']['error'] != 0) {
                    echo "<input type='hidden' value='5' class='error_livre error_error_img_livre'>";
                    $validation_form = false;
                }
                if ($_FILES['img_genre']['size'] > 5120000) {
                    echo "<input type='hidden' value='6' class='error_livre error_size_img_livre'>";
                    $validation_form = false;
                }
                if ($_FILES['img_genre']['type'] != "image/jpeg") {
                    echo "<input type='hidden' value='7' class='error_livre error_type_img_livre'>";
                    $validation_form = false;
                }


                if ($validation_form != false) {
                    $nom_img_md5 = md5($_FILES['img_genre']['name']).".jpg";
                    $img_md5 = $dir_name."/images/genres_images/". $nom_img_md5;
                    
                    if(move_uploaded_file($_FILES['img_genre']['tmp_name'],$img_md5)){
                        
                    }else{
                        die();
                    }
                    $genres = new Genres();
                    $genres->setLibelle($_POST['libelle_genre']);
                    $genres->setImage($nom_img_md5);
                    $genres->setDate_ajout(date("Y-m-d-G-i-s", strtotime("now")));
                    $genres->save();
                    header("Refresh:0");
                }
            } else {
                
            }
        }
    }

}
