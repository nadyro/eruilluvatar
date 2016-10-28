$(document).ready(function(){
  if($(".mot_de_passe_invalide_profile").val() == 0){
      $(".image_mot_de_passe_invalide_profile_0").show("slow");
      $(".message_mot_de_passe_invalide_profile_0").show("slow");
  }
  if($('.new_mdp_conf_new_mdp_not_equal').val() == 1){
      $(".image_mot_de_passe_invalide_profile_1").show("slow");
      $(".message_mot_de_passe_invalide_profile_1").show("slow");
  }
    
});