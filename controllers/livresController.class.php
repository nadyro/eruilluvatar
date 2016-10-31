<?php

class livresController {

    public function indexAction($args) {
        $v = new view();
        $v->setView("livres/afficher");
        $un_livre = getAllLivres(0, $_GET['post_id_livre']);
        $v->assign("un_livre", $un_livre);
        $livre_like = getLivres_Likes($_GET['post_id_livre'], $_COOKIE['cookie_users'], 1);
        if (!empty($livre_like)) {
            $v->assign("livre_like", $livre_like);
        }
        $livre_favorite = getLivres_Favorite($_GET['post_id_livre'], $_COOKIE['cookie_users']);
        if (!empty($livre_favorite)) {
            $v->assign("livre_favorite", $livre_favorite);
        }

        $commentaires = getCommentaires($_GET['post_id_livre']);
        if (!empty($commentaires)) {
            $v->assign("commentaires", $commentaires);
        }
        $commentaires_like = getCommentaires_Likes($_GET['post_id_livre'], $_COOKIE['cookie_users'], 2);
//        var_dump($commentaires_like);
//        die();
//        $com_test = test_commentaires_likes($_GET['post_id_livre'], $_COOKIE['cookie_users'], 2);
        if (!empty($commentaires_like)) {
            $v->assign("commentaires_like", $commentaires_like);
        }
    }

    public function livreslikeAction($args) {
        if (!empty($_GET['user_profile'])) {
            $like_livre = setLivres_Likes($_GET['element_one'], $_GET['user_profile'], date("d/m/y:H:i:s", strtotime("now")), $_GET['element_two'], $_GET['id_type']);
        }
    }

    public function livresfavoriteAction($args) {
        if (!empty($_GET['user_profile'])) {
            $favorite_livre = setLivres_Favorite($_GET['element_one'], $_GET['user_profile'], date("d/m/y:H:i:s", strtotime("now")), $_GET['element_two']);
        }
    }

    public function modifierlivresAction() {
        $v = new view();
        $v->setView("livres/modifier");
        $livres = getAllLivres($id_genre = 0, $id_livre = 0, $_GET['profile_livre']);
        $v->assign("livres", $livres);
        $genres = getGenresLivre();
        $v->assign("genres", $genres);
        $genre_libelle = array();
        foreach ($livres as $key => $value) {
            $genre_libelle[$value['id']] = getLibelleGenre_By_IdLivre($value['id'], $value['genre']);
        }
        $v->assign("genre_libelle", $genre_libelle);
        $nom_img_md5 = "";
        $validation_form = true;
//        var_dump($_FILES);
//        die();
        if (!empty($_POST)) {
            if (!empty($_POST['titre_livre']) && !empty($_POST['nom_auteur_livre']) && !empty($_POST['collection_livre']) && !empty($_POST['editeur_livre']) && !empty($_POST['genre_livre']) && !empty($_POST['date_parution_livre']) && !empty($_FILES['img_livre']) && !empty($_POST['synopsis'])) {
                if (strlen($_POST['titre_livre']) <= 1 || strlen($_POST['titre_livre']) > 255) {
                    echo "<input type='hidden' value='0' class='error_livre error_title_length'>";
                    $validation_form = false;
                    $msg_error = array("1" => "titre");
                }
                if (strlen($_POST['nom_auteur_livre']) < 2 || strlen($_POST['nom_auteur_livre']) > 50) {
                    echo "<input type='hidden' value='1' class='error_livre error_autor_name_length'>";
                    $validation_form = false;
                    $msg_error = array("2" => "Auteur");
                }
                if (strlen($_POST['collection_livre']) < 1 || strlen($_POST['collection_livre']) > 50) {
                    echo "<input type='hidden' value='2' class='error_livre error_collection_length'>";
                    $validation_form = false;
                    $msg_error = array("3" => "Collection");
                }
                if (strlen($_POST['editeur_livre']) < 1 || strlen($_POST['editeur_livre']) > 50) {
                    echo "<input type='hidden' value='3' class='error_livre error_editeur_length'>";
                    $validation_form = false;
                    $msg_error = array("4" => "Editeur");
                }
                if (empty($_POST['genre_livre'])) {
                    echo "<input type='hidden' value='3,5' class='error_livre error_genre_length'>";
                    $validation_form = false;
                    $msg_error = array("5" => "Genre");
                }
                if (empty($_POST['synopsis'])) {
                    echo "<input type='hidden' value='4' class='error_livre error_synopsis_length'>";
                    $validation_form = false;
                    $msg_error = array("6" => "Synopsis");
                }
                if (!empty($_FILES['img_livre']['name'])) {
                    if ($_FILES['img_livre']['error'] != 0) {
                        echo "<input type='hidden' value='5' class='error_livre error_error_img_livre'>";
                        $validation_form = false;
                        $msg_error = array("7" => "img img error");
                    }
                    if ($_FILES['img_livre']['size'] > 5120000) {
                        echo "<input type='hidden' value='6' class='error_livre error_size_img_livre'>";
                        $validation_form = false;
                        $msg_error = array("8" => "img size error");
                    }
                    if ($_FILES['img_livre']['type'] != "image/jpeg") {
                        echo "<input type='hidden' value='7' class='error_livre error_type_img_livre'>";
                        $validation_form = false;
                        $msg_error = array("9" => "img type error");
                    }
                    $nom_img_md5 = md5($_FILES['img_livre']['name']) . ".jpg";
                    $img_md5 = "images/livres_images/" . $nom_img_md5 . ".jpg";

                    if (move_uploaded_file($_FILES['img_livre']['tmp_name'], DIRECTORY_URL . $img_md5)) {
                        
                    } else {
                        
                    }
                }
                if (!empty($msg_error)) {
                    print_r($msg_error);
                }


                if ($validation_form != false) {

                    $livres = new Livres();
                    $livres->setId($_POST['id_livre']);
                    $livres->setId_user($_GET['profile_livre']);
                    $livres->setId_type(1);
                    $livres->setTitre($_POST['titre_livre']);
                    $livres->setNom_auteur($_POST['nom_auteur_livre']);
                    $livres->setCollection($_POST['collection_livre']);
                    $livres->setEditeur($_POST['editeur_livre']);
                    $livres->setGenre($_POST['genre_livre']);
                    $livres->setDate_parution($_POST['date_parution_livre']);
                    if (!empty($_FILES['img_livre']['name']))
                        $livres->setImage($nom_img_md5);
                    else
                        $livres->setImage($_POST['img_livre_hidden']);
                    $livres->setSynopsis($_POST['synopsis']);
                    $livres->save();
                    header("Refresh:0");
                }
            } else {
                
            }
        }
    }

