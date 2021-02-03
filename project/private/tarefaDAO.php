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
                values (? , ? )';
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(1, $this->tarefa->__get('tarefa'));
                $stmt->bindValue(2, $this->tarefa->__get('dataPrevistaConclusao'));
                $stmt->execute();
            }catch(PDOException $e){
                print($e->getMessage());
            }
            
        }
        
        public function listar(){           
            try{
                $query = 'select tb_tarefas.id, tarefa, data_cadastrado, data_prevista_conclusao, tb_status.status from tb_tarefas
                join tb_status where tb_tarefas.id_status =  tb_status.id;';
                $stmt = $this->conexao->prepare($query);
                $stmt->execute();
                $tarefas = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $tarefas;
    
            }catch(PDOException $e){
                print($e->getMessage());
            }

        }
        public function alterar(){
            try{
                $query = 'update tb_tarefas set tarefa = ?, data_prevista_conclusao = ? where id = ?;';
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(1, $this->tarefa->__get('tarefa'));
                $stmt->bindValue(2, $this->tarefa->__get('dataPrevistaConclusao'));
                $stmt->bindValue(3, $this->tarefa->__get('id'));
                $stmt->execute();
    
            }catch(PDOException $e){
                print($e->getMessage());
            }
            

        }
        public function apagar(){

        }
        
        
    }

?>