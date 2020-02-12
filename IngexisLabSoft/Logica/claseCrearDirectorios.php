<?php
    class CreacionDirectorios{
        //declaracion de variables
        //========================
        public function CrearDirectorioUsuario($Usuario)
        {
            mkdir ('C:\wamp64\www\SunriseDevelopment\DesarrollodeSoftware\IngexisLabSoft\DT-US\\'.$Usuario, 0700);
            return 'C:\wamp64\www\SunriseDevelopment\DesarrollodeSoftware\IngexisLabSoft\DT-US\\'.$Usuario;
        }

        //#########################################################################################

        public function EliminarDirectorioConContenido($carpeta)
        {
            foreach(glob($carpeta . "/*") as $archivos_carpeta)
            {
                if (is_dir($archivos_carpeta))
                {
                    EliminarDirectorioConContenido($archivos_carpeta);
                }else 
                {
                    unlink($archivos_carpeta);
                }
            }
            rmdir($carpeta);
        }

        //#########################################################################################

        public function EliminarUnArchivo($Archivo)
        {
            unlink($Archivo);
        }
    }
?>