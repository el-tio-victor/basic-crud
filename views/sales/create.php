<?php
if(isset($id)){
    $action ='Actualizar';
    $input = "<input type=hidden name=id value='$id'>";
    $action_form = '/ventas/update';
}
else{
    $action ='Nueva';
     $action_form = '/ventas/store';
    $input = "";
    $date='';
    $description ='';
    $id_user ='';
}

if(isset($_SESSION['msg']))
   $p = "<div class='alert alert-info'>".$_SESSION['msg']."</div>";
else
    $p='';
  session_unset();  
    require_once('views/template/header.php');
    
    echo "
        <section class='wrapper'>
            <div class=' col-10 d-flex flex-column justify-content-center align-items-center  m-auto contain'>
                <h1>$action Venta</h1>
                $p
                <form method='post' action='$action_form'>
                $input
                <div class='form-group'>
                    <label>Fecha</label>
                    <input type=date name='date' value='$date' class='form-control'>
                </div>
                <div class='form-group'>
                    <label>Description</label>
                    <textarea name='description'  class='form-control'>
                        $description
                    </textarea>
                </div>
                <div class='form-group'>
                    <label>Usuario</label>
                    <select name='id_user' class='form-control'>
                        <option value=''>Selecciona usuario</option>";
                        
            foreach($users as $user){
                $selected = ($id_user === $user['id']) ? 'selected' : '';
                echo "
                    <option $selected value='".$user['id']."'>".$user['name']." ".$user['f_name']." ".$user['l_name']."</option>
                ";
            }

                    echo"</select>
                </div>
                <button class='btn btn-success'>Enviar</button>
                </form>
            </div>
        </section>
    ";
    require_once('views/template/footer.php');
    echo "
        <script src='/js/alerts.js'></script>
    ";
