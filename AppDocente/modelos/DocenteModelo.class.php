<?php 
    require '../EsilumBackEnd/utils/autoloader.php';

    class DocenteModelo extends Modelo{
        public $id;
        public $nombre;
        public $apellido;
        public $password;
        public $email;
        public $avatar;
        public $tipodeusuario;

        
        public function AsignarMateriasDocente($nuevasasignaturas){
            $asignaturas = $this -> getMaterias();
            $asignaturasviejas = $this -> GetMateriasDeDocente();
            foreach($asignaturas as $key => $valor){
                foreach($nuevasasignaturas as $asignaturadocente){
                    if ($key == $asignaturadocente){
                        $asignaturas[$key] = True;
                    }
                }
            }
            foreach($asignaturas as $key => $valor){
                if($valor){
                    if(!($asignaturasviejas[$key])){
                        $this -> asignarMateria($key);
                    }
                }
                else{
                    if(($asignaturasviejas[$key])){
                        $this -> eliminarDeMateria($key);
                    } 
                }
            }
        }

        public function GetMateriasDeDocente(){
            $asignaturas = $this -> getMaterias();
            $sql = 'SELECT nombreAsignatura FROM docenteAnotaAsignatura WHERE aprovado="true" AND userId = ? ORDER BY nombreAsignatura';
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("s", $this -> id);
            $this -> sentencia -> execute();

            $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
            foreach($asignaturas as $key => $valor){
                foreach($resultado as $asignaturadocente){
                    if ($key == $asignaturadocente['nombreAsignatura']){
                        $asignaturas[$key] = True;
                    }
                }
            }
            return $asignaturas;
        }

        private function getMaterias(){
            $asignaturas = array();
            $sql = "SELECT nombreAsignatura FROM asignatura ORDER BY nombreAsignatura";
            foreach($this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC) as $fila){
                $asignaturas[$fila['nombreAsignatura']] = False;
            }
            return $asignaturas;
        }

        private function eliminarDeMateria($materia){
            $sql = "DELETE FROM docenteAnotaAsignatura WHERE userId = ? and nombreAsignatura = ?";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("ss", $this -> id, $materia);
            $this -> sentencia -> execute();
        }

        private function asignarMateria($materia){
            $false = "false";
            $sql = "INSERT INTO docenteAnotaAsignatura(userId,nombreAsignatura,aprovado) VALUES (?,?,?)";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("sss",
                $this -> id,
                $materia,
                $false
            );
            $this -> sentencia -> execute();
        }

        public function GetGrupoPorMateria($materia){
            $materias = array();
            $sql = "SELECT nombreAsignatura FROM grupoTieneAsignatura WHERE nombreGrupo = '". $materia . "' ORDER BY nombreAsignatura";
            foreach($this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC) as $fila){
                $materias[$fila['nombreAsignatura']] = False;
            }
            return $materias;
        }
    }

