<?php

declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    //fetch entered data and store to specific variables
    $firstname = $_POST['Fname'];
    $lastname = $_POST['Lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dept_id = $_POST['dptId'];
    $password = $_POST['password'];
    $roleid = $_POST['roleId'];

    require_once "models/main_model.php";
    require_once "connection.inc.php";

    send_registration_data(
        $pdo,
        $firstname,
        $lastname,
        $roleid,
        $dept_id,
        $email,
        $password,
        $phone
    );

    header('location:../pages-register.php?register=success');
    die();
} else {
    header('location:../pages-login.html');
    die();
}
