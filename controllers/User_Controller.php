<?php
require_once('models/User.php');

class User_Controller{
    private $model;
    
    public function __construct(){
        $this->model = new User();
    }
    
    public function index(){
        $rows = $this->model->read();
        require_once('views/users/users.php');
    }
    
    public function create(){
        $title = 'Nuevo usuario';
        require_once('views/users/create.php');
    }
    
    public function store($data){
        if($this->model->create($data)){
            header('Location: /usuarios');
            $_SESSION['msg']='Datos agregados';
        }
        else{
            header('Location: /usuarios');
            $_SESSION['msg']='Algo salió mal';
        }
    }
    
    public function edit($id){
        $users = $this->model->read($id);
        foreach($users as $user){
            foreach($user as $key => $value){
                $$key = $value;
            }
        }
        $title = 'Editar Usuario';
        require_once('views/users/create.php');
    }
    
    public function update($data){
        if($this->model->update($data)){
            header('Location: /usuarios');
            $_SESSION['msg']='Datos modificados';
        }
        else{
            $_SESSION['msg']= "Algo salió mal";
            $this->edit($data['id']);
        }
    }
    
    public function delete($id){
        header('Content-Type: application/json');
        echo json_encode($this->model->delete($id));
    }
    
}
