<?php

    require_once '../models/TaskModel.php';
    
    class TaskController{
        private $task;

        public function __construct(){
            $this->task = new Task();
        }

        // Método para listar todas as tarefas
        public function index(){
            return $this->task->getAllTasks();
        }

        // Método para adicionar uma nova tarefa
        public function store($sDescription){
            if ($this->task->createTask($sDescription)){
                return 'Tarefa criada com sucesso!';
            } else {
                return 'Erro ao criar tarefa.';
            }
        }

        //Método para atualizar uma tarefa
        public function update($iID,$sIsCompleted){
            if ($this->task->updateTask( $iID, $sIsCompleted)){
                return 'Tarefa criada com sucesso!';
            } else {
                return 'Erro ao criar tarefa.';
            }
        }

        public function delete($iID){
            if ($this->task->deleteTask($iID)){
                return 'Tarefa excluida com sucesso!';
            } else{
                return 'Erro ao excluir tarefa.';
            }
        }

    }