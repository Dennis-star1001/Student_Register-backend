<?php
class Register extends Database
{
    public $first_name;
    public $last_name;
    public $address;
    public $age;
    public $gender;
    public $table = 'register';

    public function StudentInfo($condition = "", $field = "*", $column = "")
    {
        return  $this->lookUp($this->table, $field, $condition, $column);
    }


    public function countUserRows($condition)
    {
        return $this->countRows($this->table, "*", $condition);
    }

    public function is_Exists($condition)
    {
        $rlt = $this->countUserRows($condition);
        if ($rlt > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function processRegister($first_name, $last_name, $address, $age, $gender)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->address = $address;
        $this->age = $age;
        $this->gender = $gender;

        $this->saveRegisiter();
    }
    public function saveRegisiter()
    {
        echo "first_name = '$this->first_name', last_name = '$this->last_name', address = '$this->address', age= '$this->age', gender = '$this->gender' ";
        exit;
        $this->save($this->table, "first_name = '$this->first_name', last_name = '$this->last_name', address = '$this->address', age= '$this->age', gender = '$this->gender' ");
    }
}
