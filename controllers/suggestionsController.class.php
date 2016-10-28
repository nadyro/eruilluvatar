<?php

class suggestionsController {

    public function indexAction($args) {
        $v = new view();
        $v->setView("suggestions/suggestions");
    }

    public function suggestionslivresAction($args) {
        $v = new view();
        $v->setView("suggestions/suggestionslivres");
        if (empty($_GET)) {
            $livres = getAllLivres();
            $v->assign("livres", $livres);
        }else{
            $livres = getAllLivres($_GET['post_id_genre']);
            $v->assign("livres", $livres);
        }
        $genres = getGenresLivre();
        $v->assign("genres", $genres);
    }

    public function suggestionspiecesAction($args) {
        $v = new view();
        $v->setView("suggestions/suggestionspieces");
    }

}
