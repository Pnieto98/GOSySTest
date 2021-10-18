

/**Query con  1 join **/
SELECT DISTINCT p.viaje_id, COUNT(p.id) AS cantidad_paquetes, SUM(subtotal) AS total FROM tarifas t
JOIN paquetes p ON p.viaje_id = t.viaje_id
GROUP BY viaje_id, p.id
HAVING cantidad_paquetes <= 3
ORDER BY viaje_id DESC 

/**Query con  2 join**/
SELECT DISTINCT v.id AS viaje_id, COUNT(p.id) AS cantidad_paquetes, SUM(t.subtotal) AS total
FROM viajes AS v
JOIN paquetes p ON p.viaje_id = v.id
JOIN tarifas t ON t.viaje_id = v.id
GROUP BY v.id, p.id
HAVING cantidad_paquetes <= 3
ORDER BY viaje_id DESC