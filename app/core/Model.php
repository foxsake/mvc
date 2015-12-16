<?php
	require_once '../app/database.php';
/**
* sexy model..
*/
class Model{
	protected $table;

    function query(/* $sql [, ... ] */)
    {
        // SQL statement
        $sql = func_get_arg(0);

        $parameters = array_slice(func_get_args(), 1);

        //connect sa db..
        static $handle;
        if (!isset($handle)){
            try{
                $handle = new PDO("mysql:dbname=" . DATABASE . ";host=" . SERVER, USERNAME, PASSWORD);
                $handle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
            }catch (Exception $e){
                trigger_error($e->getMessage(), E_USER_ERROR);
                exit;
            }
        }

        // prepare sql
        $statement = $handle->prepare($sql);
        if ($statement === false){
            trigger_error($handle->errorInfo()[2], E_USER_ERROR);
            exit;
        }

        // execute sql
        $results = $statement->execute($parameters);
        //return yung rows as associative array..
        if ($results !== false){
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }

    //return lahat ng rows.. gaya ng laravel.haha
    public function all(){
        return $this->query("SELECT * FROM $this->table");
    }
    //return row kung saan id = id.. gaya ng laravel kaso find ata yun dun.
    public function get($id){
        return $this->query("SELECT * FROM $this->table where id = ?",$id);
    }
    //return id ng last ng insert.
    public function last_insert_id(){
        $rows = $this->query("SELECT LAST_INSERT_ID() AS id");
        return $rows[0]["id"];
    }
    //del
    public function delete($id){
        return $this->query("DELETE FROM $this->table where id = ?",$id);
    }
    //count ng rows ng model/table
    public function count(){
        $fuck =  $this->query("select count(*) as count from $this->table");
        return $fuck[0]['count'];
    }

}