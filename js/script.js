document.getElementById("miFormulario").addEventListener("submit", function (event) {
    event.preventDefault(); // Evitamos el envío del formulario por defecto

    // Realiza la validación con JavaScript aquí (si es necesario).
    // Por ejemplo, puedes verificar si los campos están completos o cumplen ciertas condiciones.

    // Ejemplo de envío del formulario mediante Fetch API:
    fetch('validar_formulario.php', {
        method: 'POST',
        body: new FormData(document.getElementById("miFormulario"))
    })
    .then(response => response.text())
    .then(data => {
        // Maneja la respuesta del servidor
        alert(data); // Por ejemplo, puedes mostrar un mensaje de éxito o error.
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
