<?php
include "configs/bd.php";
?>
<script defer src="/js/script.js"></script>
<script src='js/online.js'></script>

<!DOCTYPE html>
<html>
<head>
	<title>Cat_chat</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php include "parts/header.php"; ?>
    <div class='settings'>
        <a href='/'>X</a> 

        <h2>Смена пароля</h2>
        <?php include "parts/changePassword.php"; ?>

        <h2>Смена имени</h2>
        <?php include "parts/changeName.php"; ?>

        <h2>Смена аватарки</h2>
        <?php include "parts/changeAvatar.php"; ?>
    </div>

    <script src='js/changeAvatar.js'></script>
    
</body>
</html>