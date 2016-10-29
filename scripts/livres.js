/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {

    function ajax_like_request(livre_id, like, user_profile) {
        if (user_profile !== "null") {
            $.ajax({
                url: "/myproject/livres/likelivre",
                type: "GET",
                data: {
                    livre_id: livre_id,
                    like: like,
                    user_profile: user_profile
                },
                complete: function () {
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        } else {
            alert("Vous devez être connecté pour intéragir avec les livres ! :(");
        }

    }

    function ajax_favorite_request(livre_id, favorite, user_profile) {
        $.ajax({
            url: "/myproject/livres/favorislivre",
            type: "GET",
            data: {
                livre_id: livre_id,
                favorite: favorite,
                user_profile: user_profile
            },
            complete: function () {
//                window.open(this.url);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }
    if ($("#un_livre_like_negatif").val() == -1) {
        $('.second_loved_png').hide();
        $('.loved_png').show();
    }
    if ($("#un_livre_like_positif").val() == 1) {
        $('.second_loved_png').show();
        $('.loved_png').hide();
    }

    if ($("#un_livre_favorite_negatif").val() == -1) {
        $('.second_favorite_png').hide();
        $('.favorite_png').show();
    }
    if ($("#un_livre_favorite_positif").val() == 1) {
        $('.second_favorite_png').show();
        $('.favorite_png').hide();
    }
    $(".base_img_livre_affiche").each(function () {
        $(this).click(function () {
            var livre_id = $(this).attr("livre-id");
            var like = $(this).attr("like");
            var favorite = $(this).attr("favorite");
            var user_profile = readCookie("cookie_users");
            ajax_like_request(livre_id, like, user_profile);
            ajax_favorite_request(livre_id, favorite, user_profile);
            if (user_profile !== "null") {
                if ($(this).hasClass("loved_png")) {
                    $(this).hide(1000).css({
                        opacity: "0"
                    });
                    $(".second_loved_png").show(1000).css({
                        opacity: "0.8",
                        display: "inline-block"
                    });
                }
                if ($(this).hasClass("comment_png")) {
                    $(this).hide(1000).css({
                        opacity: "0"
                    });
                    $(".second_comment_png").show(1000).css({
                        opacity: "0.8",
                        display: "inline-block"
                    });
                    ajax_like_request(livre_id, like, user_profile);
                }
                if ($(this).hasClass("favorite_png")) {
                    $(this).hide(1000).css({
                        opacity: "0"
                    });
                    $(".second_favorite_png").show(1000).css({
                        opacity: "0.8",
                        display: "inline-block"
                    });
                }
            }
        });
    });
//    $(".tool_img_livre_affiche img").hover(function(){
//        $(this).animate({
//           width:"85%" 
//        });
//    }, function(){
//        $(this).animate({
//           width:"80%" 
//        });
//    });
    $(".second_img_livre_affiche").each(function () {
        $(this).click(function () {
            var livre_id = $(this).attr("livre-id");
            var like = $(this).attr("like");
            var favorite = $(this).attr("favorite");
            var user_profile = readCookie("cookie_users");
            if (user_profile !== "null") {
                if ($(this).hasClass("second_loved_png")) {
                    $(this).hide(1000).css({
                        opacity: "0"
                    });
                    $(".loved_png").show(1000).css({
                        opacity: "0.8",
                        display: "inline-block"
                    });
                    ajax_like_request(livre_id, like, user_profile);
                }
                if ($(this).hasClass("second_comment_png")) {
                    $(this).hide(1000).css({
                        opacity: "0"
                    });
                    $(".comment_png").show(1000).css({
                        opacity: "0.8",
                        display: "inline-block"
                    });
                    ajax_like_request(livre_id, like, user_profile);
                }
                if ($(this).hasClass("second_favorite_png")) {
                    $(this).hide(1000).css({
                        opacity: "0"
                    });
                    $(".favorite_png").show(1000).css({
                        opacity: "0.8",
                        display: "inline-block"
                    });
                    ajax_favorite_request(livre_id, favorite, user_profile);
                }
            }
        });
    });


    $(".overlay_img_livre").each(function () {
        var post_id = $(this).attr("post-id");
        $(".overlay_img_livre[post-id='" + post_id + "']").click(function () {
            $("#img_livre[post-id='" + post_id + "']").trigger('click');
        });
        $(this).hover(function () {
            $(".overlay_img_livre[post-id='" + post_id + "']").css({
                transition: "1s",
                opacity: "0",
            });
        }, function () {
            $(".overlay_img_livre[post-id='" + post_id + "']").css({
                transition: "1s",
                opacity: "0.8",
            });
        });
    });


    $(".error_livre").each(function () {
        if ($(this).hasClass("error_title_length")) {
            $(".error_img_title_length").css({
                display: "block"
            }).hover(function () {
                $(".error_title_length").show("slow");
            }, function () {
                $(".error_title_length").hide("slow");
            });
        }
        if ($(this).hasClass("error_autor_name_length")) {
            $(".error_img_autor_name_length").css({
                display: "block"
            }).hover(function () {
                $(".error_autor_name_length").show("slow");
            }, function () {
                $(".error_autor_name_length").hide("slow");
            });
        }
        if ($(this).hasClass("error_collection_length")) {
            $(".error_img_collection_length").css({
                display: "block"
            }).hover(function () {
                $(".error_collection_length").show("slow");
            }, function () {
                $(".error_collection_length").hide("slow");
            });
        }
        if ($(this).hasClass("error_editeur_length")) {
            $(".error_img_editeur_length").css({
                display: "block"
            }).hover(function () {
                $(".error_editeur_length").show("slow");
            }, function () {
                $(".error_editeur_length").hide("slow");
            });
        }
        if ($(this).hasClass("error_genre_length")) {
            $(".error_img_genre_length").css({
                display: "block"
            }).hover(function () {
                $(".error_genre_length").show("slow");
            }, function () {
                $(".error_genre_length").hide("slow");
            });
        }
        if ($(this).hasClass("error_error_img_livre")) {
            $(".error_img_img_livre").css({
                display: "block"
            }).hover(function () {
                $(".error_error_img_livre").show("slow");
            }, function () {
                $(".error_error_img_livre").hide("slow");
            });
        }
        if ($(this).hasClass("error_size_img_livre")) {
            $(".error_img_img_livre").css({
                display: "block"
            }).hover(function () {
                $(".error_size_img_livre").show("slow");
            }, function () {
                $(".error_size_img_livre").hide("slow");
            });
        }
        if ($(this).hasClass("error_type_img_livre")) {
            $(".error_img_img_livre").css({
                display: "block"
            }).hover(function () {
                $(".error_type_img_livre").show("slow");
            }, function () {
                $(".error_type_img_livre").hide("slow");
            });
        }
        if ($(this).hasClass("error_synopsis_length")) {
            $(".error_img_synopsis_livre").css({
                display: "block"
            }).hover(function () {
                $(".error_synopsis").show("slow");
            }, function () {
                $(".error_synopsis").hide("slow");
            });
        }
    }
    );
});
function createCookie(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = name + "=" + value + "; expires = " + expires + "; path=/; path=path=/";
}

function readCookie(name) {
    var nameEQ = encodeURIComponent(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ')
            c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0)
            return decodeURIComponent(c.substring(nameEQ.length, c.length));
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, null, "Thu, 01 Jan 1970 00:00:00 UTC");
}
