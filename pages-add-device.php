<!DOCTYPE html>
<?php
require_once "includes/connection.inc.php";
require_once "includes/models/main_model.php";

//declare variables that holds data from different database tables
$departments = department_data($pdo);
$devicetypes = getDeviceType($pdo);
$brands = getBrandData($pdo);
$users = get_user_data($pdo);
$conditions = getDeviceCondition($pdo);
$models = getModelData($pdo);
$devices = getDeviceData($pdo);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Inconsolata:wght@200..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/add_item.css">
    <title>Add item</title>
</head>

<body>
    <div class="navbar">
        <ul>
            <li><a href="index.php">Dashboard</a></li>
        </ul>
    </div><br><br>
    <div class="reg-form">
        <form action="includes/addDevice.inc.php" id="form1" method="POST">
            <h1>Register New Device</h1>
            <hr><br>
            <label for="serialNumber">Serial number:</label><br>
            <input type="text" name="serialNumber"><br>
            <label for="labelNumber">Device label:</label><br>
            <input type="text" name="labelNumber">
            <br>
            <label for="acqureDate">Acquired date:</label><br>
            <input type="date" name="acqureDate"><br>
            <label for="in_department">Department Assigned: </label><br>
            <select class="form-select" aria-label="Disabled select example" row="1" name="dptId">
                <option selected>Select department</option>
                <!-- loops data and displays them all -->
                <?php foreach ($departments as $department): ?>
                    <option value="<?php echo $department['dptId']; ?>"><?php echo $department['dptName']; ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="">Device type:</label><br>
            <select class="form-select" aria-label="Disabled select example" row="1" name="deviceTypId">
                <option selected>Select device type</option>
                <?php foreach ($devicetypes as $device): ?>
                    <option value="<?php echo $device['deviceTypId']; ?>"><?php echo $device['deviceTypName']; ?></option>
                <?php endforeach; ?>
            </select><br>
            <label for="">Device brand</label><br>
            <select class="form-select" aria-label="Disabled select example" row="1" name="brandId">
                <option selected>Select device brand:</option>
                <?php foreach ($brands as $brand): ?>
                    <option value="<?php echo $brand['brandId']; ?>"><?php echo $brand['brandName']; ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="">Device user:</label><br>
            <select class="form-select" aria-label="Disabled select example" row="1" name="userId">
                <option selected>Select device user</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?php echo $user['userId']; ?>"><?php echo $user['email']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="item_description">Item description:</label><br>
            <textarea name="description" placeholder="Provide brief description for this item..."></textarea>
            <br>
            <label for="item_condition">Device condition:</label><br>
            <select class="form-select" aria-label="Disabled select example" row="1" name="statusId">
                <option selected>Select device condition</option>
                <?php foreach ($conditions as $condition): ?>
                    <option value="<?php echo $condition['statusId']; ?>"><?php echo $condition['statusName']; ?></option>
                <?php endforeach; ?>
            </select><br>
            <label for="item_condition">Device model:</label><br>
            <select class="form-select" aria-label="Disabled select example" row="1" name="modelId">
                <option selected>Select device model</option>
                <?php foreach ($models as $model): ?>
                    <option value="<?php echo $model['modelId']; ?>"><?php echo $model['modelName']; ?></option>
                <?php endforeach; ?>
            </select><br><br>
            <label for="attachement">Is the device have attached device?</label><br>
            <div class="form-check" id="input-div">
                <input class="form-check-input" type="radio" onchange="toggleAttachment(true)" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">Yes</label><br>
                <input class="form-check-input" type="radio" onchange="toggleAttachment(false)" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">No</label>
            </div><br>

            <!-- block of code to be hidden if the selection is No -->
            <div id="attachment-options" style="display: none;">
                <label for="attachedDevice">Select attached device:</label><br>
                <select class="form-select" aria-label="Disabled select example" name="device2">
                    <option selected>Select attached device</option>
                    <?php foreach ($devices as $device): ?>
                        <option value="<?php echo $device['deviceId']; ?>"><?php echo $device['labelNumber']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div><br>

            <button type="submit" id="button-add">Add</button>
        </form>
    </div>

    <script>
        //javascript function to fetch the selected radio input value
        function toggleAttachment(hasAttachment) {
            const attachmentDiv = document.getElementById('attachment-options');
            if (hasAttachment) {
                // if the hasAttachment is true(has value) this body will be executed
                // that will display the select element for attaching device
                attachmentDiv.style.display = 'block';
            } else {
                //if the hasAttachment is false(empty) this body will be executed
                attachmentDiv.style.display = 'none';
            }
        }
    </script>

    <br>
</body>

</html>