<?php
namespace controller;



use model\database\DBConnect;
use model\GroupDB;
use model\Staff;
use model\StaffDB;

class StaffController
{
    public $staffDB;
    public $groupDB;

    public function __construct()
    {
        $db = new DBConnect();
        $this->staffDB = new StaffDB($db->connect());
        $this->groupDB = new GroupDB($db->connect());
    }

    public function index()
    {
        $staffs = $this->staffDB->getAll();
        include "view/staff/list.php";
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $groups = $this->groupDB->getAll();
            include "view/staff/add.php";
        } else {
            $staff = new Staff($_POST['name'], $_POST['phone'], $_POST['address'], $_POST['email'], $_POST['group_id']);
            $this->staffDB->add($staff);
            header("Location: index.php");
        }
    }

    public function delete()
    {
        $staffId = $_GET['id'];
        $this->staffDB->destroy($staffId);
        header("Location: index.php");
    }
}