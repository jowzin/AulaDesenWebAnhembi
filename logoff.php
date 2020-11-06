<?php
    session_start();

    print_r($_SESSION['autenticado']);

    $auxiliar = $_SESSION['usuarios'];
    session_unset();

    $_SESSION['usuarios'] = $auxiliar;


     header('Location: index.php'); 

?>