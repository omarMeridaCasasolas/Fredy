<?php
    require_once("conexion.php");
    class Administrativo extends Connexion{
        public function Administrativo(){
            parent::__construct();
        }

        public function cerrarConexion(){
            $this->connexion_bd=null;
        }

        public function obtenerPasswordAdministrativo($usuario){
            $sql="SELECT password_decodificado FROM ADMINISTRATIVO WHERE UPPER(correo_Administrativo)= UPPER(:usser)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":usser"=>$usuario));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $resultado=$resultado[0]['password_decodificado'];
            $sentenceSQL->closeCursor();
            return $resultado;
        }
        public function obtenerPasswordCodificadoAdministrativo($usuario){
            $sql="SELECT password_administrativo FROM ADMINISTRATIVO WHERE UPPER(correo_Administrativo)= UPPER(:usser)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":usser"=>$usuario));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $resultado=$resultado[0]['password_administrativo'];
            $sentenceSQL->closeCursor();
            return $resultado;
        }

        public function obtenerNombreAdministrativo($usuario){
            $sql="SELECT nombre_administrativo  FROM ADMINISTRATIVO WHERE UPPER(correo_Administrativo)= UPPER(:usser)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":usser"=>$usuario));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $resultado=$resultado[0]['nombre_administrativo'];
            $sentenceSQL->closeCursor();
            return $resultado;
        }

        public function obtenerNumeroTelefonicoAdministrativo($usuario){
            $sql="SELECT numero_telefonico  FROM ADMINISTRATIVO WHERE UPPER(correo_Administrativo)= UPPER(:usser)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":usser"=>$usuario));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $resultado=$resultado[0]['numero_telefonico'];
            $sentenceSQL->closeCursor();
            return $resultado;
        }

        public function obtenerCargoAdministrativo($usuario){
            $sql="SELECT cargo_administrativo  FROM ADMINISTRATIVO WHERE UPPER(correo_Administrativo)= UPPER(:usser)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":usser"=>$usuario));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $resultado=$resultado[0]['cargo_administrativo'];
            $sentenceSQL->closeCursor();
            return $resultado;
        }

        public function obtenerSexoAdministrativo($usuario){
            $sql="SELECT sexo  FROM ADMINISTRATIVO WHERE UPPER(correo_Administrativo)= UPPER(:usser)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":usser"=>$usuario));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $resultado=$resultado[0]['sexo'];
            $sentenceSQL->closeCursor();
            return $resultado;
        }

        public function obtenerCIAdministrativo($usuario){
            $sql="SELECT ci_administrativo FROM ADMINISTRATIVO WHERE UPPER(correo_Administrativo)= UPPER(:usser)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":usser"=>$usuario));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $resultado=$resultado[0]['ci_administrativo'];
            $sentenceSQL->closeCursor();
            return $resultado;
        }

        public function actualizarPasswordAdministrativo($nuevoPassword, $correo){
            $sql="UPDATE administrativo SET password_decodificado = :pass WHERE UPPER(correo_administrativo) = UPPER(:correo)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $res=$sentenceSQL->execute(array(":pass"=>$nuevoPassword,":correo"=>$correo));
            $sentenceSQL->closeCursor();
            return $res;
        }

        public function actualizarPasswordCodificadoAdministrativo($PasswordCodificado, $correo){
            $sql="UPDATE administrativo SET password_administrativo = :pass WHERE UPPER(correo_administrativo) = UPPER(:correo) ";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $res=$sentenceSQL->execute(array(":pass"=>$PasswordCodificado,":correo"=>$correo));
            $sentenceSQL->closeCursor();
            return $res;
        }

        public function actualizarTelefonoAdministrativo($telefono,$correo){
            $sql="UPDATE administrativo SET numero_telefonico = :telefono WHERE UPPER(correo_administrativo) = UPPER(:correo)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $res=$sentenceSQL->execute(array(":telefono"=>$telefono,":correo"=>$correo ));
            $sentenceSQL->closeCursor();
            return $res;
        }
        public function actualizarCorreoAdministrativo($nuevoCorreo, $correoAntiguo){
            $sql="UPDATE administrativo SET correo_administrativo = :nuevoCor WHERE UPPER(correo_administrativo) = UPPER(:correoAnt) ";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $res=$sentenceSQL->execute(array(":nuevoCor"=>$nuevoCorreo,":correoAnt"=>$correoAntiguo ));
            $sentenceSQL->closeCursor();
            return $res;
        }
    }
?>