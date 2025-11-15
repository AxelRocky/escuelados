CREATE DATABASE IF NOT EXISTS escuela;
USE escuela;

-- ==============================
-- Tabla: asistencias
-- ==============================
CREATE TABLE asistencias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  idClase INT(11) NOT NULL,
  idEstudiante INT(11) NOT NULL,
  idCurso INT(11) NOT NULL,
  estado INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=1;

-- ==============================
-- Tabla: calificaciones
-- ==============================
CREATE TABLE calificaciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  idCurso INT(11) NOT NULL,
  idClase INT(11) NOT NULL,
  idEstudiante INT(11) NOT NULL,
  calificacion INT(11) NOT NULL,
  observacion VARCHAR(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=1;

-- ==============================
-- Tabla: carreras
-- ==============================
CREATE TABLE carreras (
  id INT AUTO_INCREMENT PRIMARY KEY,
  clave VARCHAR(20) NOT NULL,
  descripcion VARCHAR(100) NOT NULL,
  baja INT(11) NOT NULL,
  baja_dt DATETIME NOT NULL,
  modificado_dt DATETIME NOT NULL,
  creado_dt DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=1;

-- ==============================
-- Tabla: catalogos
-- ==============================
CREATE TABLE catalogos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tipo VARCHAR(100) NOT NULL,
  clave INT(11) NOT NULL,
  descripcion VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=1;

-- Datos para catalogos
INSERT INTO catalogos (tipo, clave, descripcion) VALUES
('tipoUsuario', 2, 'Profesor'),
('tipoUsuario', 3, 'Estudiante'),
('tipoSangre', 1, 'A+'),
('tipoSangre', 2, 'A-'),
('tipoSangre', 3, 'B+'),
('tipoSangre', 4, 'B-'),
('tipoSangre', 5, 'AB+'),
('tipoSangre', 6, 'AB-'),
('tipoSangre', 7, 'O+'),
('tipoSangre', 8, 'O-'),
('genero', 1, 'Masculino'),
('genero', 2, 'Femenino'),
('genero', 3, 'Otros'),
('estado', 1, 'Activo'),
('estado', 2, 'Inactivo'),
('estado', 3, 'Baja temporal'),
('tipoUsuario', 1, 'Admon'),
('dia', 1, 'Lunes'),
('dia', 2, 'Martes'),
('dia', 3, 'Miércoles'),
('dia', 4, 'Jueves'),
('dia', 5, 'Viernes'),
('dia', 6, 'Sábado'),
('dia', 7, 'Domingo'),
('tipoExamen', 1, 'Examen escrito'),
('tipoExamen', 2, 'Examen oral'),
('tipoExamen', 3, 'Trabajo'),
('tipoMaterial', 1, 'Libro'),
('tipoMaterial', 2, 'Libro electrónico'),
('tipoMaterial', 3, 'Video');

-- ==============================
-- Tabla: clases
-- ==============================
CREATE TABLE clases (
  id INT AUTO_INCREMENT PRIMARY KEY,
  idCurso INT(11) NOT NULL,
  fecha DATE NOT NULL,
  observacion VARCHAR(200) NOT NULL,
  tipoExamen INT(11) NOT NULL,
  calificacion INT(11) NOT NULL,
  baja INT(11) NOT NULL,
  baja_dt DATETIME NOT NULL,
  modificado_dt DATETIME NOT NULL,
  creado_dt DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=1;

-- ==============================
-- Tabla: cursos
-- ==============================
CREATE TABLE cursos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  clave INT(11) NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  temario VARCHAR(200) NOT NULL,
  idSalon INT(11) NOT NULL,
  idProfesor INT(11) NOT NULL,
  idMateria INT(11) NOT NULL,
  fechaInicio DATETIME NOT NULL,
  fechaFin DATETIME NOT NULL,
  baja INT(11) NOT NULL,
  baja_dt DATETIME NOT NULL,
  modificado_dt DATETIME NOT NULL,
  creado_dt DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=1;

-- ==============================
-- Tabla: horarios
-- ==============================
CREATE TABLE horarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  idCurso INT(11) NOT NULL,
  idSalon INT(11) NOT NULL,
  dia VARCHAR(15) NOT NULL,
  horaInicio TIME NOT NULL,
  horaFin TIME NOT NULL,
  observacion VARCHAR(200) NOT NULL,
  baja INT(11) NOT NULL,
  baja_dt DATETIME NOT NULL,
  modificado_dt DATETIME NOT NULL,
  creado_dt DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=1;

-- ==============================
-- Tabla: inscripciones
-- ==============================
CREATE TABLE inscripciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  idEstudiante INT(11) NOT NULL,
  idCurso INT(11) NOT NULL,
  calificacion INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=1;

-- ==============================
-- Tabla: materiales
-- ==============================
CREATE TABLE materiales (
  id INT AUTO_INCREMENT PRIMARY KEY,
  clave INT(11) NOT NULL,
  tipoMaterial INT(11) NOT NULL,
  descripcion VARCHAR(100) NOT NULL,
  baja INT(11) NOT NULL,
  baja_dt DATETIME NOT NULL,
  modificado_dt DATETIME NOT NULL,
  creado_dt DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=1;

-- ==============================
-- Tabla: materias
-- ==============================
CREATE TABLE materias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  clave INT(11) NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  idCarrera INT(11) NOT NULL,
  temario VARCHAR(100) NOT NULL,
  baja INT(11) NOT NULL,
  baja_dt DATETIME NOT NULL,
  modificado_dt DATETIME NOT NULL,
  creado_dt DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=1;

-- ==============================
-- Tabla: salones
-- ==============================
CREATE TABLE salones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  clave INT(11) NOT NULL,
  descripcion VARCHAR(100) NOT NULL,
  nota VARCHAR(200) NOT NULL,
  baja INT(11) NOT NULL,
  baja_dt DATETIME NOT NULL,
  modificado_dt DATETIME NOT NULL,
  creado_dt DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=1;

-- ==============================
-- Tabla: usuarios
-- ==============================
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tipo INT(11) NOT NULL,
  correo VARCHAR(200) NOT NULL,
  clave VARCHAR(500) NOT NULL,
  nombres VARCHAR(100) NOT NULL,
  apellidoPaterno VARCHAR(100) NOT NULL,
  apellidoMaterno VARCHAR(100) NOT NULL,
  genero INT(11) NOT NULL,
  telefono VARCHAR(100) NOT NULL,
  pais VARCHAR(100) NOT NULL,
  ciudad VARCHAR(100) NOT NULL,
  codpos VARCHAR(10) NOT NULL,
  foto VARCHAR(100) NOT NULL,
  fechaNacimiento DATE NOT NULL,
  tipoSangre INT(11) NOT NULL,
  estado TINYINT(4) NOT NULL,
  baja INT(11) NOT NULL,
  login_dt DATETIME NOT NULL,
  baja_dt DATETIME NOT NULL,
  modificado_dt DATETIME NOT NULL,
  creado_dt DATETIME NOT NULL,
  calificacion INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=1;

-- Registro de administrador
INSERT INTO usuarios (
  tipo, correo, clave, nombres, apellidoPaterno, apellidoMaterno, genero, 
  telefono, pais, ciudad, codpos, foto, fechaNacimiento, tipoSangre, estado, 
  baja, login_dt, baja_dt, modificado_dt, creado_dt, calificacion
) VALUES
(1, 'admon@escuela.com', '12345', 'Francisco', 'Figueroa', 'Romero', 1, 
 '+559998223', 'Bolivia', 'Cochabamba', 'BOL04', 'avatar.png', '2004-02-10',
 2, 1, 0, '2023-09-05 18:32:05', '2023-09-05 18:32:06', '2023-09-06 15:26:55',
 '2023-09-05 18:32:06', 0);
