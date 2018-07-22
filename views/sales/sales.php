<?php
if(isset($_SESSION['msg']))
    $p = "<div class='alert alert-success'>".$_SESSION['msg']."</div>";
else
    $p='';
require_once('views/template/header.php');
    
    echo "
        <section class=wrapper>
            <div class=' col-10 d-flex flex-column justify-content-center align-items-center  m-auto contain'>
               <h1>Ventas</h1>
                    $p
                <a href = '/ventas/create'>Nuevo Usuario</a>
                <table class='table'>
                    <thead class='thead-dark'>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Usuario</th>
                        <th>Usuario</th>
                    <thead>
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
                    <th>".$i++."</th>
                    <td>".$row['date']."</td>
                    <td>".$row['description']."</td>
                    <td>".$row['user'] ."</td>
                    <td class=''> 
                        <span class='badge badge-danger btn-del' data-toggle='modal' data-target='#exampleModal' data-del='".$row['id']."'>Eliminar</span>
                        <a href='/ventas/edit/".$row['id']."'><span class='badge badge-primary'>Acrtualizar</span></a>
                    </td>
                </tr>
            ";
        }
    }

    
    echo "
                    </tbody>
                </table>
            </div>
        </section>
    ";
require_once('views/components/modal.php');
require_once('views/template/footer.php');
echo "
    <script src='/js/alerts.js'></script>
    <script>
    var row
    var id_del
    
    $(document).ready(function(){
        $('.btn-del').click(function(){
            id_del = $(this).data('del')
            row = $(this).parents('tr')
            $('.btn-delete').click(function(){
                send()
            })
        })
        
    })
    
    function send(){
        $.post('/ventas/delete/'+id_del,function(response){
            if(response === true){
                row.css({'background':'red','text-align':'center','color':'white'})
                row.html('<td colspan=5>Datos Eliminados </td>')
                setTimeout(function(){
                    row.css('display','none')
                },3000)
            }else if(response === false){
                alert('Algo salió mal')
            }
        })
    }
    </script>
";
session_unset();