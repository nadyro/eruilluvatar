<?php 
echo exec('whoami');
phpinfo();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $input = file_get_contents("php://input");
    $json  = json_decode($input);
    $event = $json->object_kind;
    /* on trigge l'événement de PUSH */
    if($event === 'push') {
        /* Il va donc falloir faire un "git pull" et avoir les accès git en ssh (sans identifiants)
         * => il faut créer une clé publique ssh sur le serveur qui déploie le site
         *
         * ssh-keygen -t rsa -b 4096 -C "email@example.com"
         *
         * => et récupérer la clé créée pour la mettre sur gitlab
         *
         * cd ~/.ssh && cat id_rsa.pub
         *
         * recopier le contenu en tant que clé de déploiement pour votre projet dans gitlab
         * http://i.imgur.com/Yi7i7Sp.png
         */
        $path = getProjectPath();
        exec("touch qsuygduygfusdif.txt");
        exec("cd ".$path);
        exec("git pull origin master");
        
       /* évidemment on peut aussi récupérer dans le json la branche concernée et le remote
        * il faut que le script de déploiement soit sur le serveur de déploiement
        *
        * pour tester que cela fonctionne, 2 choix:
        * 1 / cliquer sur le bouton "Test" dans la partie Web Hook
        * 2 / pusher un nouveau commit sur le dépôt
        *
        * /!\ dans tous les cas, il faut d'abord ajouter ce script en tant qu'url accessible dans les web hooks du projet
        * http://i.imgur.com/2mDlkEy.png
        */
    }
}elseif (isset($_GET["gitcall"]) && $_GET["gitcall"] == "pull") {
    $path = getProjectPath();
    exec("cd ".$path." && git pull origin master");
}


function getProjectPath()
{
    return __DIR__.DIRECTORY_SEPARATOR . "nightlives";
}