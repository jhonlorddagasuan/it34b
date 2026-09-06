<?php

require_once 'config/config.php';
require_once 'include/activity-logger.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $action = trim($_POST['action'] ?? '');

    $user_id = $_SESSION['user_id'] ?? null;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="witdth=device-witdth, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form> method_"POST">
    <buttom
    type='submit'
    name='action'

    >Sample</buttom>
</form>
</body>
</html>