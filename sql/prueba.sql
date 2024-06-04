CREATE DATABASE IF NOT EXISTS prueba;

USE prueba;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    telefono VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    contrasenaDos VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS respuesta (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    respuesta VARCHAR(255) NOT NULL,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS rol (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rol VARCHAR(100) NOT NULL,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS productosAnimales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagen VARCHAR(255) NOT NULL, 
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS productosAutos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagen VARCHAR(255) NOT NULL, 
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS productosHogar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagen VARCHAR(255) NOT NULL, 
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS pqrs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL,
    correoDos VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS compra (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    producto VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    fecha DATE NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    cantidad INT NOT NULL,
    total DECIMAL(10, 2) NOT NULL
);


CREATE TABLE IF NOT EXISTS compraRealizada (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    producto VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    fecha DATE NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    cantidad INT NOT NULL,
    total DECIMAL(10, 2) NOT NULL
);




