<?php
// require '../../controller.php';
// require '../view.php';
// require 'alunos.php';
// require 'usuarios.php';
// $c = new controller();

class alunos
{
    private $dados = array(
        1 => 'João Marcus - RA: 21017973 ',
        2 => 'Giovani Javarini - RA: 20948805 ',
        3 => 'Jonathan Santana do Nascimento – RA: 20698775  ',
        4 => 'Victor Henrique de Oliveira - RA: 21006144 ',
        5 => 'Leandro Lima – RA: 20920645 ',
        6 => 'Luis Gustavo de Lima Domingues - RA: 20970889',
    );
    public function todos()
    {
        $data = $this->dados;
        return $data;
    }

    public function validaLog()
    {
        // echo ('USUARIOS>$c->validaLogin();');

        if (isset($_POST['email']) && isset($_POST['senha']) && $_POST['email'] != "" && $_POST['senha'] != "") {

            $_SESSION["email_atual"] =  $_POST['email'];
            // }
            $_SESSION["senha_atual"] =  $_POST['senha'];

            return 1;
            // return $this->ver();

        } else {
            // echo ('COLOCAR EMAIL/SENHA VALIDOS');
            return 2;
        }
    }

    public function ver($email)
    {
        $usuario_autenticado = false;
        $usuario_autenticado_admin = false;
        $id = 0;

        session_start();
        
        $con = mysqli_connect("localhost", "root", "");
        $banco = mysqli_select_db($con, "dsw");
        $sql = "SELECT * FROM usuarios WHERE email='" . $email . "';";
        $res = mysqli_query($con, $sql);

        if ($res) {

            // echo 'RES '.$res;
            $reg = mysqli_fetch_array($res);
            if ($reg["admin_enabled"] == 1) {
                // echo " <br><br> VAI PRO ADMIN ->" . $email . " e enabled " . $reg["admin_enabled"];
                $usuario_autenticado_admin = true;
                // echo " <br><br><br><br><br><br><br><br> ID ENVIADO AMIN " . $email;
                $id = $reg["id"];
                //    header('Location: admin.php'); 
            } else {
                // echo " <br><br> USUARIO:LOGIN REALIZADO " . $email . " e ID -> " . $reg["id"] . " /!!";
                $usuario_autenticado = true;
                // echo " <br><br><br><br><br><br><br><br> ID ENVIADO USUARIO " . $reg["id"];
                $id = $reg["id"];
                //  header('Location: user.php'); 
            }
        } else {
            echo " <br><br> USUARIO:LOGIN NAO REALIZADO " . $email;
        }
        mysqli_close($con);

        if ($usuario_autenticado) {
            $_SESSION['autenticado'] = 'SIM';
            // echo '<br>AUTENTICADO';
        } else if ($usuario_autenticado_admin) {
            $_SESSION['autenticado_admin'] = 'SIM';
            $_SESSION['autenticado'] = 'SIM';
            // echo '<br>AUTENTICADO ADMIN';
        } else {
            $_SESSION['autenticado'] = 'NÃO';
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('CADASTRO NAO EXISTE)
            window.location.href='login.php';
            </SCRIPT>");
            // header('Location: login.php?Login>erro'); 
        }
        // $data['registro'] = $this->dados[$_GET['id']];
        return $id;
    }
}
