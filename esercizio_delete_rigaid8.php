<?php

  // Elimina dalla tabella pagamenti la riga con id 8.
  // Comunicazione dati DB
  $servername = "localhost";
  $user = "root";
  $password = "root";
  $db_name = "db-hotel";

  // Controllo connessione con il DB
  $connection = new mysqli($servername, $user, "root", $db_name);

  if( $connection && $connection->connect_error ) {
    echo 'error?' . $connection->connect_error;
    print_r( $connection );

    return;
  } else {
    echo 'Connesso a <b>' . $db_name . '</b>.<br>';
  }

  // Query SQL
  $sql = "
    DELETE
    FROM pagamenti
    WHERE id = 8
  ";

  $result = $connection->query($sql);

  if( $result === true ) {
    // Ciclo while sui risultati
    echo 'Deleted!<br>';
    print_r($result); // Numero di righe coinvolte
  } else {
    echo 'Error with deletion!<br>';
    print_r($result); // 0
  }


  // Chiudi connessione
  $connection->close();

?>
