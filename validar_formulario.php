<?php
// Verificamos si se ha recibido el formulario mediante el método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Función para limpiar y validar datos
    function validar_dato($dato) {
        $dato = trim($dato);
        $dato = stripslashes($dato);
        $dato = htmlspecialchars($dato);
        return $dato;
    }

    // Validar campo de nombre
    $firstName = validar_dato($_POST["firstName"]);
    if (empty($firstName)) {
        echo "El campo First Name es obligatorio.";
        exit;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
        echo "El campo First Name debe contener solo letras y espacios.";
        exit;
    }

    // Validar campo de apellido
    $lastName = validar_dato($_POST["lastName"]);
    if (empty($lastName)) {
        echo "El campo Last Name es obligatorio.";
        exit;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
        echo "El campo Last Name debe contener solo letras y espacios.";
        exit;
    }

    // Validar campo de contraseña
    $password = validar_dato($_POST["password"]);
    if (empty($password)) {
        echo "El campo Password es obligatorio.";
        exit;
    } elseif (strlen($password) < 8) {
        echo "La contraseña debe tener al menos 8 caracteres.";
        exit;
    }

    // Validar checkbox de aceptar términos
    if (!isset($_POST["acceptTerms"])) {
        echo "Debe aceptar los términos de uso.";
        exit;
    }

    // Si todas las validaciones son exitosas, puedes realizar las operaciones que necesites con los datos.
    // Por ejemplo, guardar los datos en la base de datos, enviar correos electrónicos, etc.

    // Si todo va bien, puedes enviar una respuesta al cliente (JavaScript) para mostrar un mensaje de éxito.
    echo "¡Formulario enviado con éxito!";
} else {
    // Si el formulario no se envió mediante POST, redireccionamos al formulario.
    header("Location: index.html");
    exit;
}
?>
