<?php //settings.php

//Définition du fuseau horaire
date_default_timezone_set('Europe/Paris');

//Ouverture de session
session_start();

//Config BDD
$host = "localhost";
$dbname = "dcp_b3_employes";
$login = "root";
$password = ""; // à modifier si sous windows ou MAC

//Connexion
$pdo = new PDO(
    'mysql:host='.$host.';charset=utf8;dbname='.$dbname,
    $login,
    $password,
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    )
);

//définition de constante
define('URL', '/');

function flash_in($type, $message)
{

    if (empty($_SESSION['message'])) $_SESSION['message'] = array();
    array_push($_SESSION['message'], array($type, $message));
}

function flash_out()
{
    $errors = array();
    $success = array();

    if(!empty($_SESSION['message'])){
       foreach($_SESSION['message'] as $message){
        if($message[0] == 'error') $errors[] = $message[1];
        if($message[0] == 'success') $success[] = $message[1];
       }       
    }
    $messages = '';
    if(!empty($errors)){
        $messages .= '<p class="alert alert-danger">'.(implode('<br>',$errors)).'</p>';
    }
    if(!empty($success)){
        $messages .= '<p class="alert alert-success">'.(implode('<br>',$success)).'</p>';
    }
    unset($_SESSION['message']); // On retire les messages qui étaient en attente d'affichage
    return $messages;
}

function executeSQL ( $requete, $params = array()){

    global $pdo; // on accède une variable de l'espace global

    if(!empty($params)){
        foreach($params as $key => $value){
            // les balises html sont neutralisées
            $params[$key] = htmlspecialchars($value);
        }
    }
    $query = $pdo->prepare($requete);
    $query->execute($params);

    return $query;
}

function getUserByLogin($login){
    $infosuser = executeSQL("SELECT * FROM users WHERE login=:login",array('login' => $login));
    if($infosuser->rowCount() == 1){
        return $infosuser->fetch();
    }
    else{
        return false;
    }
}

