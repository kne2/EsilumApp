<?php 
    require '../EsilumBackEnd/utils/autoloader.php';

    class AdminController{
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

        public static function DevolverMateriasPorGrupo($grupo){
            $a = new AlumnoModelo();
            return $a -> GetMateriasPorGrupo($grupo);
        }

        public static function MostrarGrupos(){
            session_start();
            if(!isset($_SESSION['autenticado'])) header("Location: /login");
            return generarHtml('grupos',['grupos' => AlumnoController::DevolverGruposDeAlumno()]);
        }

        public static function AprovarMateria($id,$materia){
            $a = new AdminModelo();
            $a -> AprovarAsignaturaDocente($id,$materia);
            header("Location: /asignaturaspendientes");
            return;
        }

        public static function AprovarGrupo($id,$grupo){
            $a = new AdminModelo();
            $a -> AprovarGrupoAlumno($id,$grupo);
            header("Location: /grupospendientes");
            return;
        }

        public static function AprovarUsuario($id){
            $a = new AdminModelo();
            $a -> AprovarUsuario($id);
            header("Location: /usuariospendientes");
            return;
        }

        public static function DenegarMateria($id,$materia){
            $a = new AdminModelo();
            $a -> DenegarAsignaturaDocente($id,$materia);
            header("Location: /asignaturaspendientes");
            return;
        }

        public static function DenegarGrupo($id,$grupo){
            $a = new AdminModelo();
            $a -> DenegarGrupoAlumno($id,$grupo);
            header("Location: /grupospendientes");
            return;
        }

        public static function DenegarUsuario($id){
            $a = new AdminModelo();
            $a -> DenegarUsuario($id);
            header("Location: /usuariospendientes");
            return;
        }

        public static function EliminarUsuario($id){
            $a = new AdminModelo();
            $a -> DenegarUsuario($id);
            header("Location: /listarusuarios");
            return;
        }

        public static function DevolverMaterias(){
            $a = new AdminModelo();
            return $a -> getMaterias();
        }

        public static function DevolverGruposNoAprovados(){
            $a = new AdminModelo();
            return $a -> GruposNoAprovados();
        }

        public static function DevolverAsignaturasNoAprovadas(){
            $a = new AdminModelo();
            return $a -> AsignaturasNoAprovadas();
        }

        public static function DevolverUsuariosNoAprovados(){
            $a = new AdminModelo();
            return $a -> UsuariosNoAprovados();
        }

        public static function DevolverListaDeUsuarios(){
            $a = new AdminModelo();
            return $a -> GetListaDeUsuarios();
        }
    }
    