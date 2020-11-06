<?php

session_start();

$usuario_autenticado = false;
    
    session_start();
    // print_r($_SESSION);
    // echo'<hr />'
   

    $usuariosAdmin = array('email' => 'admin', 'senha' => 'admin');
    array_push($usuariosAdmin,array('email' => 'admin', 'senha' => 'admin'));

    foreach( $usuariosAdmin as $user ){
        if($user['email'] == $_SESSION["email_atual"] && $user['senha'] == $_SESSION["senha_atual"]){
            $usuario_autenticado_admin = true;
            // header('Location: agendamentos.php'); 
            header('Location: admin.php'); 
        }
    }

    foreach($_SESSION['usuarios'] as $user2 ){
        if($user2['email'] == $_SESSION["email_atual"] && $user2['senha'] == $_SESSION["senha_atual"]){
            $usuario_autenticado = true;
            header('Location: user.php'); 
        }
    }
    
    if($usuario_autenticado){
        $_SESSION['autenticado'] = 'SIM';
        echo 'AUTENTICADO';
    }

    else if($usuario_autenticado_admin){
        $_SESSION['autenticado_admin'] = 'SIM';
        $_SESSION['autenticado'] = 'SIM';
        echo 'AUTENTICADO ADMIN';
    }
    
    else{  
        $_SESSION['autenticado'] = 'NÃO';
         echo ("<SCRIPT LANGUAGE='JavaScript'>
         window.alert('CADASTRO NAO EXISTE)
         window.location.href='login.php';
         </SCRIPT>");
         header('Location: login.php?Login>erro'); 
      }
?>
