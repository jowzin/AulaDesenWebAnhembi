<?php

    session_start();

    if(!isset($_SESSION['usuarios'])) {
        $_SESSION['usuarios'] = array(); // se não foi criado ainda a variável DADOS, cria e define como um array
    }

    // include('Usuarios.php');
    
    //  array_push($usuarios, array('email' => $_POST['email'], 'senha' => $_POST['senha'], 'dataNasc' => $_POST['dataNasc'], 'tel' => $_POST['tel']
    //                                   ,'telRes' => $_POST['telRes'], 'sexo' => $_POST['sexo'], 'estadoCivil' => $_POST['estadoCivil'], $_POST['endereco'], 'admin_enable' => false
    //                                   , 'nome' => $_POST['nome']));
                                     
    //  array_push($_SESSION['usuarios'], array('email' => $_POST['email'], 'senha' => $_POST['senha'] , 'admin_enable' => false )); // adiciona os dados recebidos no array utilizando a função array_push passando um novo array com esse dados
    if($_SESSION['AtualizaUser'] == 'SIM'){
        unset($_SESSION['usuarios'][ $_SESSION['ContUser'] ]);
        sort( $_SESSION['usuarios'] );
    }
     array_push($_SESSION['usuarios'], array('email' => $_POST['email'], 'senha' => $_POST['senha'], 'dataNasc' => $_POST['dataNasc'], 'tel' => $_POST['tel']
                                    ,'telRes' => $_POST['telRes'], 'sexo' => $_POST['sexo'], 'estadoCivil' => $_POST['estadoCivil'], 'endereco' => $_POST['endereco'], 
                                     'nome' => $_POST['nome']));

    //   var_dump($_SESSION['usuarios']); // para testar imprima a variável pra ver como está ficando
    // $_SESSION['usuarios']= array_unique($_SESSION['usuarios']);          //TESTAR SE TIVER REPETINDO
                                     
    if($_SESSION['AdminUser'] == 'SIM'){
        unset($_SESSION['AdminUser']);
        unset($_SESSION['autenticado']);
        header('Location: admin.php');
    }else if ($_SESSION['AtualizaUser'] == 'SIM'){
        unset($_SESSION['AtualizaUser']);
        header('Location: index.php');
    }else{
        header('Location: login.php');
    }
    
?>