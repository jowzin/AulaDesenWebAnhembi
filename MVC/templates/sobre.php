<?php
     session_start();

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

		<link href="../../css/scrolling-nav.css" rel="stylesheet">

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
						<?php if($_SESSION['autenticado'] == 'SIM' && $_SESSION['autenticado_admin'] != 'SIM') { ?>
							<a  class="nav-link" href="../templates/usuarios/ver.php">Meus Dados</a>
						</li>
						<?php   } ?>
						<?php if($_SESSION['autenticado_admin'] == 'SIM') { ?>
							<a  class="nav-link" href="admin.php">Gerenciar Dados</a>
						</li>
						<?php   } ?>
						<?php if($_SESSION['autenticado']== 'SIM') { ?>
						<li class="nav-item" >
							<a  class="nav-link" href="../logoff.php">Log Off</a>
						</li>
						<?php   } ?>
					</ul>
				</div>
			</div>
  </nav>
		<header class="bg-secondary text-white">
			<div class="container text-center">
			  <h1>Tudo o que você precisa saber sobre a SayaGym</h1>
			  <p class="lead">A maior rede de academias e informações do mercado</p>
			</div>
		</header>

		<section id="about">
			<div class="container">
					<div class="col-lg-6">
						<img align = "left" class="img-fluid rounded" src="../../imagens/img_28.jpg" alt="">
					</div>
				<div class="row">
					<div class="col-lg-10 mx-auto">
					<h2>Sobre a SAYAGYM</h2>
					<p class="lead">Somos uma nova rede de academias, somos novos, mas o objetivo é ser a melhor. Nosso equipamentos são de primeira linha, todos importado dos Estados Unidos. E estamos ansiosos para receber todos de braços abertos. Mas sempre respeitando as normas por causa do Covid-19.</p>
					</div>
				</div>
			</div>
		</section>
		
		<section class="bg-light">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mx-auto">
					<h2>Nossa Missão</h2><br>
						<p class="lead">O nosso propósito é mudar vidas, fazer com que as pessoas olhem a vida de um jeito diferente, fazer com que elas trilhem seu caminho de campeão!</p>
					</div>
						<div class="col-lg-6">
							<img class="img-fluid rounded" src="../../imagens/img_17.png" alt="">
						</div>
				</div>
			</div>
		</section>
	  
		<section>
			<div class="container">
				<div class="row">
						<div class="col-lg-6">
							<img align = "left" class="img-fluid rounded" src="../../imagens/img_25.jpeg" alt="">
						</div>
					<div class="col-lg-6 mx-auto">
						<h2>Visão</h2>
						<p class="lead">Visamos criar uma academia temática, um lugar descontraído e divertido, para incetivar as pessoas a terem uma vida saudavel.</p>
					</div>
				</div>
			</div>
		</section>
	  
		<section class="bg-light">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mx-auto">
						<h2>Valores</h2>
						<p class="lead">O foco dos profissionais e professores da academia são: </p>
						<ul class="lead">
							<li><b>Confiança e Respeito</b></li>
							<li><b>Humildade e Integridade</b></li>
							<li><b>Ética e transparência</b></li>
							<li><b>Resultado, porque aqui nós construimos fibra</b></li>
						</ul>
					</div>
					<div class="col-lg-6">
						<img class="img-fluid rounded" src="../../imagens/img_27.jpg" alt="">
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="container">
					<div class="col-lg-6">
						<img align = "left" class="img-fluid rounded" src="../../imagens/img_29.jpg" alt="">
					</div>
				<div class="row">
					<div class="col-lg-10 mx-auto">
						<h2>Serviços</h2>
						<p class="lead">Temos várias atividades nas quais podem exercer dentro da nossa academia:</p>
						<ul class="lead">
							<li><b>Musculação</b></li>
							<li><b>Yoga</b></li>
							<li><b>Boxe</b></li>
							<li><b>Muay Thai</b></li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<section class="bg-light">
			<div class="container" >
				<div class="row">
					<div class="col-lg-8 mx-auto">
					  <h2 style = "margin-left:-200px">Profissionais</h2><br>
					</div>
					<table width = "100%" align = "center" cellpadding = "5">
						<tr>
							<td>
								<a href="https://extracorporeal-lees.000webhostapp.com/"><img class="card-img-top" src="../../imagens/img_11.png" alt=""></a>
							</td>
							<td>
								<a href="https://giovanijavarini.000webhostapp.com/"><img class="card-img-top" src="../../imagens/img_12.png" alt=""></a>
							</td>
							<td>
								<a href="https://joaomarcusmartinsreis.000webhostapp.com/"><img class="card-img-top" src="../../imagens/img_13.png" alt=""></a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="http://curriculojonathannascimento.000webhostapp.com/"><img class="card-img-top" src="../../imagens/img_16.png" alt=""></a>
							</td>
							<td>
								<a href="https://uniform-hammers.000webhostapp.com/"><img class="card-img-top" src="../../imagens/img_15.png" alt=""></a>
							</td>
							<td>
								<a href="https://curriculoleandrolima.000webhostapp.com/"><img class="card-img-top" src="../../imagens/img_14.png" alt=""></a>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</section>
		
		<section id="services">
			<div class="container">
			  <div class="row">
				<div class="col-lg-6 mx-auto" style = "margin-top:40px">
				  <h2>São Paulo - Brooklin<br>Paulista</h2>
					<div class="lead">
						Rua Indiana 458<br>
						Brooklin<br>
						São Paulo - SP
					</div>
				</div>
					<div class="col-lg-6">
						<iframe style = "margin-left:-250px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.787604952227!2d-46.68473878447481!3d-23.611949069348665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce50b07cfa3919%3A0x651040e6587f68e5!2sR.%20Indiana%2C%20458%20-%20Brooklin%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2004562-000!5e0!3m2!1spt-BR!2sbr!4v1601499415007!5m2!1spt-BR!2sbr" width="700" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
			  </div>
			</div>
		</section>
		
		
		<footer class="py-5 bg-dark">
			<div class="container">
				<p class="text-white">SayaGym &copy; Todos os direitos reservados - 2020</p>
				<p class="text-white">Contato: (11) 945784123  &nbsp-&nbsp contato@sayagym.com.br</p>
			</div>
		</footer>

	  <script src="../../vendor/jquery/jquery.min.js"></script>
	  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

	  <script src="../../js/scrolling-nav.js"></script>

	</body>
</html>
