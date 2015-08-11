<?php

    // Conecta al servicio XE (esto es, una base de datos) en el servidor "localhost"
    $conn = oci_pconnect('usuario', 'password', 'localhost/XE', 'AL32UTF8');
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    $stid = oci_parse($conn, 'SELECT * FROM postres ORDER BY nombre ASC');
    oci_execute($stid);

        echo "<table class='table table-striped'>\n";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "<th>Precio</th>";
        echo "<th>Stock</th>";
        echo "<th>Detalles</th>";
        echo "</tr>";
        echo "</thead>";
    while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>\n";
    foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "</td>\n";
        }
        echo "</tr>\n";
        }
       echo "</table>\n";

?>