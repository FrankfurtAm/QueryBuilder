<?php
class QueryBuilder
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll(string $table)
    {
        $sql = "SELECT * FROM {$table}";
    
        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function findOne(string $table, array $data)
    {
        $fields = array_keys($data);

        $fieldsForSQL = '';
        foreach($fields as $field) $fieldsForSQL .= $field. '= :' . $field . ',';
        $fieldsForSQL = rtrim($fieldsForSQL, ',');

        $sql = "SELECT * FROM {$table} WHERE {$fieldsForSQL} LIMIT 1";

        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insert(string $table, array $data)
    {
        $fields = implode(', ', array_keys($data));
        $values = mb_substr(str_repeat('?,', count($data)), 0, -1);

        $sql = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";

        $statement = $this->pdo->prepare($sql);
        return $statement->execute(array_values($data));
    }
    
    public function getLastId(string $table)
    {
        $sql = "SELECT MAX(id) FROM {$table}";

        $statement = $this->pdo->prepare($sql);
        return $statement->fetch(PDO::FETCH_NUM)[0];
    }

    public function update(string $table, array $data, array $condition)
    {
        $fields = implode('=?, ', array_keys($data)).'=? ';
        $condition_fields = implode('=? ', array_keys($condition)).'=?';

        $sql = "UPDATE {$table} SET {$fields} WHERE {$condition_fields}"; 

        $statement = $this->pdo->prepare($sql);
        return $statement->execute(array_merge(array_values($data), array_values($condition))); 
    }

    public function delete(string $table, array $conditions)
    {
        $fields = implode('=? ', array_keys($conditions)).'=? ';

        $sql = "DELETE FROM {$table} WHERE {$fields}";

        $statement = $this->pdo->prepare($sql);
        return $statement->execute(array_values($conditions)); 
    }
}