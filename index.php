<?php

use controller\StaffController;

include "model/database/DBConnect.php";
include "model/Staff.php";
include "model/Group.php";
include "model/StaffDB.php";
include "model/GroupDB.php";
include "controller/StaffController.php";

$staffController = new StaffController();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php

$page = ($_GET['page']) ? $_GET['page'] : null;
switch ($page){
    case "add" :
        $staffController->create();
        break;
    case "delete" :
        $staffController->delete();
        break;
    default:
        $staffController->index();
}
?>
</body>
</html>
