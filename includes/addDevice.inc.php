<?php

declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    //fetch entered data and store to specific variables
    $deviceTypId = $_POST['deviceTypId'];
    $modelId = $_POST['modelId'];
    $brandId = $_POST['brandId'];
    $dptId = $_POST['dptId'];
    $statusId = $_POST['statusId'];
    $labelNumber = $_POST['labelNumber'];
    $acqureDate = $_POST['acqureDate'];
    $userId = $_POST['userId'];
    $serialNumber = $_POST['serialNumber'];
    $description = $_POST['description'];

    require_once "models/main_model.php";
    require_once "connection.inc.php";

    sendDeviceData(
        $pdo,
        $deviceTypId,
        $modelId,
        $brandId,
        $dptId,
        $statusId,
        $labelNumber,
        $acqureDate,
        $userId,
        $serialNumber,
        $description
    );

    header('location:../pages-add-device.php?status=success');
    $stmt = null;
    $pdo = null;
    die();
} else {
    header('location:../pages-login.html');
    die();
}
