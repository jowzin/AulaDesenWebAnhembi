<?php
session_start();

//  if(!isset($_SESSION['autenticado']) || ($_SESSION['autenticado']) != 'SIM'){
//     header('Location: login.php?Login>CadastrePrimeiro'); 
// }

echo ('<br><br> ');
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">

    <title>SayaGym</title>

    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/estilo.css">
    <script language="javascript" type="text/javascript">
        function validar() {

            if (nome.value == "") {
                alert('Preencha o campo com seu nome');
                nome.focus();

                return;
            }

            if (email.value == "") {

                alert('Preencha o campo com seu email');
                email.focus();
                return;
            }

            var filter = /^([\w-]+(?:.[\w-]+))@((?:[\w-]+.)\w[\w-]{0,66}).([a-z]{2,6}(?:.[a-z]{2})?)$/i;
            if (!filter.test(email.value)) {
                alert('Por favor, digite o email corretamente');
                return;
            }

            if (senha.value == "") {
                alert('Preencha o campo de senha');
                email.focus();
                return;
            }

            if (senhaN.value == "") {
                alert('A confirmação de senha é necessária');
                emailN.focus();
                return;
            }

            if (senhaN.value != senha.value) {
                alert('Senhas estão diferentes');
                emailN.focus();
                return;
            }

            if (dataNasc.value == "") {
                alert('A data de nascimento é necessária');
                emailN.focus();
                return;
            }

            if (tel.value == "") {
                alert('Preencha o campo de Celular');
                emailN.focus();
                return;
            }

            if (sexo.value == "") {
                alert('Selecione o sexo');
                emailN.focus();
                return;
            }

            if (estadoCivil.value == "") {
                alert('Preencha o estado civil');
                emailN.focus();
                return;
            }

            if (endereco.value == "") {
                alert('Preencha o endereço');
                emailN.focus();
                return;
            }

            alert("Formulário atualizado!");

            // $_SESSION['AtualizaUser'] = 'SIM';
            // $_SESSION['ContUser'] = $id;

            // $valida = 1;
            // <?php
                //  if($valida == 1){
                //     $valida = 0;
                $_SESSION['AtualizaUser'] = 'SIM';
                $_SESSION['ContUser'] = $_SESSION['dadosUser']['id'];
                //     $con = mysqli_connect("localhost", "root", "");
                //     $banco = mysqli_select_db($con, "dsw");
                //     // $sql = "UPDATE usuarios 
                //     // SET nome='".$_SESSION["nome"]."', email='".$_POST['email']."', senha='".$_POST['senha']."',
                //     // dataNasc='".$_POST['dataNasc']."', tel='".$_POST['tel']."', telRes='".$_POST['telRes']."', 
                //     // sexo='".$_POST['sexo']."', estadoCivil= '".$_POST['estadoCivil']."', 
                //     // endereco='".$_POST['endereco']."'
                //     // WHERE id='".$id."';";
                //     $sql = "DELETE FROM usuarios WHERE id='".$id."';";
                //     $res = mysqli_query($con, $sql);

                //     mysqli_close($con);
                //  }                 
                // 
                ?>

            document.getElementById("formCaptacao").submit();
        }
    </script>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../home.php">SayaGym</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../agendamentos.php">Agendamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../sobre.php">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <?php if ($_SESSION['autenticado'] == 'NAO' || $_SESSION['autenticado'] == NULL) { ?>
                            <a class="nav-link" href="../login.php">Login/Cadastro</a>
                    </li>
                <?php   } ?>
                <?php if ($_SESSION['autenticado'] == 'SIM' && $_SESSION['autenticado_admin'] != 'SIM') { ?>
                    <a class="nav-link" href="user.php">Meus Dados</a>
                    </li>
                <?php   } ?>
                <?php if ($_SESSION['autenticado_admin'] == 'SIM') { ?>
                    <a class="nav-link" href="../admin.php">Gerenciar Dados</a>
                    </li>
                <?php   } ?>
                <?php if ($_SESSION['autenticado'] == 'SIM') { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../../logoff.php">Log Off</a>
                    </li>
                <?php   } ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row my-4">
            <div class="col text-center">
                <br><br>
                <h1>Seus dados</h1>
            </div>
        </div>

        <!-- Form -->
        <form action="validaCadastro.php" method="POST" id="formCaptacao">
            <!-- <form action="" method="post" id="formCaptacao"> TODO @jm -->

            <div class="row my-3 justify-content-center">

                <div class="col-9 col-xs-9 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                    <label for="nome" class="col-form-label">Nome Completo:</label>
                    <input type="text" class="form-control" value="<?= $_SESSION['dadosUser']['nome'] ?>" id="nome" name="nome" maxlength="70" tabindex="1">
                </div>
                <div class="col-9 col-xs-9 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 mt-3">
                    <label for="email" class="col-form-label">E-mail:</label>
                    <input type="email" enabled=false class="form-control" value="<?= $_SESSION['dadosUser']['email'] ?>" id="email" name="email" maxlength="70" tabindex="2">
                </div>

                <div class="row my-3 justify-content-center">
                    <div class="col-9 col-xs-9 col-sm-8 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <label for="senha" class="col-form-label">Senha:</label>
                        <input type="password" class="form-control" value="<?= $_SESSION['dadosUser']['senha'] ?>" id="senha" name="senha" maxlength="70" tabindex="4">
                    </div>
                    <div class="col-9 col-xs-9 col-sm-8 col-md-4 col-lg-4 col-xl-4 col-xxl-4 my-3 my-sm-3 my-md-0 my-lg-0 my-xl-0 my-xxl-0">
                        <label for="senhaN" class="col-form-label">Repita a Senha:</label>
                        <input type="password" class="form-control" value="<?= $_SESSION['dadosUser']['senha'] ?>" id="senhaN" name="senhaN" maxlength="70" tabindex="5">
                    </div>
                </div>

                <div class="row my-3 justify-content-center">
                    <div class="col-9 col-xs-9 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                        <label for="dataNasc" class="col-form-label">Data de Nascimento:</label>
                        <input type="date" class="form-control" value="<?= $_SESSION['dadosUser']['dataNasc'] ?>" id="dataNasc" name="dataNasc">
                    </div>
                </div>

                <div class="row my-3 justify-content-center">
                    <div class="col-9 col-xs-9 col-sm-8 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <label for="tel" class="col-form-label">Telefone Celular:</label>
                        <input type="text" class="form-control" value="<?= $_SESSION['dadosUser']['tel'] ?>" id="tel" name="tel" maxlength="15" pattern="\(\d{2}\)\s*\d{5}-\d{4}" placeholder="(XX) 9XXXX-XXXX">
                    </div>
                    <div class="col-9 col-xs-9 col-sm-8 col-md-4 col-lg-4 col-xl-4 col-xxl-4 my-3 my-sm-3 my-md-0 my-lg-0 my-xl-0 my-xxl-0">
                        <label for="telRes" class="col-form-label">Telefone Residencial:</label>
                        <input type="text" class="form-control" value="<?= $_SESSION['dadosUser']['telRes'] ?>" id="telRes" name="telRes" maxlength="14" pattern="\(\d{2}\)\s*\d{4}-\d{4}" placeholder="(XX) XXXX-XXXX">
                    </div>
                </div>

                <div class="row my-3 justify-content-center">
                    <div class="col-9 col-xs-9 col-sm-8 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <label for="sexo" class="col-form-label">Sexo:</label>
                        <select class="form-select" id="sexo" name="sexo">
                            <option value="Masculino" <?= $_SESSION['dadosUser']['sexo'] == 'Masculino' ? selected : ' ' ?>>Masculino</option>
                            <option value="Feminino" <?= $_SESSION['dadosUser']['sexo'] == 'Feminino' ? selected : ' ' ?>>Feminino</option>
                            <option value="NA" <?= $_SESSION['dadosUser']['sexo'] == 'NA' ? selected : ' ' ?>>Prefiro não dizer</option>
                        </select>
                    </div>
                    <div class="col-9 col-xs-9 col-sm-8 col-md-4 col-lg-4 col-xl-4 col-xxl-4 my-3 my-sm-3 my-md-0 my-lg-0 my-xl-0 my-xxl-0">
                        <label for="estadoCivil" class="col-form-label">Estado civil:</label>
                        <select class="form-select" id="estadoCivil" name="estadoCivil">
                            <option value="Solteiro" <?= $_SESSION['dadosUser']['estadoCivil'] == 'Solteiro' ? selected : ' ' ?>> Solteiro (a) </option>
                            <option value="Casado" <?= $_SESSION['dadosUser']['estadoCivil'] == 'Casado' ? selected : ' ' ?>>Casado (a)</option>
                            <option value="Divorciado" <?= $_SESSION['dadosUser']['estadoCivil'] == 'Divorciado' ? selected : ' ' ?>>Divorciado (a)</option>
                            <option value="Viúvo Digital" <?= $_SESSION['dadosUser']['estadoCivil'] == 'Viúvo Digital' ? selected : ' ' ?>>Viúvo (a)</option>
                        </select>
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="col-9 col-xs-9 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                        <label for="endereco" class="col-form-label">Endereço:</label>
                        <input type="text" class="form-control" value="<?= $_SESSION['dadosUser']['endereco'] ?>" id="endereco" name="endereco" maxlength="255">
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="col text-center">
                        <button class="g-recaptcha btn btn-azul rounded-pill" type='submit' id="validar" name="validar" tabindex="7" onclick="validar()">Atualizar<i class="fas fa-share"></i></button>
                    </div>
                </div>
        </form>
    </div>
    <br><br>
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="text-white">SayaGym &copy; Todos os direitos reservados - 2020</p>
            <p class="text-white">Contato: (11) 945784123 &nbsp-&nbsp contato@sayagym.com.br</p>
        </div>
    </footer>
</body>

</html>