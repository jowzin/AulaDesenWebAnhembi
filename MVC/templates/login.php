<?php
require '../controller.php';
// require 'view.php';
// require 'model/alunos.php';
// require 'model/usuarios.php';
$c = new controller();

if(isset($_POST['submit'])){
  echo'APERTOU O BOTAO ENTRAR';
  $c->validaLogin();
}

?>


<!DOCTYPE html>
<html lang="br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SayaGym</title>

 
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 
  <link href="../../css/estilo.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="home.php">SayaGym</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="agendamentos.php">Agendamentos</a> 
          </li>
						<li class="nav-item" >
							<a  class="nav-link" href="sobre.php">Sobre</a>
						</li>
						<li class="nav-item" >
						<?php if($_SESSION['autenticado']=='NAO' || $_SESSION['autenticado'] == NULL) { ?>
							<a  class="nav-link" href="login.php">Login/Cadastro</a>
						</li>
						<?php   } ?>
						<?php if($_SESSION['autenticado']== 'SIM') { ?>
							<a  class="nav-link" href="user.php">Meus Dados</a>
						</li>
						<?php   } ?>
						<?php if($_SESSION['autenticado']== 'SIM') { ?>
						<li class="nav-item" >
							<a  class="nav-link" href="login.php">Log Off</a>
						</li>
						<?php   } ?>
        </ul>
      </div>
    </div>
  </nav>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center ">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form action="" method="post" id="login-form" class="form">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Usuario:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha:</label><br>
                                <input type="password" name="senha" id="senha" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Lembrar-me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Entrar">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="cadastro.php" class="text-info">Inscrever-se na SAYAGYM</a>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="py-5 bg-dark  ">
      <div class="container">
          <p class="text-white">SayaGym &copy; Todos os direitos reservados - 2020</p>
          <p class="text-white">Contato: (11) 945784123  &nbsp-&nbsp contato@sayagym.com.br</p>
      </div>
</footer>
</body>
  
</div>
  




