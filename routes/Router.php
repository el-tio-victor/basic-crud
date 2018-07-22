<?php
require_once('controllers/User_Controller.php');
require_once('controllers/Sale_Controller.php');
class Router{
    
    public function get(){
        $uri = $_SERVER['REQUEST_URI'];
        return explode('/',$uri);
    }
    
    public function routes(){
        session_start();
        $url = $this->get();
        if(empty($url[1])){
            require_once('views/home.php');
        }
        else{
            $url_controller = $url[1];
            switch($url_controller){
                case 'usuarios':
                    $controller = new User_Controller();
                    if(empty($url[2])){
                        $controller->index();
                    }
                    else{
                        $url_function=$url[2];
                       switch($url_function){
                            case 'create':
                               $controller->create();
                                break;
                            case 'store':
                               $controller->store($_POST);
                                break;
                            case 'edit':
                               $id=$url[3];
                               $controller->edit($id);
                                break;
                            case 'update':
                               $controller->update($_POST);
                                break;
                            case 'delete':
                               $id = $url[3];
                               $controller->delete($id);
                               exit();
                                break;
                            default:
                                break;
                        } 
                    }
                    break;
                case 'ventas':
                    $controller = new Sale_Controller();
                    if(empty($url[2])){
                        $controller->index();
                    }
                    else{
                        $url_function =  $url[2];
                        switch($url_function){
                             case 'create':
                               $controller->create();
                                break;
                            case 'store':
                               $controller->store($_POST);
                                break;
                            case 'edit':
                               $id=$url[3];
                               $controller->edit($id);
                                break;
                            case 'update':
                               $controller->update($_POST);
                                break;
                            case 'delete':
                               $id = $url[3];
                               $controller->delete($id);
                               exit();
                                break;
                            default:
                                break;
                        }
                    }
                    break;
                default:
                    echo "Pagina no encontrada";
            }
            
        }
    }
}