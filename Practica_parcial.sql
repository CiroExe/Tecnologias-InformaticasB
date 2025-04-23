-- Ejercicio 1) Mostrar las reparaciones mayores de $1000.

SELECT pk_reparacion, descripcion 
FROM reparaciones r 
WHERE r.importe > 1000;

-- Ejercicio 2) Mostrar las reparaciones comprendidas en el primer semestre de 2020

SELECT *
FROM Reparaciones
WHERE fecha_entrada BETWEEN '2020-01-01' AND '2020-06-30';


-- Ejercicio 3) De cada mecánico, mostrar apellido, nombre y cantidad de reparaciones

SELECT m.nombre AS nombre, m.apellido AS apellido, COUNT(*) AS reparaciones
FROM reparaciones r
INNER JOIN mecanicos m ON r.fk_mecanico=m.pk_mecanico
GROUP BY r.fk_mecanico;

-- Ejercicio 4) Mostrar los automotores que son de la marca Peugeot, Renault o Fiat

SELECT *
FROM marcas
WHERE marca IN ('Renault', 'Peugeot', 'Fiat');

-- Ejercicio 5) mostrar todas las reparaciones del vehículo con patente QWE789

SELECT a.patente, COUNT(*) as veces_reparado
FROM reparaciones r 
INNER JOIN automotores a ON r.pk_automotor = r.fk_automotor
WHERE a.patente ='QWE789'; 
