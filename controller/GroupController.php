<?php


namespace controller;


use model\database\DBConnect;
use model\GroupDB;
use model\StaffDB;

class GroupController
{
    public $staffDB;
    public $groupDB;

    public function __construct()
    {
        $db = new DBConnect();
        $this->staffDB = new StaffDB($db->connect());
        $this->groupDB = new GroupDB($db->connect());
    }

    public function getStaffsIntoGroup()
    {
        $groupId = $_GET['group_id'];
        $students = $this->groupDB->getStaffsByGroupId($groupId);
        var_dump($students);
    }
}