/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    if ($("#un_livre_like_negatif").val() == -1) {
        $('.like_favorite_png.second_loved_png').hide();
        $('.like_favorite_png.loved_png').show();
    }
    if ($("#un_livre_like_positif").val() == 1) {
        $('.like_favorite_png.second_loved_png').show();
        $('.like_favorite_png.loved_png').hide();
    }

    if ($("#un_livre_favorite_negatif").val() == -1) {
        $('.like_favorite_png.second_favorite_png').hide();
        $('.like_favorite_png.favorite_png').show();
    }
    if ($("#un_livre_favorite_positif").val() == 1) {
        $('.like_favorite_png.second_favorite_png').show();
        $('.like_favorite_png.favorite_png').hide();
    }
    $(".un_livre_commentaire_like_positif").each(function () {
        var post_id_com = $(this).attr("post-id");
        if ($(".un_livre_commentaire_like_positif[post-id='" + post_id_com + "']").val() == 1) {
            $(".comment_png.second_loved_png[id_commentaire='" + post_id_com + "']").show();
            $(".comment_png.loved_png[id_commentaire='" + post_id_com + "']").hide();
        }
    });
    $(".un_livre_commentaire_like_negatif").each(function () {
        var post_id_com = $(this).attr("post-id");
        if ($(".un_livre_commentaire_like_negatif[post-id='" + post_id_com + "']").val() == -1) {
            $(".comment_png.second_loved_png[post-id='" + post_id_com + "']").hide();
            $(".comment_png.loved_png[post-id='" + post_id_com + "']").show();
        }
    });
    var clicks = 0;
    $(".notification").click(function () {
        if (clicks === 0) {
            clicks++;
            $(".les_notifications").show("slow");
            $(this).css({
               "background-color" : "transparent" 
            });
            $(".nb_notification").text('');
            createCookie("notification_seen","1","Thu, 01 Jan 2100 00:00:00 UTC");
        } else {
            clicks--;
            $(".les_notifications").hide();
        }
        
    });

    $(".like_favorite_png").each(function () {
        $(this).click(function () {
            var livre_id = $(this).attr("livre-id");
            var like = $(this).attr("like");
            var favorite = $(this).attr("favorite");
            var user_profile = readCookie("cookie_users");
            var element_type = $(this).attr("element-type");
            var post_id = $(this).attr("post-id");
            if (user_profile !== "null") {
                if (element_type == "like") {
                    like_favorite_element("like_favorite_png", "livres", element_type, livre_id, like, user_profile, 1, post_id);
                    getNotification(user_profile);
                }
                if (element_type == "favorite") {
                    like_favorite_element("like_favorite_png", "livres", element_type, livre_id, favorite, user_profile, 1, post_id);
                }
            }
        });
    });
    $(".comment_png").each(function () {
        $(this).click(function () {
            var id_element = $(this).attr("id_commentaire");
            var like = $(this).attr("like");
            var user_profile = readCookie("cookie_users");
            var element_type = $(this).attr("element-type");
            var post_id = $(this).attr("post-id");
            if (user_profile !== "null") {
                like_favorite_element("comment_png", "commentaires", element_type, id_element, like, user_profile, 2, post_id);
            }
        });

    });

    $(".ecrire_commentaire_comment_png").click(function () {
        $(".ecrire_commentaire").show(1000);
        $(this).hide(1000).css({
            opacity: "0"
        });
        $(".ecrire_commentaire_second_comment_png").show(1000).css({
            opacity: "0.8",
            display: "inline-block"
        });
    });

    $(".ecrire_commentaire_second_comment_png").click(function () {
        $(".ecrire_commentaire").hide(1000);
        $(this).hide(1000).css({
            opacity: "0"
        });
        $(".ecrire_commentaire_comment_png").show(1000).css({
            opacity: "0.8",
            display: "inline-block"
        });
    });

    $(".submit_commentaire").click(function () {
        var id_user = readCookie("cookie_users");
        var id_element = $(this).attr("id_element");
        var valeur = $(".text_commentaire").val();
        var livre_user = $(this).attr("livre_user");
        ecrire_commentaire(id_user, id_element, valeur, livre_user);
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
