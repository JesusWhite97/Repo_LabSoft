use databaseingexis;
--======================================--
INSERT Log_usuarios (correo, contra, img_log) values ('jesus120190240.8@gmail.com', '1234', 'prueba/no img');
INSERT usuarios values(last_insert_id(), 'jesus', '', 'villavicencio', 'osuna', 'JesusWhite', '612171121', 'Jefe De Laboratorio', 'aaaa111111bccddd23', 'aaaa111111b2c', 'piñon', 'avellana,limon', '201', 'indeco', '23070');
--======================================--
INSERT Log_usuarios (correo, contra, img_log) values ('Rtapiz@gmail.com', '1234', 'prueba/no img');
INSERT usuarios values(last_insert_id(), 'raul', 'jesus', 'ruiz', 'tapiz', 'RTapiz', '6121123422', 'Administrador', 'aaaa111111bccddd23', 'aaaa111111b2c', 'forjadores', 'tecnologico,terminal', '512', 'forjadores', '23098');
--======================================--
-- call agregaUsuario( 'Meli@gmail.com', '1234', 'noImg', 'Melisa', 'samanta', 'ceseña', 'rodrigez', 'Meli', '6121458795', 'Laboratorista 1', 'aaaa111111bccddd23', 'aaaa111111b2c', 'pitaya', 'mango,semilla', '564', 'indeco', '23071');
--======================================--
-- call agregaUsuario( 'Luis@gmail.com', '1234', 'noImg', 'Luis', 'Enrrique', 'Villavicencio', 'Lucero', '', '6128962147', 'Laboratorista 2', 'aaaa111111bccddd23', 'aaaa111111b2c', 'pitaya', 'mango,semilla', '564', 'indeco', '23071');
--======================================--