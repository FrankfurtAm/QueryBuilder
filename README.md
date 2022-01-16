# 📜 QueryBuilder

QueryBuilder - a simple tool written in php to simplify the work with the database. It helps to create, read, update, delete data in the database and so on.

# Usage
The tool requires a pdo object

```php
require 'QueryBuilder.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=university', $login, $password);

$queryBuilder = new QueryBuilder($pdo);
```
<br>

### Insert
The insert method adds data to the table. The first parameter is the table you want to add data to. The second parameter is the array of data you want to add to the table.

```php
require 'QueryBuilder.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=university', $login, $password);
$queryBuilder = new QueryBuilder($pdo);

$queryBuilder->insert('students', [
    'id' => 0,
    'name' => 'John',
    'age' => 18,
]);
```  
<br>

### GetAll
The getAll method displays all the data in the table

```php
require 'QueryBuilder.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=university', $login, $password);
$queryBuilder = new QueryBuilder($pdo);

$students = $queryBuilder->getAll('students');
```
<br>

### FindOne
The findAll method allows you to get only one specific record in the table, thanks to the conditions you need

```php
require 'QueryBuilder.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=university', $login, $password);
$queryBuilder = new QueryBuilder($pdo);

$student = $queryBuilder->findOne('students', [
    'id' => 1,
    'name' => 'Mike'
]); // WHERE id = 1 AND name = 'Mike'
```
<br>

### GetLastId
The getLastId method returns the last ID in the table

```php
require 'QueryBuilder.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=university', $login, $password);
$queryBuilder = new QueryBuilder($pdo);

$lastId = $queryBuilder->getLastId('students');
```
<br>

### Update
The update method helps to update the data in the table. To use it, you need: the name of the table, the data you want to update, the conditions under which the data will be updated

```php
require 'QueryBuilder.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=university', $login, $password);
$queryBuilder = new QueryBuilder($pdo);

$queryBuilder->update('students', ['age' => '19'], [
    'id' => 0,
    'name' => 'John',
]);
```
<br>

### Delete
The delete method allows you to delete records in the table according to the conditions that you need

```php
require 'QueryBuilder.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=university', $login, $password);
$queryBuilder = new QueryBuilder($pdo);

$queryBuilder->delete('students', [
    'id' => 0,
    'name' => 'John',
]);
```
<br>


# Documentation

### Method Insert

The method adds data to the table

```php
$queryBuilder->insert(string $table, array $data): bool
```

***Table***

The table you want to add data to

***Data***

An array with the data you want to add to the database

```php
[
    $column => $data,
    $column1 => $data1,
]
```

Example:

```
[
    'id' => 0,
    'name' => 'Rahim',
]
```
------
<br>

### Method GetAll

The method gets all records from the table as an array

```php
$queryBuilder->getAll(string $table): array
```

***Table***

Table for searching records

------
<br>


### Method findOne

The method gets only one record in the table under certain conditions

```php
$queryBuilder->findOne(string $table, array $conditions): array
```

***Table***

Table for searching records

***Conditions***

Array with search conditions

```php
[
    $column => $data,
    $column1 => $data1,
]
```

Example:

```
[
    'id' => 1,
    'name' => 'Mike',
] // WHERE `id` = 1 AND 'name' = 'Mike'
```
------
<br>

### Method GetLastId

Method returns last id

```php
$queryBuilder->getLastId(string $table): int
```

***Table***

Table for searching id

------
<br>

### Method Update

The method updates the already existing data in the table

```php
$queryBuilder->update(string $table, array $data, array $conditions): bool
```

***Table***

Table for searching records

***Data***

Array to add data

```php
[
    $column => $data,
    $column1 => $data1,
]
```

Example:

```
[
    'age' => 18,
]
```
<br>

***Conditions***

Array with search conditions

```php
[
    $column => $data,
    $column1 => $data1,
]
```

Example:

```
[
    'id' => 3,
    'name' => 'Rose',
] // WHERE `id` = 3 AND 'name' = 'Rose'
```
------
<br>

### Method Delete

Method for deleting entries

```php
$queryBuilder->delete(string $table, array $conditions): bool
```

***Table***

Table to delete entries

***Conditions***

Conditions for deleting records

```php
[
    $column => $data,
    $column1 => $data1,
]
```

Example:

```
[
    'id' => 2,
    'name' => 'Maxim',
] // WHERE `id` = 2 AND 'name' = 'Maxim'
```
------
<br>
