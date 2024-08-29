<?php

//statement to make sure all the variable types should be identified
declare(strict_types=1);

//Function to fetch department data
function department_data(object $pdo)
{
    //query statement to ftech all the data from the departement database table
    $query = "SELECT * FROM department;";
    $stmt = $pdo->prepare($query);

    $stmt->execute();
    //fetch all the the data and store on variable results
    $results = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $results;
}

//Function to fetch role database table data
function roles_data(object $pdo)
{
    //query statement to ftech all the data from the role database table
    $query = "SELECT * FROM role;";
    $stmt = $pdo->prepare($query);

    $stmt->execute();
    //fetch all the the data and store on variable results
    $results = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $results;
}

//function to send registration data to the database
function send_registration_data(
    object $pdo,
    string $firstname,
    string $lastname,
    string $roleid,
    string $dept_id,
    string $email,
    string $password,
    string $phone
) {
    //query to insert or send data to the database table
    $query = "INSERT INTO user(Fname, Lname, phone, email, password, dptId, roleId) 
              VALUES (:firstname, :lastname, :phone, :email, :password, :dept_id, :roleid);";

    $stmt = $pdo->prepare($query);

    //array of number of encryption or hashing characters
    $options = [
        'cost' => 12
    ];

    //hashed password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

    // Bind parameters
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $hashed_password);
    $stmt->bindParam(":dept_id", $dept_id);
    $stmt->bindParam(":roleid", $roleid);

    $stmt->execute();
}

//function to fetch all the users data from (department & user tables)
function get_user_data(object $pdo)
{
    $query = "SELECT userId, Fname, Lname, email, dptName, roleName FROM user JOIN department ON
    user.dptId = department.dptId JOIN role ON user.roleId = role.roleID;";
    //prepared statement for protection on sending and receiving data
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $results = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $results;
}

function getDeviceType(object $pdo)
{
    //query statement to ftech all the data from the devicetype database table
    $query = "SELECT * FROM devicetype;";
    $stmt = $pdo->prepare($query);

    $stmt->execute();
    //fetch all the the data and store on variable results
    $results = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $results;
}

function getBrandData(object $pdo)
{
    //query statement to ftech all the data from the brand database table
    $query = "SELECT * FROM brand;";
    $stmt = $pdo->prepare($query);

    $stmt->execute();
    //fetch all the the data and store on variable results
    $results = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $results;
}

function getDeviceCondition(object $pdo)
{
    //query statement to ftech all the data from the status database table
    $query = "SELECT * FROM status;";
    $stmt = $pdo->prepare($query);

    $stmt->execute();
    //fetch all the the data and store on variable results
    $results = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $results;
}

function getModelData(object $pdo)
{
    //query statement to ftech all the data from the device model database table
    $query = "SELECT * FROM model;";
    $stmt = $pdo->prepare($query);

    $stmt->execute();
    //fetch all the the data and store on variable results
    $results = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $results;
}

function getDeviceData(object $pdo)
{
    //query statement to ftech all the data from the device model database table
    $query = "SELECT * FROM device;";
    $stmt = $pdo->prepare($query);

    $stmt->execute();
    //fetch all the the data and store on variable results
    $results = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $results;
}

//function to fetch all the counts from users table
function user_count(object $pdo)
{
    $query = "SELECT userId, Fname, Lname, email, dptName, roleName FROM user JOIN department ON
    user.dptId = department.dptId JOIN role ON user.roleId = role.roleID;";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $results = $stmt->fetchall(PDO::FETCH_ASSOC);
    //fetch the number of rows
    $count = count($results);

    return $count;
}

//function to fetch all the counts
function department_count(object $pdo)
{
    $query = "SELECT * FROM department";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $results = $stmt->fetchall(PDO::FETCH_ASSOC);
    //store the counts into count variable
    $count = count($results);
    return $count;
}

function device_count(object $pdo)
{
    $query = "SELECT * FROM device";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $results = $stmt->fetchall(PDO::FETCH_ASSOC);
    //store the counts into count variable
    $count = count($results);
    return $count;
}

function sendDeviceData(
    object $pdo,
    string $deviceTypId,
    string $modelId,
    string $brandId,
    string $dptId,
    string $statusId,
    string $labelNumber,
    string $acqureDate,
    string $userId,
    string $serialNumber,
    string $description
) {
    $query = "INSERT INTO device(deviceTypId, modelId, brandId, dptId, statusId, labelNumber, 
    acqureDate, userId, serialNumber, description) VALUES(:deviceTypId, :modelId, :brandId, 
    :dptId, :statusId, :labelNumber, :acqureDate, :userId, :serialNumber, :description);";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":deviceTypId", $deviceTypId);
    $stmt->bindParam(":modelId", $modelId);
    $stmt->bindParam(":brandId", $brandId);
    $stmt->bindParam(":dptId", $dptId);
    $stmt->bindParam(":statusId", $statusId);
    $stmt->bindParam(":labelNumber", $labelNumber);
    $stmt->bindParam(":acqureDate", $acqureDate);
    $stmt->bindParam(":userId", $userId);
    $stmt->bindParam(":serialNumber", $serialNumber);
    $stmt->bindParam(":description", $description);

    $stmt->execute();
}
