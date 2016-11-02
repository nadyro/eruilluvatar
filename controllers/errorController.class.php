<?php

class errorController{
    
    public function indexAction($args){
        $v = new view();
        $v->setView("error");
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        save_page_count($actual_link, "404 Error", 'page');
    }
}

