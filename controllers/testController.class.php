<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class testController{
    public function indexAction($args){
        $v = new view();
        $v->setView("index");
        $v->assign("test","test");
    }
    public function essaiAction(){
        $v = new view();
        $v->setView("essai");
        $v->assign("test","test");
    }
}