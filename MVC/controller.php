<!-- <h1> Controller </h1> -->
<?php
require 'model/alunos.php';
require 'model/usuarios.php';
require 'view.php';
$data = array();
class controller
{
    // private $view;
    // private $model;
    public function __construct()
    {
        $this->view = new View();
        // $moduloExterno=$_GET['modulo'];
        // $acaoExterna=$_GET['acao'];
        // $this->view=new View;
        // $this->model=new $moduloExterno;
        // $data=$this->model->$acaoExterna();
        // $this->view->load($moduloExterno, $acaoExterna, $data);
        // return;
    }

    public function init()
    {
        $this->view->carregaView('home');
    }

    public function atualizar()
    {
        $moduloExterno = 'usuarios';
        $acaoExterna = 'ver';
        // $this->view = new View;
        $model = new usuarios();
        // $data = $this->model->$acaoExterna();
        // $this->view->muda($moduloExterno, atualizarBanco() );
    }

    public function mudaTela($x)
    {
        // $moduloExterno='usuarios';
        // $acaoExterna='ver';
        // $this->view = new View;
        $this->view->carregaView($x);
    }

    public function validaLogin()
    {
        // echo ('valida LOGIN controller');
        // $moduloExterno = 'alunos';
        // $acaoExterna = 'ver';
        $model = new alunos();
        // echo ('valida LOGIN 2');
        $data = $model->validaLog();
        // echo ('<br><br><br><br>valida LOGIN  ' . $data);
        
        // echo ('<br><br><br><br><br><br><br>V - PHP senha '.$_SESSION["email_atual"]);
        // echo ('<br><br><br><br><br><br><br>V - PHP email '.$_SESSION["senha_atual"]);

        if ($data != 1) {
            echo ('<br><br><br><br>VALIDADO LOGIN  ' . $data); //FALA PRA COLOCAR EMAIL E SENHA VALIDO
        } else {

            // $model = new alunos();
            $idEmail = $model->ver($_SESSION["email_atual"]);
            // echo ('<br><br> ID EMAIL LOGIN  '.$idEmail); //FALA PRA COLOCAR EMAIL E SENHA VALIDO

            // echo ('NAO VALIDOU LOGIN  ' . $data);
            $moduloExterno = 'usuarios';
            $acaoExterna = 'ver';
            // $view1 = new View();
            $model = new usuarios();
            $vetor = $model->ver($idEmail);
            $this->view = new View();
            // echo ('<br><br><br><br>Vetor nome ' . $vetor['nome']); //FALA PRA COLOCAR EMAIL E SENHA VALIDO
            if($vetor['admin_enabled'] == 1){
                // $this->view->carregaView('admin');
                header('Location: admin.php'); 
            }else{
                $_SESSION['dadosUser'] = $vetor;
                // $this->view->load($moduloExterno, $acaoExterna, $vetor);
                // $this->view = new View();
                // $this->view->carregaView('usuarios/ver');
                 header('Location: ../templates/usuarios/ver.php'); 
            }
        }
        // if($data == 9){
        //     $this->view->carregaView('admin');
        // }else{
        //     $moduloExterno = 'usuarios';
        //     $acaoExterna = 'ver';
        //     $model = new usuarios();
        //     $vetor = $model->ver($data);
        //     // $this->view = new View();
        //     $this->view->load($moduloExterno, $acaoExterna, $vetor);
        // }
        // $this->view->carregaView($moduloExterno);
    }
    // public function viewusuario($id)
    // {
    //     echo ('LOGIN cUSUARIOS<br>');
    //     echo ('ID-> ' . $id);
    //     $moduloExterno = 'usuarios';
    //     $acaoExterna = 'ver';
    //     $this->view = new View;
    //     $this->model = new $moduloExterno;
    //     $vetor = $this->model->$acaoExterna();
    //     $this->view->load($moduloExterno, $acaoExterna, $vetor);
    //     // $this->view->carregaView($moduloExterno);
    // }
}
?>