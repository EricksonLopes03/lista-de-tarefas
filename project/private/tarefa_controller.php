<?php
    require_once '../private/conexao.php';
    require_once '../private/tarefa.php';
    require_once '../private/tarefaDAO.php';

   
    switch ($_GET['acao']) {
        case 'cadastrar':
            $tarefa = new Tarefa();
            $tarefa->__set('tarefa',$_POST['tarefa']);
            $stringData = $_POST['data'] . ' ' . $_POST['hora'] . ':00'; //criando uma data compativel com o DateTime do MySQL
            $tarefa->__set('dataPrevistaConclusao', $stringData);      
            $conexao = new Conexao(); 
            $tarefaDao = new TarefaDAO($conexao, $tarefa);
            $tarefaDao->inserir();
            header('location: nova_tarefa.php?cadastro=1');
            break;
            
        case 'atualizar':
            
            break;

        case 'listar':
            $conexao = new Conexao();
            $tarefa = new Tarefa();
            $tarefaDao = new TarefaDAO($conexao, $tarefa );
            $tarefas = $tarefaDao->listar();
            break;

        case 'excluir':
            
            break;
        
        default:
            
            break;
    }


?>