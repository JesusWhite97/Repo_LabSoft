use databaseingexis;
--======================================--
-- create table Log_usuarios(
--     id_usuario      int             primary key     not null    AUTO_INCREMENT,
--     correo          varchar(50),
--     contra          varchar(20),
--     img_log         VARCHAR(100)
-- );
--======================================--
create table usuarios(
    id_usuario      int             not null,
    nombre1         varchar(20),
    nombre2         varchar(20),
    Primer_ape      varchar(30),
    Segund_ape      varchar(30),
    --informacion---------------
    Num_contacto    varchar(30),
    puesto          VARCHAR(10),
    Curp            varchar(18),
    rfc             varchar(13),
    --direccion-----------------
    calleP          varchar(20),
    Entrecalles     varchar(50),
    numero          varchar(10),
    colonia         varchar(20),
    cod_postal      varchar(10),
    --ralaciones ETC------------
    FOREIGN key(id_usuario) REFERENCES Log_usuarios(id_usuario)
);
--======================================--
