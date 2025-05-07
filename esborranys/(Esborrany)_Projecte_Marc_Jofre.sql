-- Crear la base de datos
CREATE DATABASE `Projecte_Marc_Jofre`;

-- Seleccionar la base de datos
USE `Projecte_Marc_Jofre`;

-- Crear la tabla Degree
CREATE TABLE Degree (
  id CHAR(3) NOT NULL PRIMARY KEY,
  Name VARCHAR(30) NOT NULL,
  Description VARCHAR(255)
);

-- Crear la tabla Companies
CREATE TABLE Companies (
  Id CHAR(3) NOT NULL PRIMARY KEY,
  Name VARCHAR(30) NOT NULL,
  Description VARCHAR(255),
  Logo BLOB,
  Degree_id CHAR(3) NOT NULL,
  CONSTRAINT FKdegree_id FOREIGN KEY (Degree_id) REFERENCES Degree(id)
);

-- Crear la tabla Branches
CREATE TABLE Branches (
  Address VARCHAR(50) NOT NULL,
  Zipcode INT(5) NOT NULL,
  City VARCHAR(30) NOT NULL,
  Province VARCHAR(30),
  Id CHAR(3) NOT NULL,
  CONSTRAINT FKcompany_id FOREIGN KEY (Id) REFERENCES Companies(Id)
);

-- Insertar datos en la tabla Degree
INSERT INTO Degree (id, name, description)
VALUES
  ('1', 'DAM', 'Desenvolupament d\'Aplicacions Multiplataforma'),
  ('2', 'DAW', 'Desenvolupament d\'Aplicacions Web'),
  ('3', 'ASIX', 'Administració de Sistemes Informàtics en Xarxa');

-- Insertar datos en la tabla Companies
INSERT INTO Companies (Id, name, description, logo, Degree_id)
VALUES
  ('1', 'SEMIC', 'Somos una empresa de servicios y soluciones IT con más de 40 años de experiencia en el sector. Proporcionamos las mejores y más novedosas soluciones de IT para que las empresas puedan adaptarse a los nuevos retos y formas de trabajo sin perder el ritmo.', 'semic.png', '3'),
  ('2', 'Mon Sant Benet', 'Món Sant Benet es un complejo cultural, turístico y de ocio único, impulsado por la Fundació Catalunya La Pedrera, que combina historia, gastronomía, naturaleza y cultura.', '', '3'),
  ('3', 'THOR', 'THOR Especialidades, S.A. es una filial de Grupo THOR, empresa multinacional de origen inglés fabricante de una innovadora y tecnológica gama de especialidades químicas; respaldados por un soporte técnico especializado enfocado en lograr una óptima relación precio-efectividad.', '', '1'),
  ('4', 'SEMIC', 'Somos una empresa de servicios y soluciones IT con más de 40 años de experiencia en el sector. Proporcionamos las mejores y más novedosas soluciones de IT para que las empresas puedan adaptarse a los nuevos retos y formas de trabajo sin perder el ritmo.', '', '1'),
  ('5', 'UVE', 'UVE (UVE Solutions) es una empresa española que se enfoca en impulsar el negocio de fabricantes y distribuidores en el sector del gran consumo, utilizando datos, análisis y soluciones de ejecución para optimizar el "Route to Market".', '', '1'),
  ('6', 'Social Lovers', 'Social Lovers es una empresa de informática que ofrece una amplia gama de productos y servicios tecnológicos tanto a empresas como a particulares.', '', '2'),
  ('7', 'Control Grup', 'Aportamos soluciones de impresión, gestión documental, servicios informáticos, de seguridad y comunicaciones para conseguir la máxima eficiencia en tu empresa, despacho profesional o administración pública.', '', '2');

-- Insertar datos en la tabla Branches
INSERT INTO Branches (Address, Zipcode, City, Province, Id)
VALUES
  ('Moixeró, 19', 08272, 'Sant Fruitós de Bages', 'Barcelona', '1'),
  ('Carrer de Gaspar Fàbregas i Roses, 88', 08950, 'Esplugues de Llobregat', 'Barcelona', '1'),
  ('Camí de Sant Benet, S/N, Local 1', 08272, 'Sant Fruitós de Bages', 'Barcelona', '2'),
  ('Polígon Industrial Pla del Camí, Avenida de Industria, 1', 08297, 'Castellgalí', 'Barcelona', '3'),
  ('Moixeró, 19', 08272, 'Sant Fruitós de Bages', 'Barcelona', '4'),
  ('Carrer de Gaspar Fàbregas i Roses, 88', 08950, 'Esplugues de Llobregat', 'Barcelona', '4'),
  ('Plaça de la Ciència, 1', 08243, 'Manresa', 'Barcelona', '5'),
  ('Complex Catalana Parc, Carrer Jesús Serra Santamans, 4, Planta 3, Oficina 2', 08174, 'Sant Cugat del Vallés', 'Barcelona', '5'),
  ('Carrer Àngel Guimerá, 26', 08272, 'Sant Fruitós de Bages', 'Barcelona', '6'),
  ('Carrer de Sant Fruitós, 10, BAIXOS', 08242, 'Manresa', 'Barcelona', '6'),
  ('Polígon Industrial Casanova, Carrer Montsant, 14-16', 08272, 'Sant Fruitós de Bages', 'Barcelona', '7');
