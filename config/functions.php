<?php

function redirect($path){
    header("Location:" . BASE_URL . $path);
    exit();
}

fuction loginUser($pdo,$login,$password){
    #Query 2
    $sql = "
         SELECT
            user_id,
            user_email,
            user_username,
            user_password,
            user_role,
        FROM users
        WHERE user_email = :login 
           OR user_username = :login
        limit 1
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['login' => $login]);

    $user = $stmt->fetch();
    
    if(!$user){
        return false;
    }
    return $user;
}
?>