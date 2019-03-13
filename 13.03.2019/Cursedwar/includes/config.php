<?php
    define ('DSN', 'mysql:host=localhost;dbname=Doodlewar');
    define ('USER', 'root');
    define ('PASS', '');

    try {
      $db = new PDO(DSN, USER, PASS);
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION) ;
    }
    catch(PDOException $e) {
      echo 'Erreur de connexion' .  $e->getMessage();
      die();
    }
?>
