use databaseingexis;
--======================================--
-- create procedure inf_log(in correo varchar(50))
--     select correo, img_log from log_usuarios where log_usuarios.correo = correo;
--======================================--
create PROCEDURE agregaUsuario(
    in correo       varchar(50), 
    in contra       varchar(20), 
    in img          varchar(100),
    ---------------------------
    in nom1         varchar(20),
    in nom2         varchar(20),
    in ape1         varchar(30),
    in ape2         varchar(30),
    in apodo        varchar(60),
    in num          varchar(30),
    in puest        varchar(25),
    in curp         varchar(18),
    in rfc          varchar(13),
    in calleP       varchar(20),
    in entre        varchar(50),
    in numcasa      varchar(10),
    in colonia      varchar(20),
    in codPostal    varchar(20)
)
BEGIN
    INSERT Log_usuarios (log_usuarios.correo, log_usuarios.contra, log_usuarios.img_log) values (correo, contra, img);
    if apodo = '' then
        set apodo = CONCAT(nom1, ' ', nom2);
    end if;
    INSERT usuarios values(last_insert_id(), nom1, nom2, ape1, ape2, apodo, num, puest, curp, rfc, calleP, entre, numcasa, colonia, codPostal);
END
--======================================--
-- create PROCEDURE eliminar_usuario(in correo varchar(50))
-- begin
--     declare id int;
--     SELECT id_by_correo(correo) into id;
--     delete from usuarios where usuarios.id_usuario = id;
--     DELETE from log_usuarios where log_usuarios.correo = correo;
-- end
--======================================--
-- create PROCEDURE listaTargetaUsuario()
--     select * from dat_tar_Usuarios;
--======================================--
-- create PROCEDURE Targeta_Especifica_Usuario(in correo varchar(50))
--     select * from dat_tar_Usuarios where correo = dat_tar_Usuarios.correo;
--======================================--
-- pendientes:
--     vista especifica de usuario
--     modificar usuarios (por seccion)
--======================================--