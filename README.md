# Wedding Card

Invitación de boda con contador regresivo y confirmación de asistencia (RSVP) guardada en MySQL.

## Desplegar en Railway

1. Crea un nuevo proyecto en Railway y conecta este repositorio (Railway detecta el `Dockerfile` automáticamente).
2. Agrega un servicio **MySQL** al mismo proyecto (`New` → `Database` → `Add MySQL`).
3. En el servicio de la app (no el de MySQL), ve a **Variables** y agrega referencias a las variables del servicio MySQL:
   - `MYSQLHOST` → `${{MySQL.MYSQLHOST}}`
   - `MYSQLPORT` → `${{MySQL.MYSQLPORT}}`
   - `MYSQLUSER` → `${{MySQL.MYSQLUSER}}`
   - `MYSQLPASSWORD` → `${{MySQL.MYSQLPASSWORD}}`
   - `MYSQLDATABASE` → `${{MySQL.MYSQLDATABASE}}`

   (Railway suele ofrecer esto automáticamente al hacer clic en "Add Variable Reference".)
4. Crea la tabla `invitados` ejecutando `schema.sql` contra la base de datos de Railway (puedes usar la pestaña **Data** del servicio MySQL en Railway, o conectarte con un cliente MySQL usando las credenciales del servicio).
5. Railway inyecta la variable `PORT` automáticamente; el `Dockerfile` ya está preparado para escuchar en ese puerto.
6. Haz deploy. La app queda disponible en la URL pública que Railway asigna al servicio.

## Desarrollo local

La conexión a la base de datos vive en `db.php` y lee las variables de entorno `MYSQLHOST`, `MYSQLPORT`, `MYSQLUSER`, `MYSQLPASSWORD`, `MYSQLDATABASE` (con valores por defecto para un MySQL local). Exporta esas variables o usa un MySQL local con esos defaults antes de correr la app.

## Nota de seguridad

Las credenciales de la base de datos anterior (InfinityFree) quedaron expuestas en el historial de git de este repositorio. Ya no se usan en el código (ahora todo pasa por variables de entorno), pero si en algún momento puedes rotarlas desde el panel de InfinityFree, es recomendable hacerlo.
