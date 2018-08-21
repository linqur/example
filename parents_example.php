<?php
class User{
    public $name;
    public $age;
    public $sname;
    
    public function __construct($name,$age,$sname) {
        $this->name = $name;
        $this->sname = $sname;
        $this->age = $age;
    } 
    public function get_info(){
        return "$this->name $this->sname $this->age";
    }
}
class admin extends User{
    private $propertys;
    private $lvl;
    
    public function __construct($name, $age, $sname,$propertys,$lvl) {
        parent::__construct($name, $age, $sname);
        $this->propertys = $propertys;
        $this->lvl = $lvl;
    }
    public function get_info() {
        $gets = parent::get_info();
        return $gets."$this->propertys $this->lvl ";
    }
}
$admin = new admin("Oleg",27,"Chan",true,2);
echo $admin->get_info();