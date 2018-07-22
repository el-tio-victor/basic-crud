<?php
require_once('models/Data_Base.php');

class User extends Data_Base {
    
    public function create($data){
        foreach($data as $key => $value){
            $$key = $value;
        }
        $sql = "INSERT INTO users (name,f_name,l_name) VALUES ('$name','$f_name','$l_name')";
        return $this->set_data($sql);
    }
    
    public function read($id = ''){
        $sql = ($id === '') ? "SELECT * FROM users " : "SELECT * FROM users WHERE id =$id";
        return $this->get_data($sql);
    }
    
    public function update($data){
        foreach($data as $key => $value){
            $$key = $value;
        }
        $sql ="UPDATE users SET name='$name',f_name='$f_name',l_name='$l_name' WHERE id=$id";
         return $this->set_data($sql);
    }
    public function delete($id){
        $sql ="DELETE FROM users  WHERE id=$id";
        return $this->set_data($sql);
    }
}