# Proyecto de Prueba Taller Digital por Cristopher Seguel

Este proyecto es una aplicación web de registro de usuarios que permite a los usuarios ingresar su nombre, apellido y contraseña, y aceptar los términos de uso. Los datos ingresados se validan en el lado del cliente utilizando JavaScript y luego se envían al servidor para una validación adicional en PHP. Además, el proyecto incluye una función en PHP para exportar las comunas cuyo nombre de región contiene una "m" (mayúscula o minúscula) a un archivo XML.

## Instalación

1. Descarga el archivo en tu equipo:

2. Configura tu servidor web local (por ejemplo, XAMPP) para ejecutar el proyecto. Asegúrate de que PHP y MySQL estén correctamente configurados.

3. Crea una base de datos MySQL llamada `prueba_tecnica_frontend` y asegúrate de aplicar los siguientes comandos SQL



-- Código SQL para crear las tablas tbl_region y tbl_comuna


CREATE TABLE tbl_region (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL
);

CREATE TABLE tbl_comuna (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
region_id INT NOT NULL,
FOREIGN KEY (region_id) REFERENCES tbl_region(id)
);

INSERT INTO tbl_region (name) VALUES
('Región Metropolitana'),
('Región de Valparaíso'),
('Región del Biobío');

INSERT INTO tbl_comuna (name, region_id) VALUES
('Santiago', 1),
('Providencia', 1),
('Valparaíso', 2),
('Viña del Mar', 2),
('Concepción', 3),
('Talcahuano', 3);


4. Ejecuta los comandos SQL en tu base de datos MySQL utilizando phpMyAdmin o cualquier otra herramienta.

5. Abre el archivo `index.php` y `validar_formulario.php` y configura la conexión a la base de datos con tus credenciales:

6. Abre la aplicación en tu navegador web y prueba el formulario de registro de usuarios.

## Tecnologías utilizadas

- HTML5
- CSS3
- JavaScript
- PHP
- MySQL

## Ejemplo de uso

1. Ingresa tu nombre, apellido y contraseña en el formulario.
2. Acepta los términos de uso marcando la casilla correspondiente.
3. Presiona el botón "Sign Up" para enviar el formulario.
4. El formulario se validará en el lado del cliente y luego se enviará al servidor para una validación adicional.
5. Si todos los campos son válidos, el formulario se enviará correctamente y mostrará un mensaje de éxito.
