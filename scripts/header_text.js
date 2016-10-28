/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    var i = 0;
    var y = 0;
    var Array = [];
    $(".header_text_all").each(function () {
        Array[y] = $(".header_text_" + y).val();
        y++;
    });
//    var myInterval;
    function intervalTextheader(){
        $(".header_text").append("<p class=text></p>");
        $(".text").text(Array[i]);
        i++;
        $(".text").fadeOut(5000);
        if (i === Array.length) {
            i = 0;
        }
        setTimeout(intervalTextheader,5000);
    }
    intervalTextheader();
//    myInterval = setInterval(intervalTextheader(), 3000);

    $(".renseigner_header_sentence").click(function () {

        $(".renseigner_header_sentence_panel").show().animate({
            height:"200px"
        });
        $(".connexion_header_panel").hide().animate({
            height: "0px"
        });
        $(".inscription_header_panel").hide().animate({
            height: "0px"
        });
    });
    $(".renseigner_header_sentence_cancel").click(function () {
        $(".renseigner_header_sentence_panel").hide("slow").animate({
            height:"0px"
        });
    });
    $(".renseigner_header_sentence_submit").click(function () {
        $.ajax({
            url: 'myproject/headersentence',
            type: 'GET',
            data: {
                text_header_sentence: $(".renseigner_header_sentence_text").val()
            },
            complete: function () {
                location.reload();
            }

        });
    });
});
