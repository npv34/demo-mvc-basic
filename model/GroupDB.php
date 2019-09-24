<?php


namespace model;


class GroupDB
{
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM groups";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetchAll();
        $arrGroups = [];
        foreach ($result as $item) {
            $staff = new Group($item['name']);
            $staff->setId($item['id']);
            array_push($arrGroups, $staff);
        }

        return $arrGroups;
    }

    public function getStaffsByGroupId($groupId)
    {
        $sql = "SELECT staffs.*, groups.name as group_name FROM staffs
                INNER JOIN groups ON staffs.group_id = groups.id
                WHERE groups.id = $groupId";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetchAll();
        $arrStaff = [];
        foreach ($result as $item) {
            $staff = new Staff($item['name'], $item['phone'], $item['address'], $item['email'], $item['group_id']);
            $staff->setId($item['id']);
            array_push($arrStaff, $staff);
        }

        return $arrStaff;
    }

}