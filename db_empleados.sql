USE db_empresa;

CREATE TABLE empleados (
    id_empleado INT PRIMARY KEY AUTO_INCREMENT,
    codigo VARCHAR(5),
    nombre VARCHAR(60),
    apellidos VARCHAR(60),
    direccion VARCHAR(100),
    telefono VARCHAR(8),
    fecha_nacimiento DATE,
    id_puesto SMALLINT
);

USE db_empresa;
CREATE TABLE puestos(
id_puesto SMALLINT PRIMARY KEY AUTO_INCREMENT,
puesto varchar(40)

);

INSERT INTO `db_empresa`.`puestos` (`id_puesto`, `puesto`) VALUES ('1', 'Gerente');
INSERT INTO `db_empresa`.`puestos` (`id_puesto`, `puesto`) VALUES ('2', 'Programador');
INSERT INTO `db_empresa`.`puestos` (`id_puesto`, `puesto`) VALUES ('3', 'Analista');




select e.id_empleado as id, e.codigo, e.nombres, e.apellidos, e.direccion, e.telefono, p.puesto, e.fecha_nacimiento
from empleados as e inner join puestos as p on e.id_puesto=p.id_puesto;


