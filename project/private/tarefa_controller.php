<?php
    require_once '../private/conexao.php';
    require_once '../private/tarefa.php';
    require_once '../private/tarefaDAO.php';

    ob_start();
    $tarefa = new Tarefa();
    $conexao = new Conexao(); 
    $tarefaDao = new TarefaDAO($conexao, $tarefa);
    $tarefaDao->atualizarStatusTarefa();
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

            $tarefa = new Tarefa();
            $tarefa->__set('id',$_POST['id']);
            $tarefa->__set('tarefa',$_POST['tarefa']);
            $stringData = $_POST['data'] . ' ' . $_POST['hora'] . ':00'; //criando uma data compativel com o DateTime do MySQL
            $tarefa->__set('dataPrevistaConclusao', $stringData);      
            $conexao = new Conexao(); 
            $tarefaDao = new TarefaDAO($conexao, $tarefa);
            $tarefaDao->alterar();
            if(isset($_GET['listapendente']) && $_GET['listapendente'] == 'sim'){
                header('location: index.php');
            }else{
                header('location: todas_tarefas.php');
            }
            
            break;

        case 'listar':
            $conexao = new Conexao();
            $tarefa = new Tarefa();
            $tarefaDao = new TarefaDAO($conexao, $tarefa );
            $tarefas = $tarefaDao->listar();
            break;

        case 'excluir':
            $conexao = new Conexao();
            $tarefa = new Tarefa();
            echo $_GET['id'];
            $tarefa->__set('id',$_GET['id']);
            $tarefaDao = new TarefaDAO($conexao, $tarefa);
            $tarefaDao->apagar();
            if(isset($_GET['listapendente']) && $_GET['listapendente'] == 'sim'){
                header('location: index.php');
            }else{
                 header('location: todas_tarefas.php');
            }
            break;

        case 'marcarTarefaRealizada':   
            $conexao = new Conexao();
            $tarefa = new Tarefa();
            echo $_GET['id'];
            $tarefa->__set('id',$_GET['id']);
            $tarefaDao = new TarefaDAO($conexao, $tarefa);
            $tarefaDao->marcarTarefaRealizada();
            if(isset($_GET['listapendente']) && $_GET['listapendente'] == 'sim'){
                header('location: index.php');
            }else{
                header('location: todas_tarefas.php');
            }
            break;

         case 'listarTarefasPendentes':   
            $conexao = new Conexao();
            $tarefa = new Tarefa();
            $tarefa->__set('id', 1);
            $tarefaDao = new TarefaDAO($conexao, $tarefa );
            $tarefasPendentes = $tarefaDao->listarTarefasPendentes();
            //header('location: index.php');
            break;
        
        default:
            
            break;
    }

    ob_end_flush();
?>