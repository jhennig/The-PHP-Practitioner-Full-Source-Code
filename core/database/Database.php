<?php
    /**
     * http://culttt.com/2012/10/01/roll-your-own-pdo-php-class/
     */


    namespace culttt;

    use \PDO;



    class Database
    {
        private $connection;
        private $stmt;
        private $dbh;
        private $error;
		

        function __construct($pdo){

          
				$this->dbh = $pdo;
				
          

        }
        protected function setConnection($connectionName){
            $this->connection = $connectionName;
        }

        public function query($query)
        {
            $this->stmt = $this->dbh->prepare($query);
        }

        public function bind($param, $value, $type = null)
        {
            if (is_null($type)) {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }

        public function execute($array = null)
        {
            return $this->stmt->execute($array);
        }

        public function columnCount(){
            return $this->stmt->columnCount();
        }
        public function getColumnMeta ($column){
            return $this->stmt->getColumnMeta($column);
        }

        public function resultset($array = null)
        {
            $this->execute($array);
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function single()
        {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function rowCount()
        {
            return $this->stmt->rowCount();
        }

        public function lastInsertId()
        {
            return $this->dbh->lastInsertId();
        }

        /**
         * Transactions allow multiple changes to a database all in one batch.
         */
        public function beginTransaction()
        {
            return $this->dbh->beginTransaction();
        }

        public function endTransaction()
        {
            return $this->dbh->commit();
        }

        public function cancelTransaction()
        {
            return $this->dbh->rollBack();
        }

        public function debugDumpParams()
        {
            return $this->stmt->debugDumpParams();
        }

        public function getStatement(){
            return $this->stmt;
        }
    }





