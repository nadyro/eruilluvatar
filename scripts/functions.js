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
                            $("." + this_this + ".loved_png[post-id="+ post_id +"]").hide(1000).css({
                                opacity: "0"
                            });
                            $("." + this_this + ".second_loved_png[post-id="+ post_id +"]").show(1000).css({
                                opacity: "0.8",
                                display: "inline-block"
                            });
                        }
                    }
                    if (element_two == -1) {
                        if ($("." + this_this).hasClass("second_loved_png")) {
                            $("." + this_this + ".second_loved_png[post-id="+ post_id +"]").hide(1000).css({
                                opacity: "0"
                            });
                            $("." + this_this + ".loved_png[post-id="+ post_id +"]").show(1000).css({
                                opacity: "0.8",
                                display: "inline-block"
                            });
                        }
                    }
                } else {
                    if (element_two == 1) {
                        if ($("." + this_this).hasClass("favorite_png")) {
                            $("." + this_this + ".favorite_png[post-id="+ post_id +"]").hide(1000).css({
                                opacity: "0"
                            });
                            $("." + this_this + ".second_favorite_png[post-id="+ post_id +"]").show(1000).css({
                                opacity: "0.8",
                                display: "inline-block"
                            });
                        }
                    }
                    if (element_two == -1) {
                        if ($("." + this_this).hasClass("second_favorite_png")) {
                            $("." + this_this + ".second_favorite_png[post-id="+ post_id +"]").hide(1000).css({
                                opacity: "0"
                            });
                            $("." + this_this + ".favorite_png[post-id="+ post_id +"]").show(1000).css({
                                opacity: "0.8",
                                display: "inline-block"
                            });
                        }
                    }
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
            id_user : id_user,
            id_element : id_element,
            valeur : valeur
        },
        complete: function () {
            location.reload();
        }
    });
}