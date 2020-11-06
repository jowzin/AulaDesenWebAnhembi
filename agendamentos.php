<?php
     session_start();

	 if(!isset($_SESSION['autenticado']) || ($_SESSION['autenticado']) != 'SIM'){
	 	header('Location: login.php?Login>CadastrePrimeiro'); 
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

  

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="css/estilo.css">
  <link href="css/scrolling-nav.css" rel="stylesheet">
    
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
    <header class="bg-secondary text-white">
			<div class="container text-center">
			  <h1>Faça seu agendamento</h1>
			</div>
		</header>
    <div class="filtro ">
      <p>Filtro <input type="date" name="dataFiltro" id="dataFiltro"></p>
    </div>
    <div class="boxFiltro container text-center"> 
      <div class="cardItemColumn">
        <div>
        07:00 
        <button class="modalidades">Musculação</button> 
        <button class="modalidades">Yoga</button>
        <button class="modalidades">Boxe</button>
        <button class="modalidades">Muay Thai</button>
        </div>
      </div>
      <div class="cardItemColumn">
        08:00 <button class="modalidades">Musculação</button> 
              <button class="modalidades">Yoga</button>
              <button class="modalidades">Boxe</button>
              <button class="modalidades">Muay Thai</button>
      </div>
      <div class="cardItemColumn">
        09:00 <button class="modalidades">Musculação</button> 
              <button class="modalidades">Yoga</button>
              <button class="modalidades">Boxe</button>
              <button class="modalidades">Muay Thai</button>
      </div>
      <div class="cardItemColumn">
        10:00 <button class="modalidades">Musculação</button> 
              <button class="modalidades">Yoga</button>
              <button class="modalidades">Boxe</button>
              <button class="modalidades">Muay Thai</button>
      </div>
      <div class="cardItemColumn">
        11:00 <button class="modalidades">Musculação</button> 
              <button class="modalidades">Yoga</button>
              <button class="modalidades">Boxe</button>
              <button class="modalidades">Muay Thai</button>
      </div>
      <div class="cardItemColumn">
        17:00 <button class="modalidades">Musculação</button> 
              <button class="modalidades">Yoga</button>
              <button class="modalidades">Boxe</button>
              <button class="modalidades">Muay Thai</button>
      </div>
      <div class="cardItemColumn">
        18:00 <button class="modalidades">Musculação</button> 
              <button class="modalidades">Yoga</button>
              <button class="modalidades">Boxe</button>
              <button class="modalidades">Muay Thai</button>
      </div>
      <div class="cardItemColumn">
        19:00 <button class="modalidades">Musculação</button> 
              <button class="modalidades">Yoga</button>
              <button class="modalidades">Boxe</button>
              <button class="modalidades">Muay Thai</button>
      </div>
      <div class="cardItemColumn">
        20:00 <button class="modalidades">Musculação</button> 
              <button class="modalidades">Yoga</button>
              <button class="modalidades">Boxe</button>
              <button class="modalidades">Muay Thai</button>
      </div> 
    </div>
    <footer class="py-5 bg-dark">
			<div class="container">
				<p class="text-white">SayaGym &copy; Todos os direitos reservados - 2020</p>
				<p class="text-white">Contato: (11) 945784123  &nbsp-&nbsp contato@sayagym.com.br</p>
			</div>
		</footer>
  </body>
  <script>
    document.querySelectorAll(".modalidades").forEach(m => m.addEventListener("click", (e) => {
      e.preventDefault()
      e.stopPropagation()
      alert("Horário Reservado")
    }))
  </script>
</html>