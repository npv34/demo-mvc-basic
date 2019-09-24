<?php


namespace model;


class Staff
{
    private $id;
    private $name;
    private $phone;
    private $address;
    private $email;
    private $groupId;

    public function __construct($name, $phone, $address, $email, $groupId)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
        $this->email = $email;
        $this->groupId = $groupId;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

}