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
