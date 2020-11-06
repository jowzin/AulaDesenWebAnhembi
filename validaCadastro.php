<?php

    session_start();

    if(!isset($_SESSION['usuarios'])) {
        $_SESSION['usuarios'] = array(); 
    }

    if($_SESSION['AtualizaUser'] == 'SIM'){
        unset($_SESSION['usuarios'][ $_SESSION['ContUser'] ]);
        sort( $_SESSION['usuarios'] );
    }
     array_push($_SESSION['usuarios'], array('email' => $_POST['email'], 'senha' => $_POST['senha'], 'dataNasc' => $_POST['dataNasc'], 'tel' => $_POST['tel']
                                    ,'telRes' => $_POST['telRes'], 'sexo' => $_POST['sexo'], 'estadoCivil' => $_POST['estadoCivil'], 'endereco' => $_POST['endereco'], 
                                     'nome' => $_POST['nome']));

                                     
    if($_SESSION['AdminUser'] == 'SIM'){
        unset($_SESSION['AdminUser']);
        // unset($_SESSION['autenticado']);
        header('Location: admin.php');
    }else if ($_SESSION['AtualizaUser'] == 'SIM'){
        unset($_SESSION['AtualizaUser']);
        header('Location: index.php');
    }else{
        header('Location: login.php');
    }
    
?>