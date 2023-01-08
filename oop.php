<?php
class User{
    protected $name;
    protected $age;
    protected $email;
    protected $password;
    public function __construct($name, $age, $email,$password)
    {
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
        $this->password = $password;
    }

    function set_name($name){
        $this->name = $name;
    }
    function get_name(){
        return $this->name;
    }
}
$user1 = new User("REdirect", 16, "syhanhcbq@gmail.com","syhanhcbq");
$user1->set_name("SyHanh");
print_r($user1);
