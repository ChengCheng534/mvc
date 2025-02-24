# mvc
cd \Program Files\Ampps\mysql\bin
mysql -u root -p
mysql -u root -p concesionario < script_completo.sql
DROP DATABASE concesionario;
CREATE DATABASE concesionario;
USE concesionario;