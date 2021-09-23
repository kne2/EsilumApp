<?php 
    require '../EsilumBackEnd/utils/autoloader.php';

    class AlumnoController{
        public static function AsignarGruposAlumno($grupos){
            $u = new UserModelo();
            $u -> id = $_SESSION['usuarioId'];
            $u -> AsignarGruposAlumno($grupos);
            header("Location: /grupos");
        }

        public static function DevolverGruposDeAlumno(){
            $u = new UserModelo();
            $u -> id = $_SESSION['usuarioId'];
            return $u -> GetGruposDeAlumno();
        }

        public static function DevolverMateriasPorGrupo($grupo){
            $u = new AlumnoModelo();
            return $u -> GetMateriasPorGrupo($grupo);
        }
    }
    