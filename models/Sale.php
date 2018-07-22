<?php
require_once('models/Data_Base.php');

class Sale extends Data_Base{
    
    public function create($data){
        foreach($data as $key=> $value){
            $$key = $value;
        }
        $sql = "INSERT INTO sales (date,description,id_user) VALUES ('$date','$description',$id_user) ";
        return $this->set_data($sql);
    }
    
    public function read($id = ''){
        $sql = ($id === '') ? "SELECT s.id,s.id_user,s.date,s.description, CONCAT(u.name,' ',u.f_name,' ',u.l_name) as user  FROM sales s INNER JOIN users u ON s.id_user = u.id " : "SELECT * FROM sales WHERE id=$id";
        
        return $this->get_data($sql);
    }
    
    public function update($data){
        foreach($data as $key => $value){
            $$key = $value;
        }
        
        $sql = "UPDATE sales SET date='$date', description='$description', id_user=$id_user WHERE id=$id";
        //var_dump($sql);
        return $this->set_data($sql);
    }
    
    public function delete($id){
        $sql = "DELETE FROM sales WHERE id=$id";
        return $this->set_data($sql);
    }
}