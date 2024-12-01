<?php

    class Database{
        private $sHost = '127.0.0.1';
        private $sPort = '5432';
        private $sUser  = 'postgres';
        private $sPassword = 'postgres';
        private $sDatabase = 'to_do_list';
        private $connection;

        public function connect(){

            $sConexao = "host = $this->sHost
                         port = $this->sPort
                         dbname = $this->sDatabase
                         user = $this->sUser
                         password = $this->sPassword";

            $this->connection = pg_connect($sConexao);

            return $this->connection;
        }

        public function getConnection(){
            if ($this->connection === null){
                $this->connect();
            }
            return $this->connection;
        }


        public function runQuery($sQuery){
            $oResultad = pg_query($this->getConnection(), $sQuery);
            $aData = [];
            
            while ($aResult = pg_fetch_assoc($oResultad)) {
                $aData[] = $aResult;
            }

            return $aData;
        }

        public function runCommand($sCommand){
            pg_escape_string($sCommand);
            return pg_query($this->getConnection(), $sCommand);
        }
        
    }