<?php
	require_once '../app/database.php';
/**
* 
*/
class Model{
	protected $table;

	/**
     * Executes SQL statement, possibly with parameters, returning
     * an array of all rows in result set or false on (non-fatal) error.
     */
    function query(/* $sql [, ... ] */)
    {
        // SQL statement
        $sql = func_get_arg(0);

        // parameters, if any
        $parameters = array_slice(func_get_args(), 1);

        // try to connect to database
        static $handle;
        if (!isset($handle))
        {
            try
            {
                // connect to database
                $handle = new PDO("mysql:dbname=" . DATABASE . ";host=" . SERVER, USERNAME, PASSWORD);

                // ensure that PDO::prepare returns false when passed invalid SQL
                $handle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
            }
            catch (Exception $e)
            {
                // trigger (big, orange) error
                trigger_error($e->getMessage(), E_USER_ERROR);
                exit;
            }
        }

        // prepare SQL statement
        $statement = $handle->prepare($sql);
        if ($statement === false)
        {
            // trigger (big, orange) error
            trigger_error($handle->errorInfo()[2], E_USER_ERROR);
            exit;
        }

        // execute SQL statement
        $results = $statement->execute($parameters);

        // return result set's rows, if any
        if ($results !== false)
        {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return false;
        }
    }

    public function all(){
        return $this->query("SELECT * FROM $this->table");
    }

    public function get($id){
        return $this->query("SELECT * FROM $this->table where id = ?",$id);
    }

    public function last_insert_id(){
        $rows = $this->query("SELECT LAST_INSERT_ID() AS id");
        return $rows[0]["id"];
    }

    public function delete($id){
        return $this->query("DELETE FROM $this->table where id = ?",$id);
    }

    public function count(){
        $fuck =  $this->query("select count(*) as count from $this->table");
        return $fuck[0]['count'];
    }

}