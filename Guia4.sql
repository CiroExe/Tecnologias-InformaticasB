--Ejercicio 3a)  

SELECT name, stock
FROM products
GROUP BY product_id;

-- Ejercicio 3b)

SELECT CONCAT(c.first_name,' ',c.last_name), COUNT(*) as ordenes
FROM orders o
INNER JOIN customers c ON o.customer_id=c.id
GROUP BY c.id;

--Ejercicio 3c) 

SELECT AVG(total) as promedio 
FROM orders;

-- Ejercicio 3d) 

SELECT name, stock 
FROM products
WHERE stock <= 10;

-- Ejercicio 3e)

SELECT p.name, SUM(oi.price) AS suma 
FROM order_items oi
INNER JOIN products p ON oi.product_id = p.id
GROUP BY p.id;

-- Ejercicio 3f) 

SELECT date, COUNT(*) as pedidos
FROM orders 
GROUP by date
HAVING pedidos >2;



