<?php
//Start User Session
function startUserSession($pdo){
    if(!isset($_SESSION['user_id'])){
        return false;
    }

    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("
        INSERT INTO user_sessios(
            user_id,
            session_start
            )
}