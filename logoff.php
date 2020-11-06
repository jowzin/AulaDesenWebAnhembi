<?php
    session_start();

    print_r($_SESSION['autenticado']);
    // unset($_SESSION['autenticado'] );
    // unset($_SESSION['email_atual'] );
    // unset($_SESSION["senha_atual"] );

    $auxiliar = $_SESSION['usuarios'];
    session_unset();

    $_SESSION['usuarios'] = $auxiliar;

    // print_r($_SESSION['usuarios']);
    // echo( '<br><br>');
    // echo($_SESSION['email_atual']);
    // echo( '<br><br>');
    // echo($_SESSION['senha_atual']);
    // echo( '<br><br>');
    // echo($_SESSION['autenticado']);

     header('Location: index.php'); 

?>