<?php

namespace model;

class StaffDB
{
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function getAll()
    {
        $sql = "SELECT staffs.*, groups.name as group_name FROM staffs INNER JOIN groups ON staffs.group_id = groups.id";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetchAll();
        $arrStaff = [];
        foreach ($result as $item) {
            $staff = new \stdClass();
            $staff->id = $item['id'];
            $staff->name = $item['name'];
            $staff->phone = $item['phone'];
            $staff->address = $item['address'];
            $staff->email = $item['email'];
            $staff->group = [
                "id" => $item['group_id'],
                "name" => $item['group_name']
            ];
            array_push($arrStaff, $staff);
        }

        return $arrStaff;
    }

    public function add($staff)
    {
        $sql = "INSERT INTO staffs(name, phone, address, email, group_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $staff->getName());
        $stmt->bindParam(2, $staff->getPhone());
        $stmt->bindParam(3, $staff->getAddress());
        $stmt->bindParam(4, $staff->getEmail());
        $stmt->bindParam(5, $staff->getGroupId());

        $stmt->execute();
    }

    public function destroy($staffId){
        $sql = "DELETE FROM staffs WHERE id= $staffId";
        $this->connect->query($sql);
    }

}