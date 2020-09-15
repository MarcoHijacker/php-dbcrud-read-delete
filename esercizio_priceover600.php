<?php

  // Seleziona dalla tabella pagamenti le colonne id, status e price di tutti i pagamenti con price superiore a 600, stampa il risultato in una lista non ordinata.
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
      SELECT id, status, price
      FROM pagamenti
      WHERE price > 600
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
