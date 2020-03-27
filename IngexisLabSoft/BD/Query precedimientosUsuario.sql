use databaseingexis;
--======================================--
create procedure inf_log(in correo varchar(50))
    select correo, img_log from log_usuarios where log_usuarios.correo = correo;
--======================================--
call inf_log('jesus120190240.8@gmail.com')
--======================================--