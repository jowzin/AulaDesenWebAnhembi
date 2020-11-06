<?php
     session_start();

     if(!isset($_SESSION['autenticado_admin']) || ($_SESSION['autenticado_admin']) != 'SIM'){
      header('Location: login.php?Login>CadastrePrimeiro'); 
    }
   // print_r($_SESSION['autenticado']);
	// if(!isset($_SESSION['autenticado']) || ($_SESSION['autenticado']) != 'SIM'){
	// 	header('Location: login.php?Login>erro2'); 
	// }
	// print_r($_SESSION['autenticado']);
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">

    <title>SayaGym</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script language="javascript" type="text/javascript">
            alert("Formulário enviado!");
			window.location.href = "login.php"
        }

    </script>
</head>
<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
			<div class="container">
			  <a class="navbar-brand" href="index.php">SayaGym</a>
			  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Home</a>
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
						<?php if($_SESSION['autenticado'] == 'SIM' && $_SESSION['autenticado_admin'] != 'SIM') { ?>
							<a  class="nav-link" href="user.php">Meus Dados</a>
						</li>
						<?php   } ?>
						<?php if($_SESSION['autenticado_admin'] == 'SIM') { ?>
							<a  class="nav-link" href="admin.php">Gerenciar Dados</a>
						</li>
						<?php   } ?>
						<?php if($_SESSION['autenticado']== 'SIM') { ?>
						<li class="nav-item" >
							<a  class="nav-link" href="logoff.php">Log Off</a>
						</li>
						<?php   } ?>
					</ul>
				</div>
			</div>
  </nav>
<br><br><br><br>

<div class="container row my-4">
    <div class = "boxFiltro cardItemColumn">
    <br><br>
    <h1>Nome Usuários</h1>
                     
    <?php    
// $dados = array(
//     array('email' => '1234'),
//     array('email' => '1234'),
//     array('email' => '1234'),
//     array('email' => '1234'),
//     array('email' => '1234'),
//     array('email' => '1234'),
// );

$dados = array();

// // foreach($_SESSION['usuarios'] as $user2 ){
// //     // print_r($user2['email']);
// //     array_push($dados , array( 'email' => $user2['email'] )) ;
// // }
// $dados = $_SESSION['usuarios'];
// // var_dump($dados );

// $colunas = array_keys($dados[0]);
?>

<form method="POST" id="form-pesquisa" action="">
    Pesquisar: <input type="text" name="pesquisa" id="pesquisa" placeholder="e-mail">
    <input type="submit" name="btn_inserir" value="Inserir">
    <input type="submit" name="btn_Editar" value="Editar"/>
    <input type="submit" name="btn_Excluir" value="Excluir"/>
    <input type="submit" name="btn_consultar_u" value="Consultar um">
    <input type="submit" name="btn_consultar_t" value="Consultar todos">
</form>

<?php 
$_POST["pesquisa"];
if(isset($_POST['btn_inserir'])){
  inserir();
}
function inserir(){
  
  session_start();
  $_SESSION['AdminUser'] = 'SIM';
  header('Location: cadastro.php?'.$_SESSION['AdminUser']); 
}

if(isset($_POST['btn_Editar'])){
  editar();
}
function editar(){
  $vetor;
  foreach($_SESSION['usuarios'] as $user ){
    if($user['email'] == $_POST["pesquisa"]){
      $vetor = $user;
      // echo('<br><br>');
      // echo('CONTADOR EXCLUIR ----> '. $contadorExcluir .'<br><br>');
    }
  }
    if(isset($vetor)){

      $_SESSION['email_atual'] = $vetor['email'];
      $_SESSION['senha_atual'] = $vetor['senha'];

       print_r($vetor);
       $_SESSION['AdminUser'] = 'SIM';
       $_SESSION['autenticado'] = 'SIM' ; //teste
      header('Location: user.php?admin_');

    } else{
      echo('Não foi encontrado um usuario email:');
    }
}

if(isset($_POST['btn_Excluir'])){
  excluir();
}
function excluir(){
  // echo('<br><br>');
  // echo('POSICAO 0 ');
  // echo('<br>');
  // print_r($_SESSION['usuarios'][0]);
  // echo('<br><br><br>');
  $cont = 0;
  $contadorExcluir;    
foreach($_SESSION['usuarios'] as $user ){
  if($user['email'] == $_POST["pesquisa"]){
    $contadorExcluir = $cont;
    // echo('<br><br>');
    // echo('CONTADOR EXCLUIR ----> '. $contadorExcluir .'<br><br>');
  }
  $cont ++;
}
  if(isset($contadorExcluir)){
    // var_dump($_SESSION['usuarios']);
     unset($_SESSION['usuarios'][$contadorExcluir]);
     sort( $_SESSION['usuarios'] );
    echo('<br>Usuário de email:'.$_POST["pesquisa"].' foi apagado<br><br>');
    // var_dump($_SESSION['usuarios']);
  }else{
    echo('Não existe este usuário');
  }
}

if(isset($_POST['btn_consultar_u'])){

    //  echo($_POST["pesquisa"]);
  foreach($_SESSION['usuarios'] as $user ){
    if($user['email'] == $_POST["pesquisa"]){
      $vetor = $user;
    }
  }
  if(isset($vetor)){
    $colunas = array('Email', 'Senha', 'Data de Nascimento', 'Telefone Cel.', 'Telefone Res.', 'Sexo', 'Estado Civil', 'Endereço', 'Nome');
    ?>
    <table width = "100%">  
      <thead>
        <tr>
          <?php foreach ($colunas as $coluna): ?>
            <th><?= '<br>'.$coluna ?></th>
          <?php endforeach; ?>
        </tr>
      </thead> 
      <tbody>
        <?php foreach ($vetor  as $key => $value): // para cada campo de cada linha ?>
          <td><?= $value ?>
          <!-- <input type="submit" name="btn_Editar" value="Editar"/>
          <input type="submit" name="btn_Excluir" value="Excluir"/> -->
          </td>
        <?php endforeach ?>
      </tbody>
    </table>
        </div>
        </div>
    </div>
        </body>
        </html>    
    <?php 
    }else{
    echo( '<br><br>');
    echo( 'NAO ACHOU');
  }
}
?>

<?php 
if(isset($_POST['btn_consultar_t'])){
  
  session_start();
  $dados = $_SESSION['usuarios'];
  consultar($dados);
}

function consultar($vetor){  
$colunas = array('Email', 'Senha', 'Data de Nascimento', 'Telefone Cel.', 'Telefone Res.', 'Sexo', 'Estado Civil', 'Endereço', 'Nome');
?>
<table width = "100%">  
  <thead>
    <tr>
      <?php foreach ($colunas as $coluna): ?>
        <th><?= '<br>'.$coluna ?></th>
      <?php endforeach; ?>
    </tr>
  </thead> 
  <tbody>
<?php foreach ($vetor as $linha): // para cada linha ?>
  <tr>
    <?php foreach ($linha as $key => $value): // para cada campo de cada linha ?>
      <td><?= $value ?>
      <!-- <input type="submit" name="btn_Editar" value="Editar"/>
      <input type="submit" name="btn_Excluir" value="Excluir"/> -->
      </td>
    <?php endforeach ?>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
    </div>
    </div>
</div>
    </body>
    </html>    
<?php 
}
?>