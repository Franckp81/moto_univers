<?php

    $array = array("firstname" => "", "name" => "", "email" => "", "phone" => "", "message" => "", "firstnameError" => "", "nameError" => "", "emailError" => "", "phoneError" => "", "messageError" => "", "isSuccess" => false);
    $emailTo = "frank.perie24@gmail.com";

    if ($_SERVER["REQUEST_METHOD"] == "POST")  // Me permet de rendre les valeurs déjà rentrées dans la première connexion pour un utilisateur.
    { 
        $array["firstname"] = test_input($_POST["firstname"]);
        $array["name"] = test_input($_POST["name"]);
        $array["email"] = test_input($_POST["email"]);
        $array["phone"] = test_input($_POST["phone"]);
        $array["message"] = test_input($_POST["message"]);
        $array["isSuccess"] = true; 
        $emailText = ""; // Va me permettre de construire la structure pour l'email envoyé.
        
        if (empty($array["firstname"]))
        {
            $array["firstnameError"] = "Je veux connaitre ton prénom !";
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText .= "Firstname: {$array['firstname']}\n";// permet de sauter une ligne visible du côté back
        }

        if (empty($array["name"]))
        {
            $array["nameError"] = "Et oui je veux tout savoir. Même ton nom !";
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText .= "Name: {$array['name']}\n";
        }

        if(!isEmail($array["email"])) // Le point d'interrogation ajoute une négation devant ma fonction.
        {
            $array["emailError"] = "T'essaies de me rouler ? C'est pas un email ça  !";
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText .= "Email: {$array['email']}\n";
        }

        if (!isPhone($array["phone"]))
        {
            $array["phoneError"] = "Que des chiffres et des espaces, stp...";
            $array["isSuccess"] = false; 
        }
        else
        {
            $emailText .= "Phone: {$array['phone']}\n";
        }

        if (empty($array["message"]))
        {
            $array["messageError"] = "Qu'est-ce que tu veux me dire ?";
            $array["isSuccess"] = false; 
        }
        else
        {
            $emailText .= "Message: {$array['message']}\n";
        }
        
        if($array["isSuccess"]) 
        {
            $headers = "From: {$array['firstname']} {$array['name']} <{$array['email']}>\r\nReply-To: {$array['email']}";
            mail($emailTo, "Un message de votre site", $emailText, $headers);// Fonction PHP contenant l'adresse de destination, l'objet, la variable concaténée tout le long avec toutes les infos lors de l'envoie, et l'en-tête contenant qui envoie le mail etc...
        }
        
        echo json_encode($array); // Va encoder tout le résultat du travail de mon php.
        
    }

    function isEmail($email) 
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);// filter_var permet de checker si une entrée est bien une variable d'un certain type (email dans mon cas).
    }
    function isPhone($phone) 
    {
        return preg_match("/^[0-9 ]*$/",$phone); // Expression régulière définissant que les caractères possible sont entre 0 et 9 ainsi que les espaces et le signe multiplier indique que l'utilisateur peut rentrer plusieurs fois des caractères.

    }
    function test_input($data) 
    {
      $data = trim($data);// Permet d'enlever tous les espaces suplémentaires, les tabulations, les retours à la ligne etc...
      $data = stripslashes($data); // Permet d'enlever tous les antislash de ma variable.
      $data = htmlspecialchars($data);// Me permet de sécuriser la failli XSS.
      return $data;
    }