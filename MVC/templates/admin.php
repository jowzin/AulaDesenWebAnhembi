<?php
session_start();

//  if(!isset($_SESSION['autenticado_admin']) || ($_SESSION['autenticado_admin']) != 'SIM'){
//   header('Location: login.php?Login>CadastrePrimeiro'); 
// }
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">

  <title>SayaGym</title>

  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/estilo.css">
  <script language="javascript" type="text/javascript">
    // alert("Formulário enviado!");
    // window.location.href = "login.php"
    // }
  </script>
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
          <li class="nav-item">
            <a class="nav-link" href="sobre.php">Sobre</a>
          </li>
          <li class="nav-item">
            <?php if ($_SESSION['autenticado'] == 'NAO' || $_SESSION['autenticado'] == NULL) { ?>
              <a class="nav-link" href="login.php">Login/Cadastro</a>
          </li>
        <?php   } ?>
        <?php if ($_SESSION['autenticado'] == 'SIM' && $_SESSION['autenticado_admin'] != 'SIM') { ?>
          <a class="nav-link" href="user.php">Meus Dados</a>
          </li>
        <?php   } ?>
        <?php if ($_SESSION['autenticado_admin'] == 'SIM') { ?>
          <a class="nav-link" href="admin.php">Gerenciar Dados</a>
          </li>
        <?php   } ?>
        <?php if ($_SESSION['autenticado'] == 'SIM') { ?>
          <li class="nav-item">
            <a class="nav-link" href="../logoff.php">Log Off</a>
          </li>
        <?php   } ?>
        </ul>
      </div>
    </div>
  </nav>
  <br><br><br><br>

  <div class="container row my-4">
    <div class="boxFiltro cardItemColumn">
      <br><br>
      <h1>Nome Usuários</h1>

      <?php

      $dados = array();

      ?>

      <form method="POST" id="form-pesquisa" action="">
        Pesquisar: <input type="text" name="pesquisa" id="pesquisa" placeholder="e-mail">
        <input type="submit" name="btn_inserir" value="Inserir">
        <input type="submit" name="btn_Editar" value="Editar" />
        <input type="submit" name="btn_Excluir" value="Excluir" />
        <input type="submit" name="btn_consultar_u" value="Consultar um">
        <input type="submit" name="btn_consultar_t" value="Consultar todos">
      </form>

      <?php
      $_POST["pesquisa"];
      if (isset($_POST['btn_inserir'])) {
        inserir();
      }
      function inserir()
      {

        session_start();
        $_SESSION['AdminUser'] = 'SIM';
        header('Location: cadastro.php?' . $_SESSION['AdminUser']);
      }

      if (isset($_POST['btn_Editar'])) {
        editar();
      }
      function editar()
      {
        // $vetor;
        // foreach($_SESSION['usuarios'] as $user ){
        //   if($user['email'] == $_POST["pesquisa"]){
        //     $vetor = $user;
        //   }
        // }
        //   if(isset($vetor)){

        //     $_SESSION['email_atual'] = $vetor['email'];
        //     $_SESSION['senha_atual'] = $vetor['senha'];

        //      print_r($vetor);
        //      $_SESSION['AdminUser'] = 'SIM';
        //      $_SESSION['autenticado'] = 'SIM' ; 
        //     header('Location: user.php?admin_');

        //   } else{
        //     echo('Não foi encontrado um usuario email:');
        //   }
        $con = mysqli_connect("localhost", "root", "");
        $banco = mysqli_select_db($con, "dsw");
        $sql = "SELECT * FROM usuarios WHERE email='" . $_POST["pesquisa"] . "';";
        $res = mysqli_query($con, $sql);
        if ($res) {
          $reg = mysqli_fetch_array($res);
          if (isset($reg)) {
            $_SESSION['email_atual'] = $reg['email'];
            $_SESSION['senha_atual'] = $reg['senha'];
            // print_r($reg);
            $_SESSION['AdminUser'] = 'SIM';
            $_SESSION['autenticado'] = 'SIM';
            $_SESSION['dadosUser'] = $reg;
            header('Location: usuarios/ver.php');
          } else {
            echo ('Não foi encontrado nenhum usuario com o email: ' . $_POST["pesquisa"]);
          }
        }
        mysqli_close($con);
      }

      if (isset($_POST['btn_Excluir'])) {
        // $c->excluirBanco();
        excluir();
      }
      function excluir()
      {
        // $cont = 0;
        // $contadorExcluir;    
        // foreach($_SESSION['usuarios'] as $user ){
        //   if($user['email'] == $_POST["pesquisa"]){
        //    $contadorExcluir = $cont;
        //   }
        //   $cont ++;
        // }
        // if(isset($contadorExcluir)){
        //   unset($_SESSION['usuarios'][$contadorExcluir]);
        //   sort( $_SESSION['usuarios'] );
        //   echo('<br>Usuário de email:'.$_POST["pesquisa"].' foi apagado<br><br>');
        // }else{
        //   echo('Não existe este usuário');
        // }
        $con = mysqli_connect("localhost", "root", "");
        $banco = mysqli_select_db($con, "dsw");
        $sql = "DELETE FROM usuarios WHERE email='" . $_POST["pesquisa"] . "';";
        $res = mysqli_query($con, $sql);
        if ($res) {
          $numreg = mysqli_affected_rows($con);
          if ($numreg != 0) {
            echo ('<br>Usuário de email:' . $_POST["pesquisa"] . ' foi apagado<br><br>');
          } else {
            echo ('<br>Não foi existe um usuario com o email: ' . $_POST["pesquisa"]);
          }
        }
        mysqli_close($con);
      }

      if (isset($_POST['btn_consultar_u'])) {

        // foreach($_SESSION['usuarios'] as $user ){
        //   if($user['email'] == $_POST["pesquisa"]){
        //     $vetor = $user;
        //   }
        // }

        $con = mysqli_connect("localhost", "root", "");
        $banco = mysqli_select_db($con, "dsw");
        $sql = "SELECT * FROM usuarios WHERE email='" . $_POST["pesquisa"] . "';";
        $res = mysqli_query($con, $sql);
        if ($res) {
          $vetor = mysqli_fetch_assoc($res);
          // print_r($vetor); 
          // while($vetor = mysqli_fetch_array($res)){
          //   echo "<tr> ";
          //   echo "<td> <input type='submit' name='i1' id='i1' value=".$vetor["nome"]." /></td>";
          //   echo "<td>".$vetor["id"]."</td><br><br>";
          //   echo "</tr>";
          // }
          // print_r($vetor);
          if (isset($vetor)) {
            $colunas = array('Id', 'Nome', 'Email', 'Senha', 'Data de Nascimento', 'Telefone Cel.', 'Telefone Res.', 'Sexo', 'Estado Civil', 'Endereço');
      ?>
            <table width="100%">
              <thead>
                <tr>
                  <?php foreach ($colunas as $coluna) : ?>
                    <th><?= '<br>' . $coluna ?></th>
                  <?php endforeach; ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($vetor  as $key => $value) : // para cada campo de cada linha 
                ?>
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
          } else {
            echo ('<br><br>');
            echo ('NAO ACHOU');
          }
        }
        mysqli_close($con);
      }
