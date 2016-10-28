$(document).ready(function () {
    $(".overlay_img").hover(function () {
        $(".overlay_img").animate({
            height: 0
        });
        $(".overlay_img p").hide("slow");
    }, function () {
        $(".overlay_img").animate({
            height: "100%"
        });
        $(".overlay_img p").show("slow");
    });
    $(".overlay_img_genre").each(function () {
        var post_id = $(this).attr("post-id");
        $(".overlay_img_genre[post-id='" + post_id + "']").hover(function () {
            $(".overlay_img_genre[post-id='" + post_id + "'] p").css({
                transition: "1s",
                color: "transparent"
            });
        }, function () {
            $(".overlay_img_genre[post-id='" + post_id + "'] p").css({
                transition: "1s",
                color: "black"
            });
        });
    });
    $(".infos_genre").click(function () {
        var post_id_genre = $(this).attr("post-id");
        $.ajax({
            url: "/myproject/suggestions/suggestionslivres",
            type: "GET",
            data:{
                post_id_genre: post_id_genre
            },
            complete:function(){
               location.href = this.url;
            }
        });
    });
    
    $(".infos_livre").click(function(){
       var post_id = $(this).attr("post-id");
       $.ajax({
          url:"/myproject/livres",
          type:"GET",
          data:{
              post_id_livre : post_id
          },
          complete: function(){
              console.log(post_id);
              location.href = this.url;
          }
       });
    });



});