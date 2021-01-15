--Crear base de datos
CREATE DATABASE huespedepersona;

--usando la dase de datos
USE huespedepersona;

--Tabla
CREATE TABLE huespederegistrar (
  Id int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  Nombre varchar(50) NOT NULL,
  Apellido varchar(100) NOT NULL,
  Pasaporte varchar(200) NOT NULL,
  Correo varchar(200) NOT NULL,
  Telefono varchar(14) NOT NULL,
  PaisOrigen varchar(200) NOT NULL,
  FechaLlegada date NOT NULL,
  FechaSalida date NOT NULL,
  NumeroHabitancion int NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;





