CREATE DATABASE supermarket;

USE supermarket;

CREATE TABLE categorias(
    categoriaId INT NOT NULL auto_increment,
    nombres VARCHAR(50) NOT NULL,
    descripcion VARCHAR(150) NOT NULL,
    imagen VARCHAR(50) NOT NULL,
    PRIMARY KEY (categoriaId)
);

CREATE TABLE clientes(
    clienteId INT NOT NULL auto_increment,
    nombre VARCHAR(50) NOT NULL,
    celular INT NOT NULL,
    compania VARCHAR(255) NOT NULL,
    PRIMARY KEY (clienteId)

);

CREATE TABLE empleados(
    empleadoId INT NOT NULL auto_increment,
    nombre VARCHAR(50) NOT NULL,
    celular INT NOT NULL,
    direccion VARCHAR(150) NOT NULL,
    imagen VARCHAR(50) NOT NULL,
    PRIMARY KEY(empleadoId)
);

CREATE TABLE facturas(
    facturaId INT NOT NULL auto_increment,
    empleadoId INT,
    clienteId INT,
    fecha DATE,
    PRIMARY KEY(facturaId),
    FOREIGN KEY (empleadoId) REFERENCES empleados(empleadoId),
    FOREIGN KEY (clienteId) REFERENCES clientes(clienteId)
);

CREATE TABLE proveedores(
    proveedorId INT NOT NULL auto_increment,
    nombre VARCHAR(50) NOT NULL,
    telefono INT NOT NULL,
    ciudad VARCHAR(50) NOT NULL,
    PRIMARY KEY(proveedorId)
);

CREATE TABLE productos(
    productoId INT NOT NULL auto_increment,
    categoriasId INT,
    precioUnitario INT NOT NULL,
    stock INT NOT NULL,
    unidadesPedidas INT NOT NULL,
    proveedorId INT,
    nombreProducto VARCHAR(50) NOT NULL,
    descontinuado VARCHAR(50) NOT NULL,
    PRIMARY KEY(productoId),
    FOREIGN KEY (categoriasId) REFERENCES categorias(categoriaId),
    FOREIGN KEY (proveedorId) REFERENCES proveedores(proveedorId)
);


CREATE TABLE facturaDetalle(
    facturaId INT,
    productoId INT,
    cantidad INT NOT NULL,
    precioVenta INT NOT NULL,
    FOREIGN KEY (facturaId) REFERENCES facturas(facturaId),
    FOREIGN KEY (productoId) REFERENCES productos(productoId)
);



DROP DATABASE supermarket;