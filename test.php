<?php
require_once 'dbconnect.php';

if (class_exists('DBConnect')) {
    echo "La classe DBConnect est chargée avec succès.\n";
    $dbConnect = DBConnect::getInstance();
    $pdo = $dbConnect->getPDO();
    var_dump($pdo);
} else {
    echo "La classe DBConnect n'est pas trouvée.\n";
}
?>