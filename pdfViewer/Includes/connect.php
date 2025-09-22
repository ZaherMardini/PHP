<?php
try {
  $dsn = "mysql:host=localhost;dbname=crud_ops";
  $connection = new PDO($dsn, "root", "", [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
} catch (PDOException $e) {
  echo "Error: {$e->getMessage()}";
}
function closeConnection(PDO &$connection){
  $connection = null;
}
