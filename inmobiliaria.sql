CREATE DATABASE inmobiliaria;
USE inmobiliaria;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    tipo ENUM('admin','comprador','vendedor'),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pisos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150),
    descripcion TEXT,
    precio DECIMAL(10,2),
    ciudad VARCHAR(100),
    imagen VARCHAR(255),
    id_vendedor INT,
    vendido BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (id_vendedor) REFERENCES usuarios(id)
);

INSERT INTO usuarios (nombre, email, password, tipo)
VALUES (
    'Admin',
    'admin@admin.com',
    '$2y$10$wH8Z9bZyZk7Qw8y5Wc3QTe8gZz9k8Xwq9K7Zy5Jz3Zk8Zy5Jz3Zk8',
    'admin'
);