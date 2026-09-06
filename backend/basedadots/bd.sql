CREATE DATABASE IF NOT EXISTS registro
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE registro;

CREATE TABLE IF NOT EXISTS clientes (
    Nombre VARCHAR(30) NOT NULL,
    Apellido VARCHAR(30) NOT NULL,
    Tipo_documento VARCHAR(20) NOT NULL,
    Numero_documento VARCHAR(20) NOT NULL,
    Dirección VARCHAR(50) NOT NULL,
    Telefono VARCHAR(21) NOT NULL,
    Correo_electronico VARCHAR(100) NOT NULL,
    Contraseña VARCHAR(255) NOT NULL
);

SELECT * FROM clientes;