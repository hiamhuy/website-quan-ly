<?php
class account
{
    public $id;
    public $name;
    public $username;
    public $password;
    public $type;
    public $avatar;

    private function __construct($id, $name, $username, $password, $type, $avatar)
    {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->type = $type;
        $this->avatar = $avatar;

    }
}


?>