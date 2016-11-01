$(document).ready(function () {
    createCookie("nb_notif", -1, "Thu, 01 Jan 2100 00:00:00 UTC");
    console.log(document.cookie);
    getNotification(readCookie("cookie_users"));
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

function ecrire_commentaire(id_user, id_element, valeur) {
    $.ajax({
        url: "myproject/commentaires/",
        type: "GET",
        data: {
            id_user: id_user,
            id_element: id_element,
            valeur: valeur
        },
        complete: function () {
            location.reload();
        }
    });
}

function getNotification(id_user) {
    var notification;
    var length_notification;
    var interval = setInterval(function () {
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
                if (readCookie("nb_notif") == length_notification) {
                    clearInterval(interval);
                }
                createCookie("nb_notif", length_notification, "Thu, 01 Jan 2100 00:00:00 UTC");
                var type_notification = "";
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
                    $(".les_notifications .une_notif").append(
                            " " + notification[i].nom_user + " " + notification[i].prenom_user + " a aimé votre " + type_notification + " : '" + notification[i].value + "'"
                            );
                    $(".les_notifications .une_notif").append("<div class='date_notification'>" + notification[i].date_notification + "</div>");
                }
                interval;
                console.log(document.cookie);
            }
        });
    }, 2000);
}

function actualisation_requete_server(element_one, element_zero) {
    $.ajax({
        url: "myproject/notification",
        type: "GET",
        dataType: 'json',
        data: {
            id_element: element_one,
            user_profile: readCookie('cookie_users'),
            table: element_zero
        },
        complete: function (result) {
        }
    });
}