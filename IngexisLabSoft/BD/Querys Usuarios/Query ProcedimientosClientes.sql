--======================================--
-- use databaseingexis;
--======================================--
-- create procedure insertarCliente(
--     in titulo           varchar(60),
--     in nom_empr         varchar(60),
--     in rfc              varchar(13),
--     in direc            varchar(100),
--     in cod_pos          varchar(10),
--     in colonia          varchar(20),
--     in ciudad           varchar(30),
--     in nombre_Contac    varchar(100),
--     in numero_contac    varchar(30),
--     in email            varchar(50),
--     in NATIONAL         text,
--     in img              varchar(100),
--     in fecha_reg        date
-- )
-- begin
--     insert clientes(titulo, nom_empr, rfc, direc, cod_pos, colonia, ciudad, nombre_contac, numero_contac, email, nota, img, fecha_reg)
--     values (titulo, nom_empr, rfc, direc, cod_pos, colonia, ciudad, nombre_contac, numero_contac, email, nota, img, fecha_reg);
-- end
--======================================--
-- create procedure eliminar_cliente(in correo varchar(50))
-- begin
--     declare id int;
--     SELECT id_by_correo_Clientes(correo) into id;
--     delete from clientes where clientes.email = correo;
-- end
--======================================--
-- create procedure tarjetas_clientes()
--     select 
--         clientes.img as 'img', 
--         clientes.titulo as 'titulo', 
--         clientes.rfc as 'rfc', 
--         clientes.nombre_contac as 'nombreContac', 
--         clientes.numero_contac as 'numeroContac', 
--         clientes.email as 'correo'
--     from clientes;
--======================================--
-- create procedure Clientes_mod_nota(in correo varchar(50), in nota text)
-- begin
--     declare id_cliente int;
--     select id_by_correo_Clientes(correo) into id_cliente;
--     update clientes set clientes.nota = nota where clientes.id_clientes = id_cliente;
-- end
-- call Clientes_mod_nota('ut.nisi@Phasellusfermentum.ca', 'no mames si terminamos al time')
--======================================--
-- create procedure Clientes_mod_Contacto(in correo varchar(50), in nom_contac varchar(100), in num_contac varchar(30))
-- begin
--     declare id_cliente int;
--     select id_by_correo_Clientes(correo) into id_cliente;
--     update clientes 
--     set 
--         clientes.email = correo,
--         clientes.nombre_contac = nom_contac,
--         clientes.numero_contac = num_contac
--     where
--         clientes.id_clientes = id_cliente;
-- end 
-- call Clientes_mod_Contacto('ut.nisi@Phasellusfermentum.ca', 'juanito perez pitaz', '6128795524');
--======================================--
-- create procedure Clientes_mod_Dbasicos(in correo varchar(50), in titulo varchar(60), in nombreE varchar(60), in RFC varchar(13))
-- begin 
--     declare id_cliente int;
--     select id_by_correo_Clientes(correo) into id_cliente;
--     update
--         clientes
--     set
--         clientes.titulo = titulo,
--         clientes.nom_empr = nombreE,
--         clientes.rfc = RFC        
--     WHERE 
--         clientes.id_clientes = id_cliente;
-- end
-- call Clientes_mod_Dbasicos('ut.nisi@Phasellusfermentum.ca', 'La empresa Fav', 'Ingexis', 'abc123456ef7');
--======================================--
-- create procedure Clientes_mod_direccion(in correo varchar(50), in direccion varchar(100), in cod_pos varchar(10), in colonia varchar(20), in ciudad varchar(30))
-- begin
--     declare id_cliente int;
--     select id_by_correo_Clientes(correo) into id_cliente;
--     UPDATE
--         clientes
--     set
--         clientes.direc = direccion,
--         clientes.cod_pos = cod_pos,
--         clientes.colonia = colonia,
--         clientes.ciudad = ciudad
--     WHERE 
--         clientes.id_clientes = id_cliente;
-- end
-- call Clientes_mod_direccion('ut.nisi@Phasellusfermentum.ca', 'forjadores numero 500 entre banito y alexa', '23085', 'forjadores', 'La Paz');
--======================================--
-- create procedure Clientes_mod_Img(in correo varchar(50), in Img varchar(100))
-- begin   
--     declare id_cliente int;
--     select id_by_correo_Clientes(correo) into id_cliente;
--     update clientes set clientes.img = Img where clientes.id_clientes = id_cliente;
-- end
--======================================--
-- pendientes
--     insertar clientes                ✓✓✓✓✓
--     eliminar clientes                ✓✓✓✓✓
--     lista de tarjetas de clientes    ✓✓✓✓✓
--     Modificacion especifica          ✓✓✓✓
--         +nota                ✓
--         +datos de contacto   ✓
--         +datos basicos       ✓
--         +direccion           ✓ 
--         +img                 