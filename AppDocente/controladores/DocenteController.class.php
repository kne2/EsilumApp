<?php 

    require '../EsilumBackEnd/utils/autoloader.php';

    class DocenteController{
        public static function AsignarAsignaturasDocente($grupos){
            $u = new DocenteModelo();
            $u -> id = $_SESSION['usuarioId'];
            $u -> AsignarMateriasDocente($grupos);
            header("Location: /grupos");
        }

        public static function DevolverAsignaturasDocente(){
            $u = new DocenteModelo();
            $u -> id = $_SESSION['usuarioId'];
            return $u -> GetMateriasDeDocente();
        }

        public static function DevolverGruposPorMateria($grupo){
            $u = new DocenteModelo();
            return $u -> GetGrupoPorMateria($grupo);
        }

        public static function MostrarGrupos(){
            session_start();
            if(!isset($_SESSION['autenticado'])) header("Location: /login");
            return generarHtml('grupos',['asignaturas' => DocenteController::DevolverAsignaturasDocente()]);
        }
    }