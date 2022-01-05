# 📜 QueryBuilder

QueryBuilder - a simple tool written in php to simplify the work with the database. It helps to create, read, update, delete data in the database and so on.

# Usage
The tool requires a pdo object
```php
require 'QueryBuilder.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=test', $user, $pass);

$queryBuilder = new QueryBuilder($pdo);
```

### insert

```php
require 'QueryBuilder.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=test', $user, $pass);

$queryBuilder = new QueryBuilder($pdo);
$queryBuilder->insert('table', [
    '' => '',
]);
```

### getAll

```php
echo 'hello world';
```

### findOne

```php
echo 'hello world';
```

### getLastId

```php
echo 'hello world';
```
