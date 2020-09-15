<?php

  // Seleziona tutto dalla tabella pagamenti e stampa il risultato in una lista ordinata.
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
    SELECT *
    FROM pagamenti
  ";

  $result = $connection->query($sql);

  if( $result && $result->num_rows > 0 ) {
    // Ciclo while sui risultati
    echo '<ul>';

    while( $row = $result->fetch_assoc() ) {
      echo '<li>' . $row['id'] ." - " .$row['status'] . " - " .$row['price'] . '</li>';
    }

    echo '</ul>';
  } else {
    print_r($result);
  }


  // Chiudi connessione
  $connection->close();

?>
