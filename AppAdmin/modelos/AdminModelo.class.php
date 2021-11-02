<?php 
    require '../EsilumBackEnd/utils/autoloader.php';

    class AdminModelo extends Modelo{
        public $id;
        public $nombre;
        public $apellido;
        public $password;
        public $email;
        public $avatar;
        public $tipodeusuario;

        
        public function AprovarUsuario($id){
            $sql = "UPDATE user set aprovado = 'true' WHERE id=?";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("s",
                $id
            );
            $this -> sentencia -> execute();
        }

        public function AprovarAsignaturaDocente($id,$asignatura){
            $sql = "UPDATE docenteAnotaAsignatura set aprovado = 'true' WHERE userId=? AND nombreAsignatura=?";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("ss",
                $id,
                $asignatura
            );
            $this -> sentencia -> execute();
        }

        public function AprovarGrupoAlumno($id,$grupo){
            $sql = "UPDATE alumnoAnotaGrupo set aprovado = 'true' WHERE userId=? AND nombreGrupo=?";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("ss",
                $id,
                $grupo
            );
            $this -> sentencia -> execute();
        }

        public function DenegarUsuario($id){
            $sql = "DELETE FROM user WHERE id=?";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("s",
                $id
            );
            $this -> sentencia -> execute();
        }

        public function DenegarAsignaturaDocente($id,$asignatura){
            $sql = "DELETE FROM docenteAnotaAsignatura WHERE userId=? AND nombreAsignatura=?";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("ss",
                $id,
                $asignatura
            );
            $this -> sentencia -> execute();
        }

        public function DenegarGrupoAlumno($id,$grupo){
            $sql = "DELETE FROM alumnoAnotaGrupo WHERE userId=? AND nombreGrupo=?";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("ss",
                $id,
                $grupo
            );
            $this -> sentencia -> execute();
        }

        public function GetListaDeUsuarios(){
            $usuarios = array();
            $sql = "SELECT id,nombre,apellido FROM user";
            foreach($this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC) as $fila){
                $m = array();
                $m['id'] = $fila['id'];
                $m['nombre'] = $fila['nombre'];
                $m['apellido'] = $fila['apellido'];
                array_push($usuarios,$m);
            }
            return $usuarios;
        }

        public function UsuariosNoAprovados(){
            $usuarios = array();
            $sql = "SELECT id,nombre,apellido FROM user WHERE aprovado='false'";
            foreach($this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC) as $fila){
                $m = array();
                $m['id'] = $fila['id'];
                $m['nombre'] = $fila['nombre'];
                $m['apellido'] = $fila['apellido'];
                array_push($usuarios,$m);
            }
            return $usuarios;
        }

        public function GruposNoAprovados(){
            $usuarios = array();
            $sql = "SELECT userId,nombreGrupo FROM alumnoAnotaGrupo WHERE aprovado='false'";
            foreach($this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC) as $fila){
                $m = array();
                $m['userId'] = $fila['userId'];
                $m['nombreGrupo'] = $fila['nombreGrupo'];
                array_push($usuarios,$m);
            }
            return $usuarios;
        }

        public function AsignaturasNoAprovadas(){
            $usuarios = array();
            $sql = "SELECT userId,nombreAsignatura FROM docenteAnotaAsignatura WHERE aprovado='false'";
            foreach($this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC) as $fila){
                $m = array();
                $m['userId'] = $fila['userId'];
                $m['nombreAsignatura'] = $fila['nombreAsignatura'];
                array_push($usuarios,$m);
            }
            return $usuarios;
        }

        public function GetMateriasPorGrupo($grupo){
            $materias = array();
            $sql = "SELECT nombreAsignatura FROM grupoTieneAsignatura WHERE nombreGrupo = '". $grupo . "' ORDER BY nombreAsignatura";
            foreach($this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC) as $fila){
                $materias[$fila['nombreAsignatura']] = False;
            }
            return $materias;
        }

        public function getMaterias(){
            $asignaturas = array();
            $sql = "SELECT nombreAsignatura FROM asignatura ORDER BY nombreAsignatura";
            foreach($this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC) as $fila){
                $asignaturas[$fila['nombreAsignatura']] = False;
            }
            return $asignaturas;
        }
    }

