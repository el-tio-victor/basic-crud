<?php

require_once('models/User.php');
require_once('models/Sale.php');

class Sale_Controller {
    private $model;
    
    public function __construct(){
        $this->model = new Sale();
    }
    
    public function index(){
        $title = 'Ventas';
        $rows = $this->model->read();
        require_once('views/sales/sales.php');
    }
    
    public function create(){
        $u = new User();
        $users = $u->read();
        $title = 'Nueva Venta';
        require_once('views/sales/create.php');
    }
    
    public function store($data){
        if($this->model->create($data)){
            $_SESSION['msg'] = 'Datos Agregados';
            header('Location: /ventas');
        }
        else{
            $_SESSION['msg'] = 'Algo salió mal';
            header('Location: /ventas/create');
        }
    }
    
    public function edit($id){
        $u = new User();
        $users = $u->read();
        $title = 'Editar Venta';
        $rows = $this->model->read($id);
        foreach($rows as $row){
            foreach($row as $key => $value){
                $$key = $value;
            }
        }
        require_once('views/sales/create.php');
    }
    
    public function update($data){
        if($this->model->update($data)){
            $_SESSION['msg'] = 'Datos Agregados';
            header('Location: /ventas');
        }
        else{
            $_SESSION['msg'] = 'Algo salió mal';
            $this->edit($data['id']);
        }
    }
    
    public function delete($id){
        header('Content-Type: application/json');
        echo json_encode($this->model->delete($id));
    }
}