<!DOCTYPE html>
<?php
require_once "includes/connection.inc.php";
require_once "includes/models/main_model.php";

$users = get_user_data($pdo);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All system users</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Inconsolata:wght@200..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/crud.css">
</head>

<body>
    <div class="navbar">
        <ul>
            <li><a href="index.php">Dashboard</a></li>
        </ul>
    </div>
    <div class="edit">
        <h1>All Registered Users</h1>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>First-name</th>
                <th>Last name</th>
                <th>Username</th>
                <th>Type/role</th>
                <th>Department in</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo $user['userId'] ?></< /td>
                    <td><?php echo $user['Fname'] ?></td>
                    <td><?php echo $user['Lname'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['roleName'] ?></td>
                    <td><?php echo $user['dptName'] ?></td>
                    <td><button type="button" class="btn btn-primary" value="edit">Edit</button></td>
                    <td>
                        <form action="../includes/user_delete.inc.php" method="POST" class="button-delete">
                            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>


</body>

</html>