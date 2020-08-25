<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'DatabaseConnection.php';

session_start();

if (isset($_POST['login'])) {
    print_r($_POST);
    $arr=DatabaseConnection::query('SELECT * FROM users WHERE (username,password) IN ((:username,:password))',
    array(':username'=>$_POST['username'],':password'=>$_POST['password']));
    if (isset($arr[0])) {
        $_SESSION=$arr[0];
        header('Location: ../page/Accueil.html');
    }
    else header('Location: ../vue/Connection.php');
}
else if (isset($_POST['inscription'])) {
    $arr=DatabaseConnection::query('INSERT INTO users(username,password,adresse,email,numero) VALUES (:username,:password,:adresse,:email,:numero)',
    array(':username'=>$_POST['username'],':password'=>$_POST['password'],':adresse'=>$_POST['adresse'],':email'=>$_POST['email'],':numero'=>$_POST['numero']));
    
    if (!is_string ($arr )){
        $_SESSION['message'] = "pseudo déjà pris";
        header('Location: ../vue/Inscription.php');
      
    }
    else{
        $_SESSION['message'] = "";
        header('Location: ../vue/Connection.php');
    }

}