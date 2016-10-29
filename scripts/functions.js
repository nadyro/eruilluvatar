function like_favorite_element(this_this, element_zero, element_type, element_one, element_two, user_profile) {
    if (user_profile !== "null") {
        $.ajax({
            url: "/myproject/" + element_zero + "/" + element_zero + element_type,
            type: "GET",
            data: {
                element_one: element_one,
                element_two: element_two,
                user_profile: user_profile
            },
            complete: function () {
                if (element_type == "like") {
                    if (element_two == 1) {
                        if ($("." + this_this).hasClass("loved_png")) {
                            $(".loved_png").hide(1000).css({
                                opacity: "0"
                            });
                            $(".second_loved_png").show(1000).css({
                                opacity: "0.8",
                                display: "inline-block"
                            });
                        }
                    }
                    if (element_two == -1) {
                        if ($("." + this_this).hasClass("second_loved_png")) {
                            $(".second_loved_png").hide(1000).css({
                                opacity: "0"
                            });
                            $(".loved_png").show(1000).css({
                                opacity: "0.8",
                                display: "inline-block"
                            });
                        }
                    }
                } else {
                    if (element_two == 1) {
                        if ($("." + this_this).hasClass("favorite_png")) {
                            $(".favorite_png").hide(1000).css({
                                opacity: "0"
                            });
                            $(".second_favorite_png").show(1000).css({
                                opacity: "0.8",
                                display: "inline-block"
                            });
                        }
                    }
                    if (element_two == -1) {
                        if ($("." + this_this).hasClass("second_favorite_png")) {
                            $(".second_favorite_png").hide(1000).css({
                                opacity: "0"
                            });
                            $(".favorite_png").show(1000).css({
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