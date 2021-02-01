<?php

    class TarefaDAO{
        private $conexao;
        private $tarefa;

        public function __construct(Conexao $conexao, Tarefa $tarefa)
        {
            $this->conexao = $conexao->conectar();
            $this->tarefa = $tarefa;
        }

        public function inserir(){
            try{

                $query = 'insert into tb_tarefas(tarefa, data_prevista_conclusao) 
                values (:tarefa , :data_prevista_conclusao )';
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
                $stmt->bindValue(':data_prevista_conclusao', $this->tarefa->__get('dataPrevistaConclusao'));
                $stmt->execute();
            }catch(PDOException $e){
                print($e->getMessage());
            }
            
        }
        public function listar(){
            $query = 'select tarefa, data_cadastrado, data_prevista_conclusao, tb_status.status from tb_tarefas
            join tb_status where tb_tarefas.id_status =  tb_status.id;';
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            $tarefas = $stmt->fetchAll(PDO::FETCH_OBJ);
            // echo '<pre>';
            // print_r($tarefas);
            // echo '</pre>';
            return $tarefas;

        }
        public function alterar(){

        }
        public function apagar(){

        }
        
        
    }

?>