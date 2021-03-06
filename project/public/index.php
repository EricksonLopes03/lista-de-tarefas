<?php
	$_GET['acao'] = 'listarTarefasPendentes';
	require 'tarefa_controller.php';

?>


<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista de Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<script src="js/js.js"></script>
		<link rel="stylesheet" href="css/estilo.css">
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					Lista de Tarefas - o novo jeito de gerenciar suas atividades!
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Tarefas pendentes/atrasadas</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Tarefas pendentes</h4>
								<hr />

								<?php foreach ($tarefasPendentes as $tarefa) {
								$dataAtual = new DateTime('NOW');
								//convertendo data para um objeto DateTime para manipular o formato
								$dataFormatada = DateTime::createFromFormat('Y-m-d H:i:s', $tarefa->data_prevista_conclusao);
							?>

								<div class="row mb-3 d-flex align-items-center tarefa ">

									<!-- Teste para aplicar um estilo diferente para as tarefas em atraso -->
									<div class="col-sm-9 <?= $dataAtual >  $dataFormatada? 'tarefa-pendente' : '' ?>" id="tarefa_<?= $tarefa->id ?>"> 

										<?= 'Tarefa: ' . $tarefa->tarefa .
										'<br> Data e hora limite: ' .
										$dataFormatada->format('d/m/Y - H:i') . '<br>Status: ' . $tarefa->status ?> </div>
									
									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa->id ?>, true)"></i>

										<!-- Passando parametros para a funcao JavaScript para carregar o registro automaticamente no input -->
										<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa->id ?>,'<?= $tarefa->tarefa ?>', '<?=$dataFormatada->format('Y-m-d') ?>' , '<?=$dataFormatada->format('H:i') ?>', true)"></i>
										<i class="fas fa-check-square fa-lg text-success" onclick="marcarTarefaRealizada(<?= $tarefa->id ?>, true)"></i>
									</div>
								</div>

							<?php } ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>