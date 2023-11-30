<?php

require '../config/connexion.php';

session_start();

if (isset($_POST['submit'])) {
    signup();
} else if (isset($_POST["login"])) {
    login();
}

// setcokie(name, value, expire, path, domain, secure, httponty)
function signup()
{
    global $connexion;

    $lastname = $_POST["last_name"];
    $firstname = $_POST["first_name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $confirmPassword = $_POST["repeat_password"];

    if ($_POST['password'] == $confirmPassword) {

        // préparez une requête 
        $sql = "INSERT INTO users (first_name, last_name, email, password ) values (?,?,?,?)";


        // préparez une requête stmt (mysqli_prepare)
        $stmt = mysqli_prepare($connexion, $sql);


        // liez le paramètre (mysqli_stmt_bind_param)
        mysqli_stmt_bind_param($stmt, 'ssss', $lastname, $firstname, $email, $password);

        // exécutez la requête préparée (mysqli_stmt_execute )
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header('Location: login.php');
            exit();
        } else {
            echo 'Error';
        }


        // Assurez-vous de quitter le script après une redirection
        mysqli_stmt_close($stmt);
        mysqli_close($connexion);



    }else{
        echo 'error password';
    }

}


function getAllUsers()
{
    global $connexion;
    $query = 'SELECT * FROM users';
    $result = mysqli_query($connexion, $query);
    $rows = [];

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {

            $rows[] = $row;
        }
        return $rows;
    }
    mysqli_close($connexion);
    return null;
    

}

function login()
{
    global $connexion;

    $email = $_POST['email'];
    $password = $_POST['password'];


    // préparez une requête avec un seul paramètre pour l'e-mail
    $sql = 'SELECT * FROM users WHERE email = ?';

    // préparez la requête
    $stmt = mysqli_prepare($connexion, $sql);

    // liez le paramètre (uniquement pour l'e-mail)
    mysqli_stmt_bind_param($stmt, 's', $email);

    // exécutez la requête préparée
    mysqli_stmt_execute($stmt);

    // obtenez le résultat (mysqli_stmt_get_result)
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {

        if (password_verify($password, $row['password'])) {

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['first_name']. ' ' . $row['last_name'];

            if(isset($_POST['remembre'])) {

                setcookie('email', $email, time() + 2*60,'/');
                setcookie('password', $password, time() + 2*60,'/');
                header('Location: home.php');
            }

        }else{
            echo'password invalid';
        }

    }else {
        echo 'email invalid';
    }


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