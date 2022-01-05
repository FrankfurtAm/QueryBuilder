<?php
class QueryBuilder
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
        Parameters: 
            string - $table (Table in Database)
            array - $data(Data to be added to the table) 'table' => 'data'

        Description: Adding data to a table

        Return value: bool
    **/

    public function insert(string $table, array $data)
    {
        $fields = implode(', ', array_keys($data));
        $values = mb_substr(str_repeat('?,', count($data)), 0, -1);

        $sql = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";

        $statement = $this->pdo->prepare($sql);
        return (bool)$statement->execute(array_values($data));
    }

    /**
        Parameters: 
            string - $table (Table in Database)

        Description: Gets all records in a table

        Return value: array(Records)
    **/

    public function getAll(string $table)
    {
        $sql = "SELECT * FROM {$table}";
    
        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
        Parameters: 
            string - $table (Table in Database)
            array - $condition(Сonditions under which data is find) 'table' => 'condition'

        Description: Find only one record in table

        Return value: array(Record)
    **/

    public function findOne(string $table, array $condition)
    {
        $fields = array_keys($condition);

        $fieldsForSQL = '';
        foreach($fields as $field) $fieldsForSQL .= $field. '= :' . $field . ',';
        $fieldsForSQL = rtrim($fieldsForSQL, ',');

        $sql = "SELECT * FROM {$table} WHERE {$fieldsForSQL} LIMIT 1";

        $statement = $this->pdo->prepare($sql);
        $statement->execute($condition);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

       
    /**
        Parameters: 
            string - $table (Table in Database)

        Description: Gets the last identifier in the table

        Return value: int(Id)
    **/

    public function getLastId(string $table)
    {
        $sql = "SELECT MAX(id) FROM {$table}";

        $statement = $this->pdo->prepare($sql);
        return (int)$statement->fetch(PDO::FETCH_NUM)[0];
    }

    /**
        Parameters: 
            string - $table (Table in Database)
            array - $data(Data to be update to the table) 'table' => 'data'
            array - $conditions(Сonditions under which data is update) 'table' => 'condition'

        Description: Update the data in the table

        Return value: bool
    **/

    public function update(string $table, array $data, array $conditions)
    {
        $fields = implode('=?, ', array_keys($data)).'=? ';
        $conditions_fields = implode('=? ', array_keys($conditions)).'=?';

        $sql = "UPDATE {$table} SET {$fields} WHERE {$conditions_fields}"; 

        $statement = $this->pdo->prepare($sql);
        return (bool)$statement->execute(array_merge(array_values($data), array_values($conditions))); 
    }

    /**
        Parameters: 
            string - $table (Table in Database)
            array - $conditions(Сonditions under which data is deleted)

        Description: Delete data

        Return value: bool
    **/

    public function delete(string $table, array $conditions)
    {
        $fields = implode('=? ', array_keys($conditions)).'=? ';

        $sql = "DELETE FROM {$table} WHERE {$fields}";

        $statement = $this->pdo->prepare($sql);
        return (bool)$statement->execute(array_values($conditions)); 
    }
}