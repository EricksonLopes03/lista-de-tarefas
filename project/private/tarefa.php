<?php
    class Tarefa {

        private $id = null;
        private $id_status = null;
        private $tarefa = null;
        private $dataCadastro = null;
        private $dataPrevistaConclusao = null;


        public function __construct(){
            // $this->id = $id;
            // $this->id_status = $id_status;
            // $this->tarefa = $tarefa;
            // $this->dataCadastro = $dataCadastro;
            // $this->dataPrevistaConclusao = $dataPrevistaConclusao;

        }


        public function __get($name)
        {
            return $this->$name;
        }

        public function __set($name, $value)
        {
            $this->$name = $value;
        }
    }

?>