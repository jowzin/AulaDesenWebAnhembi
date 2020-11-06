
<?php 
    session_start();

//    $usuarios = array();

    //  $usuariosAdmin = array();
    // array_push( $usuarios, array('email' => 'admin', 'senha' => 'admin'));
    // return;
    // array_push($usuariosAdmin,array('email' => 'admin2', 'senha' => 'admin2'));

    if(isset($_POST['email'])) { // se foi enviado formulário
        $_SESSION["email_atual"]=  $_POST['email']; // para guardar algo na sessão crie o nome desejado conforme o exemplo e atribuir o valor recebido

        //   echo $_SESSION["email_atual"].'<br>'; // após isso basta imprimir o valor armazenado conforme desejado chamando a variável de acordo com o exemplo
    }

    if(isset($_POST['senha'])) { // se foi enviado formulário
        $_SESSION["senha_atual"]=  $_POST['senha']; // para guardar algo na sessão crie o nome desejado conforme o exemplo e atribuir o valor recebido

        //   echo $_SESSION["senha_atual"].'<br>'; // após isso basta imprimir o valor armazenado conforme desejado chamando a variável de acordo com o exemplo
    }
    
        header('Location: validaLogin.php');
?>