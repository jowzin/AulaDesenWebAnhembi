<?php
     session_start();

	// if(!isset($_SESSION['autenticado']) || ($_SESSION['autenticado']) != 'SIM'){
	// 	header('Location: login.php?Login>erro2'); 
	// print_r($_SESSION['autenticado']);

	// // $var = array_search($_SESSION["email_atual"], array_column($_SESSION['usuarios'], 'email'));
    // if(false !== $var){
    //     // echo('$FUNCIONOUUUU');
    //     $vetor = $_SESSION['usuarios'][$var];
    //     var_dump($vetor);
	// } 
	
	// }
?>

<!DOCTYPE html>
<html lang="br">

	<head>

	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="description" content="">
	  <meta name="author" content="">

	  <title>SayaGym</title>

		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<link href="css/modern-business.css" rel="stylesheet">

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

		<header>
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active" style="background-image: url('imagens/img_02.jpg')">
					  <div class="carousel-caption d-none d-md-block">
						<h3 >Bem vindo a SAYAGYM</h3>
						<p>Liberte o seu SAYAGYM interior</p>
					  </div>
					</div>
					<div class="carousel-item" style="background-image: url('imagens/img_01.jpg')">
					  <div class="carousel-caption d-none d-md-block">
						<h3>BE STRONG</h3>
						<p></p>
					  </div>
					</div>
					<div class="carousel-item" style="background-image: url('imagens/img_24.jpg')">
						<div class="carousel-caption d-none d-md-block">
							<h3>EXALANDO ENERGIA</h3>
							<p></p>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</header>

		<div class="container">
			<h1 class="my-4">Mais lidas</h1>

			<div class="row">
				<div class="col-lg-4 mb-4">
					<div class="card h-100">
						<h5 class="card-header">Atividade física auxilia na prevenção de doenças cardiovasculares</h5>
						<div class="card-body">
							<p class="card-text">A prática de exercícios físicos, além de enrijecer os músculos, melhorar o condicionamento físico e controlar o colesterol, também auxilia na prevenção de doenças cardiovasculares.</p>
						</div>
						<div class="card-footer">
							<a href="#" class="btn btn-primary">Learn More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="card h-100">
						<h5 class="card-header">Benefícios da bicicleta ergométrica e dicas para o seu treino</h5>
						<div class="card-body">
							<p class="card-text">Pedalar sem sair do lugar de forma motivadora e divertida é o objetivo do bike indoor. (Bike indoor? É como são chamada nas academias as aulas coletivas na bicicleta ergométrica, que a cada dia conquista novos adeptos.) É uma das atividades preferidas das mulheres nas academias.</p>
						</div>
						<div class="card-footer">
							<a href="#" class="btn btn-primary">Learn More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="card h-100">
						<h5 class="card-header">6 benefícios do transport: por que adicionar o aparelho de baixo impacto ao treino</h5>
						<div class="card-body">
							<p class="card-text">A bicicleta elíptica ou transport é uma das máquinas nas quais melhor podemos regular a intensidade, o que nos permite praticar exercícios cardiovasculares sem grandes riscos.</p>
						</div>
						<div class="card-footer">
							<a href="#" class="btn btn-primary">Learn More</a>
						</div>
					</div>
				</div>
			</div>
			
			<h2>Outras notícias</h2>

			<div class="row">
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
					<a href="#"><img class="card-img-top" src="imagens/img_04.png" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
								<a href="#">10 alimentos que combatem a depressão</a>
							</h4>
							<p class="card-text">Uma alimentação equilibrada e saudável não é apenas benéfica para a saúde do corpo. Como aquele antigo ditado já diz, “você é o que você come”. Os alimentos que ingerimos também afetam o nosso emocional. Existem diversos alimentos que combatem a depressão que podemos adicionar ao nosso cardápio diário.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
							<a href="#"><img class="card-img-top" src="imagens/img_05.png" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
								<a href="#">Qual a diferença entre emagrecer e perder peso?</a>
							</h4>
							<p class="card-text">O bombardeio diário de imagens e informações sobre padrões físicos causam muito desconforto a quem está acima do peso considerado ideal e não faltam dicas para perder peso de forma acelerada. Mas você sabia que perder peso e emagrecer são coisas diferentes?</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="#"><img class="card-img-top" src="imagens/img_06.jpg" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
								<a href="#">O que é o treino GVT ?</a>
							</h4>
							<p class="card-text">O treino GVT ou german volume training (treinamento de volume alemão) é uma divisão que pode ser usada por qualquer pessoa que tenha como objetivo acelerar a hipertrofia ou simplesmente quebrar estagnação muscular.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="#"><img class="card-img-top" src="imagens/img_07.png" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
							<a href="#">Benefícios da meditação e como começar</a>
							</h4>
							<p class="card-text">A meditação oferece inúmeras vantagens para seu corpo, mente e espírito. O descanso que você ganha na meditação é ainda mais profundo que o sono. E quanto mais profundo é seu descanso, mais dinâmica é sua atividade.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="#"><img class="card-img-top" src="imagens/img_09.png" alt="" height="200/" ></a>
						<div class="card-body">
							<h4 class="card-title">
							<a href="#">Perda de força muscular em idosos: como desacelerar esse processo</a>
							</h4>
							<p class="card-text">Com o passar do tempo, nosso corpo muda. Por fora, podemos perceber que as manchas, linhas de expressões e rugas ficam mais aparentes. Mas, por dentro, também passamos por transformações: uma delas é chamada de sarcopenia.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="#"><img class="card-img-top" src="imagens/img_08.jpg" alt="" height="200" ></a>
						<div class="card-body">
							<h4 class="card-title">
							<a href="#">Top 10 maiores fisiculturistas da história</a>
							</h4>
							<p class="card-text">Nesta seleção estão os 10 maiores fisiculturistas da história, os melhores que já tiveram em atividade. O fisiculturismo avalia como esteticamente agradáveis são determinados os seus físicos.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<h2>Conheça a nossa academia</h2>
					<p>Nossa academia possui várias ativdades com profissionais qualificados </p>
					<ul>
						<li>Academia</li>
						<li>Boxe</li>
						<li>Entre outros</li>
					</ul>
					<p>Essas foram algumas das atividades que realizamos na SAYAGYM caso queira mais informações por gentileza acessar o link "Sobre" que se encontra no topo do site.</p>
				</div>
				<div class="col-lg-6">
					<img class="img-fluid rounded" src="imagens/img_10.png" alt="">
				</div>
			</div>

			<hr>
		</div>

		<footer class="py-5 bg-dark">
			<div class="container">
				<p class="text-white">SayaGym &copy; Todos os direitos reservados - 2020</p>
				<p class="text-white">Contato: (11) 945784123  &nbsp-&nbsp contato@sayagym.com.br</p>
			</div>
		</footer>

		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>
