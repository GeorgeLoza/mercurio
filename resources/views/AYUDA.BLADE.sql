update analisis_lineas
set tiempo = case
    when solicitud_analisis_linea_id = 22383 THEN '2025-04-01 01:29:25'
    when solicitud_analisis_linea_id = 22384 THEN '2025-04-01 01:30:25'
    when solicitud_analisis_linea_id = 22385 THEN '2025-04-01 01:31:25'
    when solicitud_analisis_linea_id = 22387 THEN '2025-04-01 01:51:25'
    when solicitud_analisis_linea_id = 22388 THEN '2025-04-01 01:51:25'
    when solicitud_analisis_linea_id = 22389 THEN '2025-04-01 01:53:25'
    when solicitud_analisis_linea_id = 22392 THEN '2025-04-01 02:18:25'
    when solicitud_analisis_linea_id = 22393 THEN '2025-04-01 02:18:25'
    when solicitud_analisis_linea_id = 22394 THEN '2025-04-01 02:18:25'
    when solicitud_analisis_linea_id = 22397 THEN '2025-04-01 02:41:25'
    when solicitud_analisis_linea_id = 22398 THEN '2025-04-01 02:45:25'
    when solicitud_analisis_linea_id = 22399 THEN '2025-04-01 02:45:25'
    when solicitud_analisis_linea_id = 22401 THEN '2025-04-01 02:59:25'
    when solicitud_analisis_linea_id = 22402 THEN '2025-04-01 02:59:25'
    when solicitud_analisis_linea_id = 22403 THEN '2025-04-01 02:59:25'

    when solicitud_analisis_linea_id = 22405 THEN '2025-04-01 03:17:25'
    when solicitud_analisis_linea_id = 22407 THEN '2025-04-01 03:18:25'
    when solicitud_analisis_linea_id = 22409 THEN '2025-04-01 03:18:25'
    when solicitud_analisis_linea_id = 22411 THEN '2025-04-01 03:31:25'
    when solicitud_analisis_linea_id = 22412 THEN '2025-04-01 03:32:25'
    when solicitud_analisis_linea_id = 22413 THEN '2025-04-01 03:34:25'
    when solicitud_analisis_linea_id = 22415 THEN '2025-04-01 03:58:25'
    when solicitud_analisis_linea_id = 22416 THEN '2025-04-01 03:58:25'
    when solicitud_analisis_linea_id = 22417 THEN '2025-04-01 03:59:25'


    end
where solicitud_analisis_linea_id in (
22383,22384,22385,22387,22388,22389,22392,22393,22394,22397,22398,22399,22401,22402,22403,22405,22407,22409,22411,22412,22413,22415,22416,22417);
