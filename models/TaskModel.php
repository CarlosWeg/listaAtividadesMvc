<?php

    require_once ('../config/database.php');

    class Task{
        private $oDataBase;

        public function __construct(){
            $this->oDataBase = new Database;
        }

        public function getAllTasks(){
            $sQuery = "SELECT ID,
                             DESCRIPTION,
	                         IS_COMPLETED
                        FROM TASKS";
            return $this->oDataBase->runQuery($sQuery);
        }

        public function createTask($sDescription){
            $sCommand = "INSERT INTO TASKS
	                           (DESCRIPTION)
                        VALUES ($sDescription)";
            
            return $this->oDataBase->runCommand($sCommand);
            
        }

        public function updateTask($iID,$sIsCompleted){
            $sCommand = "UPDATE TASKS
                            SET IS_COMPLETED = " . ($sIsCompleted ? "true":"false") .
                        " WHERE ID = $iID";

            return $this->oDatabase->runCommand($sCommand);
        }

        public function deleteTask($iID){
            $sCommand = "DELETE FROM TASKS
                          WHERE ID = $iID";

            return $this->oDatabase->runCommand($sCommand);
        }
    }