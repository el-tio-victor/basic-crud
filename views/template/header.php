<?php
require_once('routes/Router.php');
if(!isset($title)){
    $title ='';
}
echo"
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    
    <title>$title</title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css' integrity='sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B' crossorigin='anonymous'>
    <link rel='stylesheet' href='/css/style.css'>
</head>
<body>
    <main>
        <header class='border-bottom'>
            <nav>
                <ul class='nav'>
                    <li class=' nav-item ".active('')."'><a  href='/' class='nav-link text-dark'>Inicio</a></li>
                    <li class=' nav-item ".active('usuarios')."'><a  href='/usuarios' class='nav-link text-dark'>Usuarios</a></li>
                    <li class=' nav-item ".active('ventas')."'><a  href='/ventas' class='nav-link text-dark'>Ventas</a></li>
                </ul>
            </nav>
        </header>
        
       ";

    function active($link){
        $r=new Router();
        $controller = $r->get()[1];
        $print =( $controller === $link) ? 'active' : '';
        return $print;
    }
    