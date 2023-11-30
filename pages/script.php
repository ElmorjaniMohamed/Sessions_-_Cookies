<?php

require '../config/connexion.php';

session_start();

if(isset($_POST['submit'])){
    signup();
}else if(isset($_POST["login"])){
    login();
}

// setcokie(name, value, expire, path, domain, secure, httponty)
function signup() {
    global $connexion;
    

    // préparez une requête 
    

    // préparez une requête stmt (mysqli_prepare)
    

    // liez le paramètre (mysqli_stmt_bind_param)
   

    // exécutez la requête préparée (mysqli_stmt_execute )
    

    
       
    // Assurez-vous de quitter le script après une redirection
   

   
}


function getAllUsers() {
    global $connexion;
    $query = 'SELECT * FROM users';
    $result = mysqli_query($connexion, $query);
    $rows = [];

    if ($result){
         while ($row = mysqli_fetch_assoc($result)) {

            $rows[] = $row;
         }
         return $rows;
    }
    return null;
    mysqli_close($connexion);

}

function login() {
    global $connexion;
   

    // préparez une requête avec un seul paramètre pour l'e-mail
    

    // préparez la requête
    

    // liez le paramètre (uniquement pour l'e-mail)
    
    // exécutez la requête préparée
    

    // obtenez le résultat (mysqli_stmt_get_result)
   
    // vérifiez s'il y a un utilisateur avec cet e-mail
   
        // vérifiez le mot de passe
       
        
            // le mot de passe est valide
            
            // stockez l'ID de l'utilisateur dans la session
           
            
            

            // vérifiez si l'option "se souvenir de moi" est cochée
           
                // définissez des cookies
               

                // redirigez vers la page d'accueil
               

                // redirigez vers la page d'accueil

                // assurez-vous de quitter le script après une redirection
        
       
            // mot de passe invalide
            
        
  
        // aucun utilisateur trouvé avec cet e-mail
        
  

    // fermez l'instruction et la connexion
    
}

?>