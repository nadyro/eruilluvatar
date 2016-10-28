/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    var Array_errors = [];
    var i = 0;
    var y = 0;
    $(".submit_inscription_header").click(function () {
        $(".inscription_header_panel input").each(function () {
            if ($(this).hasClass("nom_inscription_header")) {
                if ($(this).val().length < 1 || $(this).val().length > 20) {
                    $(this).css("transition", "2s");
                    $(this).css("background-color", "rgba(218, 50, 50,0.4)");
                    $(".inscription_header_panel_erreur_nom").show("slow");
                    $(".inscription_header_panel_erreur_nom").hover(function (e) {
                        $(".nom_error").css({position: 'absolute', top: "-15px", left: 0, color: "rgba(218,50,50,1)", background: "rgba(0,0,0,0.3)"}).show("slow");
                    }, function () {
                        $(".nom_error").hide();
                    });
                    Array_errors[i] = y;
                } else {
                    $(".inscription_header_panel_erreur_nom").hide();
                }

            }
            if ($(this).hasClass("prenom_inscription_header")) {
                if ($(this).val().length < 1 || $(this).val().length > 20) {
                    $(this).css("transition", "2s");
                    $(this).css("background-color", "rgba(218, 50, 50,0.4)");
                    $(".inscription_header_panel_erreur_prenom").show("slow");
                    $(".inscription_header_panel_erreur_prenom").hover(function (e) {
                        $(".prenom_error").css({position: 'absolute', top: "-15px", left: 0, color: "rgba(218,50,50,1)", background: "rgba(0,0,0,0.3)"}).show("slow");
                    }, function () {
                        $(".prenom_error").hide();
                    });
                    Array_errors[i] = y;
                } else {
                    $(".inscription_header_panel_erreur_prenom").hide();
                }

            }
            if ($(this).hasClass("email_inscription_header")) {
                if (isEmail($(this).val()) == false) {
                    $(this).css("transition", "2s");
                    $(this).css("background-color", "rgba(218, 50, 50,0.4)");
                    $(".inscription_header_panel_erreur_email").show("slow");
                    $(".inscription_header_panel_erreur_email").hover(function (e) {
                        $(".email_error").css({position: 'absolute', top: "-15px", left: 0, color: "rgba(218,50,50,1)", background: "rgba(0,0,0,0.3)"}).show("slow");
                    }, function () {
                        $(".email_error").hide();
                    });
                    Array_errors[i] = y;
                } else {
                    $(".inscription_header_panel_erreur_email").hide();
                }

            }
            if ($(this).hasClass("password_inscription_header")) {
                if ($(this).val().length < 8 || $(this).val().length > 12) {
                    $(this).css("transition", "2s");
                    $(this).css("background-color", "rgba(218, 50, 50,0.4)");
                    $(".inscription_header_panel_erreur_password").show("slow");
                    $(".inscription_header_panel_erreur_password").hover(function (e) {
                        $(".password_error").css({position: 'absolute', top: "-15px", left: 0, color: "rgba(218,50,50,1)", background: "rgba(0,0,0,0.3)"}).show("slow");
                    }, function () {
                        $(".password_error").hide();
                    });
                    Array_errors[i] = y;
                } else {
                    $(".inscription_header_panel_erreur_password").hide();
                }

            }
            if ($(this).hasClass("password_confirmation_inscription_header")) {
                if ($(this).val() !== $(".password_inscription_header").val() || $(this).val().length < 1) {
                    $(this).css("transition", "2s");
                    $(this).css("background-color", "rgba(218, 50, 50,0.4)");
                    $(".inscription_header_panel_erreur_password_confirmation").show("slow");
                    $(".inscription_header_panel_erreur_password_confirmation").hover(function (e) {
                        $(".password_confirmation_error").css({position: 'absolute', top: "-15px", left: 0, color: "rgba(218,50,50,1)", background: "rgba(0,0,0,0.3)"}).show("slow");
                    }, function () {
                        $(".password_confirmation_error").hide();
                    });
                    Array_errors[i] = y;
                } else {
                    $(".inscription_header_panel_erreur_password_confirmation").hide();
                }

            }
        });
        if (Array_errors.length > 0) {
            $(".submit_inscription_header").css("transition", "4s");
            $(".submit_inscription_header").css("background-color", "rgba(218, 50, 50,0.4)");
            $(".inscription_header_panel input[type='text']").css("color", "white");
            $(".inscription_header_panel input[type='password']").css("color", "white");
            while (Array_errors.length > 0) {
                Array_errors.pop();
            }
        } else {
            $(".submit_inscription_header").css("transition", "2s");
            $(".submit_inscription_header").css("background-color", "green");
            $(".inscription_header_panel input").css("background-color", "white");
            $(".inscription_header_panel input").css("color", "black");
            $.ajax({
                url: "myproject/user/inscription",
                type: "GET",
                data: {
                    nom_inscription_header: $(".nom_inscription_header").val(),
                    prenom_inscription_header: $(".prenom_inscription_header").val(),
                    email_inscription_header: $(".email_inscription_header").val(),
                    birth_inscription_header: $(".birth_inscription_header").val(),
                    password_inscription_header: $(".password_inscription_header").val()
                },
                complete: function (result) {
                    if (result.responseText === "false") {
                        $(".email_exists_error").val(result.responseText);
                        $(".email_inscription_header").css("transition", "2s");
                        $(".email_inscription_header").css("background-color", "rgba(218, 50, 50,0.4)");
                        $(".submit_inscription_header").css("transition", "4s");
                        $(".submit_inscription_header").css("background-color", "rgba(218, 50, 50,0.4)");
                        $(".inscription_header_panel_erreur_email").show("slow");
                        $(".inscription_header_panel_erreur_email").hover(function (e) {
                            $(".error_email_exist").css({position: 'absolute', top: "-15px", left: 0, color: "rgba(218,50,50,1)", background: "rgba(0,0,0,0.3)"}).show("slow");
                        }, function () {
                            $(".error_email_exist").hide();
                        });
                    } else {
                        $(".inscription_header_panel_erreur_email").hide();
                        $(".inscription_header_panel").animate({
                            height: "0px"
                        }, 700);
                        $(".inscription_header_panel").hide(700);
                        message_valid_inscription("validation_inscription");
                    }
                }

            });
        }
    });

    $(".submit_connexion_header").click(function () {
        $.ajax({
            url: "myproject/user/connexion",
            type: "GET",
            data: {
                email_connexion: $(".email_connexion_header").val(),
                password_connexion: $(".password_connexion_header").val()
            },
            complete: function (result) {
                if (result.responseText === "1") {
                    $(".email_inexistant_message").show().animate({
                        height: "120px"
                    });
                    $(".submit_connexion_header").css("transition", "2s");
                    $(".submit_connexion_header").css("background-color", "rgba(218, 50, 50,0.4)");
                }
                if (result.responseText === "2") {
                    $(".password_connexion_header").css("transition", "2s");
                    $(".password_connexion_header").css("background-color", "rgba(218, 50, 50,0.4)");
                    $(".connexion_header_panel_erreur_password").show("slow");
                    $(".connexion_header_panel_erreur_password").hover(function (e) {
                        $(".mdp_incorrect").show("slow");
                    }, function () {
                        $(".mdp_incorrect").hide();
                    });
                    $(".submit_connexion_header").css("transition", "2s");
                    $(".submit_connexion_header").css("background-color", "rgba(218, 50, 50,0.4)");
                }
                if (result.responseText !== "1" || result.responseText !== "2") {
                    $(".validation_connexion p").append(result.responseText);
                    $(".connexion_header_panel_erreur_password").hide();
                    $(".connexion_header_panel").animate({
                        height: "0px"
                    }, 700);
                    $(".connexion_header_panel").hide(700);
                    message_valid_inscription("validation_connexion");
                }
            }

        });
    });

    $(".cacher_email_inexistant_message").click(function () {
        $(".email_inexistant_message").hide("slow").animate({
            height: 0
        });
    });

    $(".inscription_header_panel .cancel_inscription_header").click(function () {
        $(".inscription_header_panel").hide("slow").animate({
            height: "0px"
        }, 1000);
    });

    $(".inscription_header").click(function () {
        $(".inscription_header_panel").show().animate({
            height: "825px"
        }, 700);
        $(".connexion_header_panel").hide().animate({
            height: "0px"
        });
        $(".renseigner_header_sentence_panel").hide().animate({
            height: "0px"
        });
    });
    
    $(".connexion_header").click(function () {
        $(".connexion_header_panel").show().animate({
            height: "320px"
        }, 1000);
        $(".inscription_header_panel").hide().animate({
            height: "0px"
        });
        $(".renseigner_header_sentence_panel").hide().animate({
            height: "0px"
        });
    });
    $(".connexion_header_panel .cancel_connexion_header").click(function () {
        $(".connexion_header_panel").hide("slow").animate({
            height: "0px"
        }, 1000);
    });
    $(".deconnexion_header").click(function () {
        var window_height = $(window).height() / 2;
        var window_width = ($(window).width() / 2) - (202.68 / 2);
        $(".confirmation_deconnexion").show("slow").animate({
            height: "150px",
            top: window_height + "px",
            left: window_width + "px"
        });
        $(".deconnexion_oui").click(function () {
            $.ajax({
                url: "myproject/user/deconnexion",
                type: "GET",
                data: {
                },
                complete: function () {
                    location.href = "http://localhost/myproject/";
                }
            });
        });
        $(".deconnexion_non").click(function () {
            $(".confirmation_deconnexion").hide("slow").animate({
                height: 0,
                top:0,
                left:0
            });
        });
    });
});
function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
function message_valid_inscription(nom_class) {
    var window_height = $(window).height() / 2;
    var window_width = ($(window).width() / 2) - (202.68 / 2);
    $("." + nom_class).show("slow").animate({
        height: "50px",
        top: window_height + "px",
        left: window_width + "px"
    });
    $(".bouton_fermer").click(function () {
        $(".validation_inscription").hide().animate({
            height: 0,
            top: 0,
            left: 0
        });
        location.reload();
    });
}
