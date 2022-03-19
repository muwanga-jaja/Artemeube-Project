<?php
//creates the index model

class IndexModel extends Model{
    //constructor-- inherits from parent model of the system MVC
    public function __construct(){
        parent::__construct();
    }

    public function getAllrecords(){
        return $this->db->select("SELECT * FROM `users` WHERE 1");
    }
    public function submitIndex($data){
        $this->db->insert('users',$data);
    }

}

?>