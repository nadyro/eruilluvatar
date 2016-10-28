/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $(".error_livre").each(function () {
        if ($(this).hasClass("error_title_length")) {
            $(".error_img_title_length").css({
                display:"block"
            }).hover(function(){
                $(".error_title_length").show("slow");
            },function(){
                $(".error_title_length").hide("slow");
            });
        }
        if ($(this).hasClass("error_autor_name_length")) {
            $(".error_img_autor_name_length").css({
                display:"block"
            }).hover(function(){
                $(".error_autor_name_length").show("slow");
            },function(){
                $(".error_autor_name_length").hide("slow");
            });
        }
        if ($(this).hasClass("error_collection_length")) {
            $(".error_img_collection_length").css({
                display:"block"
            }).hover(function(){
                $(".error_collection_length").show("slow");
            },function(){
                $(".error_collection_length").hide("slow");
            });
        }
        if ($(this).hasClass("error_editeur_length")) {
            $(".error_img_editeur_length").css({
                display:"block"
            }).hover(function(){
                $(".error_editeur_length").show("slow");
            },function(){
                $(".error_editeur_length").hide("slow");
            });
        }
        if ($(this).hasClass("error_genre_length")) {
            $(".error_img_genre_length").css({
                display:"block"
            }).hover(function(){
                $(".error_genre_length").show("slow");
            },function(){
                $(".error_genre_length").hide("slow");
            });
        }
        if ($(this).hasClass("error_error_img_livre")) {
            $(".error_img_img_livre").css({
                display:"block"
            }).hover(function(){
                $(".error_error_img_livre").show("slow");
            },function(){
                $(".error_error_img_livre").hide("slow");
            });
        }
        if ($(this).hasClass("error_size_img_livre")) {
            $(".error_img_img_livre").css({
                display:"block"
            }).hover(function(){
                $(".error_size_img_livre").show("slow");
            },function(){
                $(".error_size_img_livre").hide("slow");
            });
        }
        if ($(this).hasClass("error_type_img_livre")) {
            $(".error_img_img_livre").css({
                display:"block"
            }).hover(function(){
                $(".error_type_img_livre").show("slow");
            },function(){
                $(".error_type_img_livre").hide("slow");
            });
        }
    });
});

