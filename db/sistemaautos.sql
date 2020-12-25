CREATE TABLE `usuarios` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(50) NOT NULL,
    `apellido` varchar(50) NOT NULL,
    `telefono` varchar(10) NOT NULL,
    `email` varchar(30) NOT NULL,
    `pass` varchar(15) NOT NULL,
    `tipo` int(1) NOT NULL,
    `fecha` date,
    PRIMARY KEY (`id`)
);
CREATE TABLE `cliente` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `clave` varchar(10) NOT NULL,
    `nombre` varchar(15) NOT NULL,
    `apellido` varchar(15) NOT NULL,
    `telefono` varchar(10) NOT NULL,
    `fecha` date,
    PRIMARY KEY (`id`)
);
CREATE TABLE `empleado` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idusuario` int(11) NOT NULL,
    `clave` varchar(10) NOT NULL,
    `nombre` varchar(15) NOT NULL,
    `apellido` varchar(15) NOT NULL,
    `telefono` varchar(10) NOT NULL,
    `fecha` date,
    PRIMARY KEY (`id`),
    FOREIGN KEY (idusuario) REFERENCES usuarios(id)
);
CREATE TABLE `autolavado` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idcliente` int(11) NOT NULL,
    `idempleado` int(11) NOT NULL,
    `tamano` varchar(10) NOT NULL,
    `precio` int(5) NOT NULL,
    `fecha` date,
    PRIMARY KEY (`id`),
    FOREIGN KEY (idcliente) REFERENCES cliente(id),
    FOREIGN KEY (idempleado) REFERENCES empleado(id)
);
CREATE TABLE `gasto` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idusuario` int(11) NOT NULL,
    `descripcion` varchar(255) NOT NULL,
    `cantidad` int(10) NOT NULL,
    `fecha` date,
    PRIMARY KEY (`id`),
    FOREIGN KEY (idusuario) REFERENCES usuarios(id)
);
CREATE TABLE `pagoempleado` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idempleado` int(11) NOT NULL,
    `cantidad` int(10) NOT NULL,
    `fecha` date,
    PRIMARY KEY (`id`),
    FOREIGN KEY (idempleado) REFERENCES empleado(id)
);
CREATE TABLE `producto` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idusuario` int(11) NOT NULL,
    `nombre` varchar(50) NOT NULL,
    `cantidad` int(15) NOT NULL,
    `precio` int(15) NOT NULL,
    `fecha` date,
    PRIMARY KEY (`id`),
    FOREIGN KEY (idusuario) REFERENCES usuarios(id)
);
INSERT INTO `usuarios` (
        `id`,
        `nombre`,
        `apellido`,
        `telefono`,
        `email`,
        `pass`,
        `tipo`,
        `fecha`
    )
VALUES (
        1,
        'Jorge Daniel',
        'Lopez',
        '7121584875',
        'daniel@correo.com',
        '12345678',
        1,
        '2020-05-05'
    ),
    (
        2,
        'Alyson',
        'Vargas Barrios',
        '7121597825',
        'alyson@correo.com',
        '12345678',
        2,
        '2020-05-05'
    );