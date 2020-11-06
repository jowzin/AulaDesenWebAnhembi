
<?php 
    session_start();

    if(isset($_POST['email'])) { // se foi enviado formulário
        $_SESSION["email_atual"]=  $_POST['email']; 

    }

    if(isset($_POST['senha'])) { 
        $_SESSION["senha_atual"]=  $_POST['senha']; 

    }
    
        header('Location: validaLogin.php');
?>