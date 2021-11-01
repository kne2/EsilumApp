<?php 
    require '../EsilumBackEnd/utils/autoloader.php';

    class AlumnoController{
        public static function AsignarGruposAlumno($grupos){
            $a = new AlumnoModelo();
            $a -> id = $_SESSION['usuarioId'];
            $a -> AsignarGruposAlumno($grupos);
            header("Location: /grupos");
        }

        public static function DevolverGruposDeAlumno(){
            $a = new AlumnoModelo();
            $a -> id = $_SESSION['usuarioId'];
            return $a -> GetGruposDeAlumno();
        }

        public static function DevolverGruposAprovadosDeAlumno(){
            $a = new AlumnoModelo();
            $a -> id = $_SESSION['usuarioId'];
            return $a -> GetGruposAprovadosDeAlumno();
        }

        public static function DevolverMateriasPorGrupo($grupo){
            $a = new AlumnoModelo();
            return $a -> GetMateriasPorGrupo($grupo);
        }

        public static function MostrarGrupos(){
            session_start();
            if(!isset($_SESSION['autenticado'])) header("Location: /login");
            return generarHtml('grupos',['grupos' => AlumnoController::DevolverGruposDeAlumno()]);
        }
    }
    