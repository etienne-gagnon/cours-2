<?php

    $nom = "";
    $email = "";
    $message = "";
    $erreurNom = "";
    $erreurEmail = "";
    $erreurMessage = "";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        
        if(empty($nom)){
            $erreurNom = "Vous devez écrire votre nom";
        }
        
        if(empty($email)){
            $erreurEmail = "Vous devez écrire votre courriel";
        }
        
        if(empty($message)){
            $erreurMessage = "Vous devez écrire un message";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erreurEmail = "Le courriel est invalide";
        }

        if($erreurNom == "" && $erreurEmail == "" && $erreurMessage == ""){
            header("Location: " . route('confirmation'));
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </nav>
    <main>
    <h1>About</h1>
    <form action="" method="POST">
        {{ csrf_field() }}

        <label for="">Nom</label>
        <input name="nom" type="text" placeholder="Écrivez votre nom ici ..." value="<?php echo $nom ?>">
        <label class="erreur"><?php echo $erreurNom ?></label>  
        <label for="" >Email</label>
        <input name="email" type="text" placeholder="info@exemple.com" value="<?php echo $email ?>">
        <label class="erreur"><?php echo $erreurEmail ?></label>
        <label for="" >Message</label>
        <textarea name="message" placeholder="Écrivez votre nom ici ..."><?php echo $message ?></textarea>
        <label class="erreur"><?php echo $erreurMessage ?></label>
        
        <button>Envoyer</button>
    </form>
    </main>
</body>
</html>