?>

<?php
if (isset($_POST['btn_consultar_t'])) {

  // session_start();
  // $dados = $_SESSION['usuarios'];
  // consultar($dados);

  $con = mysqli_connect("localhost", "root", "");
  $banco = mysqli_select_db($con, "dsw");
  $sql = "SELECT * FROM usuarios;";
  $res = mysqli_query($con, $sql);
  $vetor = array();
  if ($res) {
    while ($reg = mysqli_fetch_assoc($res)) {
      $id = $reg['id'];
      $nome = $reg['nome'];
      $email = $reg['email'];
      // echo('ID=>'.$reg['id'].'<br>');
      // $reg = mysqli_fetch_assoc($res);
      // if(isset($reg)){
      // echo('encontrou'.count($reg).'<br>');
      //  print_r($reg); 
      // echo('<br>');
      array_push($vetor, array(
        'id' => $reg['id'], 'nome' => $reg['nome'], 'email' => $reg['email'], 'senha' => $reg['senha'],
        'dataNasc' => $reg['dataNasc'], 'tel' => $reg['tel'], 'telRes' => $reg['telRes'],
        'sexo' => $reg['sexo'], 'estadoCivil' => $reg['estadoCivil'], 'endereco' => $reg['endereco']
      ));
      //  array_push($vetor, array($reg));
      // consultar($vetor);  
    }
    // echo( '<br><br>');
    //  print_r($vetor); 
    //   else{
    //     echo('Não tem usuarios cadastrados');
    //  } 
    consultar($vetor);
  } else {
    echo ('Não tem usuarios cadastrados');
  }
  mysqli_close($con);
}

function consultar($vetor)
{
  $colunas = array('Id', 'Nome', 'Email', 'Senha', 'Data de Nascimento', 'Telefone Cel.', 'Telefone Res.', 'Sexo', 'Estado Civil', 'Endereço');
?>
  <table width="100%">
    <thead>
      <tr>
        <?php foreach ($colunas as $coluna) : ?>
          <th><?= '<br>' . $coluna ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($vetor as $linha) : // para cada linha 
      ?>
        <tr>
          <?php foreach ($linha as $key => $value) : // para cada campo de cada linha 
          ?>
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