<?php
    require_once('views/template/header.php');
    if(isset($id)){
        $action = 'Editar';
        $action_form='/usuarios/update';
        $input ="<input type='hidden' name='id' value='$id'>";
    }
    else{
        $input = '';
        $action = 'Nuevo';
        $action_form='/usuarios/store';
        $name='';
        $f_name='';
        $l_name='';
    }
    if(isset($_SESSION['msg']))
        $p="<div class='alert alert-primary text-center'>".$_SESSION['msg']."</div>'";
    else
        $p='';
        echo"
            <section class=' wrapper'>
               <div class=' col-10 d-flex flex-column justify-content-center align-items-center  m-auto contain'>
                    <h1>$action Usuario</h1>
                    $p
                    <form action ='$action_form' method='POST'>
                        $input
                        <div class='form-group'>
                            <label>Name:</label>
                            <input type='text' name='name' value='$name' class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label>Apellid Paterno:</label>
                            <input type='text' name='f_name' value='$f_name' class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label>Apellido Materno:</label>
                            <input type='text' name='l_name' value='$l_name' class='form-control'>
                        </div>
                        <button class='btn btn-success'>Enviar</button>
                    </form>
                </div>
            </section>
        ";
    
    require_once('views/template/footer.php');
echo "
   
    <script src='/js/alerts.js'></script>";
session_unset();