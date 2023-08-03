<?php

// Conexión a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba_tecnica_frontend";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Función para obtener el listado de comunas cuyo nombre de región tenga una "m" (case insensitive) y exportar a XML.
function exportarComunasXMl()
{
    global $conn;

    $sql = "SELECT tbl_comuna.id, tbl_comuna.name
            FROM tbl_comuna
            LEFT JOIN tbl_region ON tbl_comuna.region_id = tbl_region.id
            WHERE LOWER(tbl_region.name) LIKE '%m%';";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Creamos un objeto SimpleXMLElement para generar el XML
        $xml = new SimpleXMLElement('<comunas></comunas>');

        while ($row = $result->fetch_assoc()) {
            // Añadimos cada comuna como un elemento en el XML
            $comuna = $xml->addChild('comuna');
            $comuna->addChild('id', $row['id']);
            $comuna->addChild('nombre', $row['name']);
        }

        // Guardamos el XML en un archivo
        $xml->asXML('comunas.xml');

        echo "Se exportaron las comunas a XML correctamente.";
    } else {
        echo "No se encontraron comunas que cumplan con la condición.";
    }

    $conn->close();
}

// Llamamos a la función para obtener y exportar las comunas a XML
exportarComunasXMl();
?>


