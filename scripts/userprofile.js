$(document).ready(function(){
  if($(".mot_de_passe_invalide_profile").val() == 0){
      $(".image_mot_de_passe_invalide_profile_0").show("slow");
      $(".message_mot_de_passe_invalide_profile_0").show("slow");
  }
  if($('.new_mdp_conf_new_mdp_not_equal').val() == 1){
      $(".image_mot_de_passe_invalide_profile_1").show("slow");
      $(".message_mot_de_passe_invalide_profile_1").show("slow");
  }
  
  $(".mes_livres").click(function(){
      var post_id = readCookie("cookie_users");
      
      $.ajax({
         url:"livres/modifierlivres",
         type: "GET",
         data: {
            profile_livre: post_id
         },
         complete: function(){
             console.log(post_id);
             location.href = this.url;
         }
      });
  });
    
});