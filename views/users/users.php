<?php
    require_once('views/template/header.php');
    if(isset($_SESSION['msg'])){
        $p ="<div class='alert alert-success text-center'>".$_SESSION['msg']."</div>";
    }
    else
        $p='';
        echo "
            <section class=' wrapper'>
                
               <div class=' col-10 d-flex flex-column justify-content-center align-items-center  m-auto contain'>
               <h1>Usuarios</h1>
                    $p
                <a href = '/usuarios/create'>Nuevo Usuario</a>
                     <table class='table'>
                        <thead class='thead-dark'>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
        ";
        if(empty($rows)){
            echo"
                <tr><td class=text-center colspan=5><strong>No hay datos para mostrar</strong></td></tr>
                ";
        }
        else{
            $i =1;
            foreach($rows as $row){
                echo "
                    <tr>
                         <td>".$i++."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['f_name']."</td>
                        <td>".$row['l_name']."</td>
                        <td>
                            <a href='/usuarios/edit/".$row['id']."'><button class='btn btn-info'>Actualizar</button></a>
                            <button class='btn btn-danger btn-del' data-del='".$row['id']."' data-toggle='modal' data-target='#exampleModal'>Eliminar</button>
                        </td>
                           
                    </tr>
                ";
            }
        }
        
        echo "<t/body>
                        </table>
               </div>
           
            </section>";
    require_once('views/components/modal.php');
    require_once('views/template/footer.php');
    echo "
     <script>
        var id_del
        var row
        
        $(document).ready(function(){
            $('.btn-del').click(function(){
             
                row = $(this).parents('tr')
                id_del = $(this).data('del')
                
                $('.btn-delete').click(function(){
                    send()
                })
            })
        })
        function send(){
            $.post('/usuarios/delete/'+id_del,function(response){
            console.log(response)
                if(response === true){
                    row.css({'background' : 'red', 'text-align': 'center','color':'white'})
                    row.html('<td colspan=5>Datos Eliminados</td>')
                    setTimeout(function(){
                        row.css('display','none')
                    },3000)
                }
                else if(response === false){
                    alert('Algo salió mal')
                }
            })
        }
    </script>
    <script src='/js/alerts.js'>
    </script>";
session_unset();