# 📜 QueryBuilder

QueryBuilder - a simple tool written in php to simplify the work with the database. It helps to create, read, update, delete data in the database and so on.

# Usage
The tool requires a pdo object
```php
require 'QueryBuilder.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=test', $user, $pass);

$queryBuilder = new QueryBuilder($pdo);
```

### Insert

```php
require 'QueryBuilder.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=test', $user, $pass);

$queryBuilder = new QueryBuilder($pdo);

$queryBuilder->insert('students', [
    'id' => 0,
    'name' => 'John',
    'age' => 18,
]);
```

### GetAll

```php
require 'QueryBuilder.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=test', $user, $pass);

$queryBuilder = new QueryBuilder($pdo);

$students = $queryBuilder->getAll('students');
```

### FindOne

```php
require 'QueryBuilder.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=test', $user, $pass);

$queryBuilder = new QueryBuilder($pdo);

$student = $queryBuilder->findOne('students', [
    'id' => 0,
    'name' => 'Mike'
]);// WHERE id = 0 AND name = 'Mike'
```

### GetLastId

```php
echo 'hello world';
```
