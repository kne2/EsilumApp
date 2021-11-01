<?php 
    require '../EsilumBackEnd/utils/autoloader.php';

    class AlumnoModelo extends Modelo{
        public $id;
        public $nombre;
        public $apellido;
        public $password;
        public $email;
        public $avatar;
        public $tipodeusuario;

        
        public function AsignarGruposAlumno($nuevosgrupos){
            $grupos = $this -> getGrupos();
            $gruposviejos = $this -> GetGruposDeAlumno();
            foreach($grupos as $key => $valor){
                foreach($nuevosgrupos as $grupoalumno){
                    if ($key == $grupoalumno){
                        $grupos[$key] = True;
                    }
                }
            }
            foreach($grupos as $key => $valor){
                if($valor){
                    if(!($gruposviejos[$key])){
                        $this -> asignarGrupo($key);
                    }
                }
                else{
                    if(($gruposviejos[$key])){
                        $this -> eliminarDeGrupo($key);
                    } 
                }
            }
        }

        public function GetGruposDeAlumno(){
            $grupos = $this -> getGrupos();
            $sql = 'SELECT nombreGrupo FROM alumnoAnotaGrupo WHERE userId = ? ORDER BY nombreGrupo';
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("s", $this -> id);
            $this -> sentencia -> execute();

            $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
            foreach($grupos as $key => $valor){
                foreach($resultado as $grupoalumno){
                    if ($key == $grupoalumno['nombreGrupo']){
                        $grupos[$key] = True;
                    }
                }
            }
            return $grupos;
        }

        public function GetGruposAprovadosDeAlumno(){
            $grupos = $this -> getGrupos();
            $sql = 'SELECT nombreGrupo FROM alumnoAnotaGrupo WHERE aprovado="true" and userId = ? ORDER BY nombreGrupo';
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("s", $this -> id);
            $this -> sentencia -> execute();

            $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
            foreach($grupos as $key => $valor){
                foreach($resultado as $grupoalumno){
                    if ($key == $grupoalumno['nombreGrupo']){
                        $grupos[$key] = True;
                    }
                }
            }
            return $grupos;
        }

        private function getGrupos(){
            $grupos = array();
            $sql = "SELECT nombreGrupo FROM grupo ORDER BY nombreGrupo";
            foreach($this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC) as $fila){
                $grupos[$fila['nombreGrupo']] = False;
            }
            return $grupos;
        }

        private function eliminarDeGrupo($grupo){
            $sql = "DELETE FROM alumnoAnotaGrupo WHERE userId = ? and nombreGrupo = ?";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("ss", $this -> id, $grupo);
            $this -> sentencia -> execute();
        }

        private function asignarGrupo($grupo){
            $false = "false";
            $sql = "INSERT INTO alumnoAnotaGrupo(userId,nombreGrupo,aprovado) VALUES (?,?,?)";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("sss",
                $this -> id,
                $grupo,
                $false
            );
            $this -> sentencia -> execute();
        }

        public function GetMateriasPorGrupo($grupo){
            $materias = array();
            $sql = "SELECT nombreAsignatura FROM grupoTieneAsignatura WHERE nombreGrupo = '". $grupo . "' ORDER BY nombreAsignatura";
            foreach($this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC) as $fila){
                $materias[$fila['nombreAsignatura']] = False;
            }
            return $materias;
        }
    }

