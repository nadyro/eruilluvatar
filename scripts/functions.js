$(document).ready(function () {
//    createCookie("nb_notifs", -1, "Thu, 01 Jan 2100 00:00:00 UTC");
    console.log(document.cookie);
    getNotification(readCookie("cookie_users"));
//    eraseCookie("nb_notifs");
    $(".une_notif").click(function () {
        location.reload();
    });
});


function like_favorite_element(this_this, element_zero, element_type, element_one, element_two, user_profile, id_type, post_id) {
    //this_this représente la classe mère
    //element_zero représente le nom du controller à utiliser pour la requête ajax
    //element_type représente le type de la requête utilisateur, like, favorite ou commentaire
    //element_one represente l'ID de l'élément sur lequel l'action a été effectuée
    //element_two représente la valeur (1 pour like, -1 pour unlike. Pareil pour favorite)
    //user_profile représente l'ID de l'utilisateur qui exécute l'action
    if (user_profile !== "null") {
        $.ajax({
            url: "/myproject/" + element_zero + "/" + element_zero + element_type,
            type: "GET",
            data: {
                element_one: element_one,
                element_two: element_two,
                user_profile: user_profile,
                id_type: id_type
            },
            complete: function () {
//                window.open(this.url);
                if (element_type == "like") {
                    if (element_two == 1) {
                        if ($("." + this_this).hasClass("loved_png")) {
                            $("." + this_this + ".loved_png[post-id=" + post_id + "]").hide(1000).css({
                                opacity: "0"
                            });
                            $("." + this_this + ".second_loved_png[post-id=" + post_id + "]").show(1000).css({
                                opacity: "0.8",
                                display: "inline-block"
                            });
                        }
                    }
                    if (element_two == -1) {
                        if ($("." + this_this).hasClass("second_loved_png")) {
                            $("." + this_this + ".second_loved_png[post-id=" + post_id + "]").hide(1000).css({
                                opacity: "0"
                            });
                            $("." + this_this + ".loved_png[post-id=" + post_id + "]").show(1000).css({
                                opacity: "0.8",
                                display: "inline-block"
                            });
                        }
                    }
                } else {
                    if (element_two == 1) {
                        if ($("." + this_this).hasClass("favorite_png")) {
                            $("." + this_this + ".favorite_png[post-id=" + post_id + "]").hide(1000).css({
                                opacity: "0"
                            });
                            $("." + this_this + ".second_favorite_png[post-id=" + post_id + "]").show(1000).css({
                                opacity: "0.8",
                                display: "inline-block"
                            });
                        }
                    }
                    if (element_two == -1) {
                        if ($("." + this_this).hasClass("second_favorite_png")) {
                            $("." + this_this + ".second_favorite_png[post-id=" + post_id + "]").hide(1000).css({
                                opacity: "0"
                            });
                            $("." + this_this + ".favorite_png[post-id=" + post_id + "]").show(1000).css({
                                opacity: "0.8",
                                display: "inline-block"
                            });
                        }
                    }
                }
                if (element_two == 1) {
                    actualisation_requete_server(element_one, element_zero);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    } else {
        console.log(element_zero, element_one, element_two, user_profile);
    }
}

function ecrire_commentaire(id_user, id_element, valeur, livre_user) {
    $.ajax({
        url: "myproject/commentaires/",
        type: "GET",
        data: {
            id_user: id_user,
            id_element: id_element,
            valeur: valeur
        },
        complete: function () {
            actualisation_requete_server(id_element, "commentaires", valeur, livre_user);
//            $(".un_livre_second_half").append(
//                        '<div class="commentaires_livre"><div class="infos_user_commentaire"><p>Sehnoun Nadir</p></div>\n\
//<div class="le_commentaire"><p>Un tit com !</div>\n\
//<div class="like_commentaire"><img src="/images/loved.png" alt="" id_commentaire="70" post-id="0" id_element="23" element-type="like" like="1" class="comment_png loved_png">\n\
//<img src="/images/loved_colored.png" alt="" id_commentaire="70" post-id="0" id_element="23" element-type="like" like="-1" class="comment_png second_loved_png second_img_livre_affiche"></div>\n\
//<div class="date_commentaire"> Moins d\'une heure</div></div>');
        }
    });
}

function actualisation_requete_server(element_one, element_zero, value, livre_user) {
    $.ajax({
        url: "myproject/notification",
        type: "GET",
        dataType: 'json',
        data: {
            id_element: element_one,
            user_profile: readCookie('cookie_users'),
            table: element_zero,
            valeur: value,
            livre_user: livre_user
        },
        complete: function (result) {
        }
    });
}

function getNotification(id_user) {
    var notification;
    var length_notification;
    var isPaused = true;
    var click = 1;
    console.log(isPaused);
    var interval = setInterval(function () {
        if (isPaused) {
            console.log(isPaused);
            console.log(click);
            $.ajax({
                url: "/myproject/notification/affichenotification",
                type: "GET",
                dataType: 'json',
                data: {
                    user_profile: id_user,
                    notification_seen: readCookie("notification_seen")
                },
                complete: function (result) {
                    if (readCookie("notification_seen") == "1") {
                        eraseCookie("notification_seen");
                    }
                    var i;
                    notification = jQuery.parseJSON(result.responseText);
                    console.log(notification);
                    length_notification = notification.length;
//                if (readCookie("nb_notifs") == length_notification) {
//                    clearInterval(interval);
//                }
                    createCookie("nb_notifs", length_notification, "Thu, 01 Jan 2100 00:00:00 UTC");
                    var type_notification = "";
                    var ecrit_ou_like = "";
                    if (length_notification > 0) {
                        $(".notification").css({
                            "background-color": "#fa3e3e"
                        });
                        $(".notification .nb_notification").text("");
                        $(".notification .nb_notification").append("(" + length_notification + ")");
                    }
                    $(".les_notifications .une_notif").text('');
                    for (i = 0; i < length_notification; i++) {
                        if (notification[i].id_type == "2") {
                            type_notification = "commentaire";
                        } else {
                            type_notification = "livre";
                        }
                        if (notification[i].ecrit == "1") {
                            ecrit_ou_like = "écrit un ";
                        } else {
                            ecrit_ou_like = "aimé votre ";
                        }
                        $(".les_notifications .une_notif").append(
                                " " + notification[i].nom_user + " " + notification[i].prenom_user + " a " + ecrit_ou_like + " " + type_notification + " : '" + notification[i].value + "'"
                                );
                        $(".les_notifications .une_notif").append("<div class='date_notification'>" + notification[i].date_notification + "</div>");
                    }
                    interval;
                    console.log(document.cookie);
                }
            });
        }
        $(".notification").click(function (e) {
            e.preventDefault();
            isPaused = false;
            $(this).hide();
            $(".notification_close").css({
                display: "inline-block",
                position: "relative"
            });
            $(".les_notifications").show();
        });
        $(".notification_close").click(function (e) {
            e.preventDefault();
            isPaused = true;
            $(this).hide();
            $(this).css({
                position: "absolute"
            });
            $(".les_notifications").hide();
            $(".notification").show();
        });
    }, 2000);
}