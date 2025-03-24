
UPDATE solicitud_analisis_lineas
SET tiempo = CASE
    WHEN id = 21473 THEN '2025-03-23 00:10:00'
    WHEN id = 21476 THEN '2025-03-23 01:11:00'
    WHEN id = 21483 THEN '2025-03-23 02:5:00'


END
WHERE id IN (
  21473, 21476, 21483
);