    public function ajouterlivresAction($args) {
        $v = new view();
        $v->setView("livres/ajouter");
        $validation_form = true;
        $msg_error = array();
        $genres = getGenresLivre();
        $v->assign("genres", $genres);
//        var_dump($_POST);
//        die();
        if (!empty($_POST)) {
            if (!empty($_POST['titre_livre']) && !empty($_POST['nom_auteur_livre']) && !empty($_POST['collection_livre']) && !empty($_POST['editeur_livre']) && !empty($_POST['genre_livre']) && !empty($_POST['date_parution_livre']) && !empty($_FILES['img_livre']) && !empty($_POST['synopsis'])) {
                if (strlen($_POST['titre_livre']) <= 1 || strlen($_POST['titre_livre']) > 255) {
                    echo "<input type='hidden' value='0' class='error_livre error_title_length'>";
                    $validation_form = false;
                    $msg_error = array("1" => "titre");
                }
                if (strlen($_POST['nom_auteur_livre']) < 2 || strlen($_POST['nom_auteur_livre']) > 50) {
                    echo "<input type='hidden' value='1' class='error_livre error_autor_name_length'>";
                    $validation_form = false;
                    $msg_error = array("2" => "Auteur");
                }
                if (strlen($_POST['collection_livre']) < 1 || strlen($_POST['collection_livre']) > 50) {
                    echo "<input type='hidden' value='2' class='error_livre error_collection_length'>";
                    $validation_form = false;
                    $msg_error = array("3" => "Collection");
                }
                if (strlen($_POST['editeur_livre']) < 1 || strlen($_POST['editeur_livre']) > 50) {
                    echo "<input type='hidden' value='3' class='error_livre error_editeur_length'>";
                    $validation_form = false;
                    $msg_error = array("4" => "Editeur");
                }
                if (empty($_POST['genre_livre'])) {
                    echo "<input type='hidden' value='3,5' class='error_livre error_genre_length'>";
                    $validation_form = false;
                    $msg_error = array("5" => "Genre");
                }
                if (empty($_POST['synopsis'])) {
                    echo "<input type='hidden' value='4' class='error_livre error_synopsis_length'>";
                    $validation_form = false;
                    $msg_error = array("6" => "Synopsis");
                }
                if ($_FILES['img_livre']['error'] != 0) {
                    echo "<input type='hidden' value='5' class='error_livre error_error_img_livre'>";
                    $validation_form = false;
                    $msg_error = array("7" => "img img error");
                }
                if ($_FILES['img_livre']['size'] > 5120000) {
                    echo "<input type='hidden' value='6' class='error_livre error_size_img_livre'>";
                    $validation_form = false;
                    $msg_error = array("8" => "img size error");
                }
                if ($_FILES['img_livre']['type'] != "image/jpeg") {
                    echo "<input type='hidden' value='7' class='error_livre error_type_img_livre'>";
                    $validation_form = false;
                    $msg_error = array("9" => "img type error");
                }
                if (!empty($msg_error)) {
                    print_r($msg_error);
                }


                if ($validation_form != false) {
                    $nom_img_md5 = md5($_FILES['img_livre']['name']) . ".jpg";
                    $img_md5 = "images/livres_images/" . $nom_img_md5;

                    if (move_uploaded_file($_FILES['img_livre']['tmp_name'], DIRECTORY_URL . $img_md5)) {
                        
                    } else {
                        die();
                    }
                    $livres = new Livres();
                    $livres->setId_user($_POST['id_user_livre']);
                    $livres->setId_type(1);
                    $livres->setTitre($_POST['titre_livre']);
                    $livres->setNom_auteur($_POST['nom_auteur_livre']);
                    $livres->setCollection($_POST['collection_livre']);
                    $livres->setEditeur($_POST['editeur_livre']);
                    $livres->setGenre($_POST['genre_livre']);
                    $livres->setDate_parution($_POST['date_parution_livre']);
                    $livres->setImage($nom_img_md5);
                    $livres->setSynopsis($_POST['synopsis']);
                    $livres->save();
                    header("Refresh:0");
                }
            } else {
                
            }
        }
    }

}
