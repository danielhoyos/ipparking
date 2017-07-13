<?php

     class UsuarioModel implements IModel {

         private $conexion;
         private $table = "tbl_usuario";
         private $nameEntity = "Usuario";

         function __construct() {
             $this->conexion = SPDO::singleton();
         }

         public function delete($obj) {
             
         }

         public function get($obj = null) {
             
         }

         public function getById($obj) {
             $retorno = new stdClass();
             try {
                 $obj instanceof Usuario;
                 $sql = "SELECT * FROM {$this->table} INNER JOIN tbl_persona "
                  . "ON {$this->table}.per_id = tbl_persona.per_id  WHERE {$this->table}.usu_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getUsu_id());
                 $query->execute();

                 $retorno->data = $query->fetchObject($this->nameEntity);
                 $retorno->status = 200;
                 $retorno->msg = "Usuario Encontrado Exitosamente";
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }
             return $retorno;
         }

         public function insert($obj) {
             $retorno = new stdClass();
             try {
                 $personaModel = new PersonaModel();
                 $r = $personaModel->insert($obj);
                 if ($r->status == 200) {
                     $obj instanceof Usuario;
                     $obj->setPer_id($r->data);
                     $sql = "INSERT INTO {$this->table} VALUES(null,?,?,null, null,?,?,?,?)";
                     $query = $this->conexion->prepare($sql);
                     @$query->bindParam(1, $obj->getUsu_usuario());
                     @$query->bindParam(2, $obj->getUsu_password());
                     @$query->bindParam(3, $obj->getUsu_estado());
                     @$query->bindParam(4, $obj->getUsu_fecha_registro());
                     @$query->bindParam(5, $obj->getPer_id());
                     @$query->bindParam(6, $obj->getRol_id());
                     $query->execute();
                     $retorno->data = $this->conexion->lastInsertId();
                     $retorno->status = 200;
                     $retorno->msg = "Usuario insertado.";
                 } else {
                     $retorno = $r;
                 }
             } catch (PDOException $e) {
                 $retorno->msg = $e->getMessage();
                 $retorno->status = 501;
             }
             return $retorno;
         }

         public function update($obj) {
             
         }

         public function validarUsuario(Usuario $usuario) {
             $retorno = new stdClass();
             try {
                 $sql = "SELECT * FROM {$this->table} INNER JOIN tbl_persona "
                  . "ON {$this->table}.per_id = tbl_persona.per_id WHERE usu_usuario=? and usu_password=? AND rol_id <> 4";

                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $usuario->getUsu_usuario());
                 @$query->bindParam(2, $usuario->getUsu_password());
                 $query->execute();
                 $retorno->data = $query->fetchObject($this->nameEntity);
                 $retorno->status = 200;
                 if (!$retorno->data instanceof $this->nameEntity) {
                     $retorno->status = 201;
                     $retorno->msg = "{$this->nameEntity} no encontrado. Verifique Intente nuevamente";
                 } else {
                     $retorno->msg = "Bienvenido a IPPARKING {$retorno->data->per_nombre}";
                 }
             } catch (PDOException $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }
             return $retorno;
         }

         public function updateAvatar(Usuario $usuario) {
             $retorno = new stdClass();
             try {
                 $sql = "UPDATE {$this->table} SET usu_avatar = ? WHERE usu_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $usuario->getUsu_avatar());
                 @$query->bindParam(2, $usuario->getUsu_id());
                 $query->execute();
                 $retorno->data = $query->fetchObject($this->nameEntity);
                 $retorno->status = 200;
                 $retorno->msg = "Avatar actualizado correctamente";
             } catch (PDOException $e) {
                 $retorno->msg = $e->getMessage();
                 $retorno->status = 501;
             }
             return $retorno;
         }

         public function updatePortada(Usuario $usuario) {
             $retorno = new stdClass();
             try {
                 $sql = "UPDATE {$this->table} SET usu_portada = ? WHERE usu_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $usuario->getUsu_portada());
                 @$query->bindParam(2, $usuario->getUsu_id());
                 $query->execute();
                 $retorno->data = $query->fetchObject($this->nameEntity);
                 $retorno->status = 200;
                 $retorno->msg = "Portada actualizada correctamente";
             } catch (PDOException $e) {
                 $retorno->msg = $e->getMessage();
                 $retorno->status = 501;
             }
             return $retorno;
         }

         public function updateEstado(Usuario $usuario) {
             $retorno = new stdClass();
             try {
                 $sql = "UPDATE {$this->table} SET usu_estado = ? WHERE usu_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $usuario->getUsu_estado());
                 @$query->bindParam(2, $usuario->getUsu_id());
                 $query->execute();
                 $retorno->data = $query->fetchObject($this->nameEntity);
                 $retorno->status = 200;
                 $retorno->msg = "Estado actualizado correctamente";
             } catch (PDOException $e) {
                 $retorno->msg = $e->getMessage();
                 $retorno->status = 501;
             }
             return $retorno;
         }

         public function buscarUsuario(Usuario $usuario) {
             $retorno = new stdClass();
             try {
                 $sql = "

SELECT *  FROM {$this->table} WHERE usu_usuario = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $usuario->getUsu_usuario());
                 $query->execute();
                 $retorno->data = $query->fetchObject($this->nameEntity);

                 if (!$retorno->data instanceof $this->nameEntity) {
                     $retorno->status = 201;
                     $retorno->msg = "Usuario disponible";
                 } else {
                     $retorno->status = 200;
                     $retorno->msg = "Usuario no disponible";
                 }
             } catch (PDOException $e) {
                 $retorno->msg = $e->getMessage();
                 $retorno->status = 501;
             }
             return $retorno;
         }

         public function buscarCorreo(Usuario $usuario) {
             $retorno = new stdClass();
             try {
                 $sql = "SELECT *  FROM {$this->table} INNER JOIN tbl_persona ON {$this->table}.per_id = tbl_persona.per_id  WHERE per_correo = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $usuario->getPer_correo());
                 $query->execute();
                 $retorno->data = $query->fetchObject($this->nameEntity);

                 if (!$retorno->data instanceof $this->nameEntity) {
                     $retorno->status = 201;
                     $retorno->msg = "Usuario encontrado";
                 } else {
                     $retorno->status = 200;
                     $retorno->msg = "Usuario no encontrado";
                 }
             } catch (PDOException $e) {
                 $retorno->msg = $e->getMessage();
                 $retorno->status = 501;
             }
             return $retorno;
         }

         public function updateUser(Usuario $usuario) {
             $retorno = new stdClass();
             try {
                 $personaModel = new PersonaModel();
                 $r = $personaModel->update($usuario);
                 if ($r->status === 200) {

                     $sql = "UPDATE {$this->table} SET "
                      . "usu_usuario = ? "
                      . "WHERE usu_id = ?";

                     $query = $this->conexion->prepare($sql);

                     @$query->bindParam(1, $usuario->getUsu_usuario());
                     @$query->bindParam(2, $usuario->getUsu_id());
                     $query->execute();
                     
                     $retorno->status = 200;
                     $retorno->msg = "Usuario actualizado exitosamente.";
                 } else {
                     $retorno = $r;
                 }
             } catch (PDOException $e) {
                 $retorno->msg = $e->getMessage();
                 $retorno->status = 501;
             }
             return $retorno;
         }

         public function buscarPassword(Usuario $usuario) {
             $retorno = new stdClass();
             try {
                 $sql = "SELECT * FROM {$this->table} WHERE usu_id = ? and usu_password = ?";

                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $usuario->getUsu_id());
                 @$query->bindParam(2, $usuario->getUsu_password());
                 $query->execute();

                 $retorno->data = $query->fetchObject($this->nameEntity);
                 if (!$retorno->data instanceof $this->nameEntity) {
                     $retorno->status = 201;
                     $retorno->msg = "Password incorrecto";
                 } else {
                     $retorno->msg = "Password correcto";
                     $retorno->status = 200;
                 }
             } catch (PDOException $e) {
                 $retorno->msg = $e->getMessage();
                 $retorno->status = 501;
             }
             return $retorno;
         }

         public function updatePassword(Usuario $usuario) {
             $retorno = new stdClass();
             try {

                 $sql = "UPDATE {$this->table} SET usu_password=? WHERE usu_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $usuario->getUsu_password());
                 @$query->bindParam(2, $usuario->getUsu_id());
                 $query->execute();
                 $retorno->data = $query->fetchObject($this->nameEntity);
                 $retorno->msg = "Password Editado Correctamente";
                 $retorno->status = 200;
             } catch (PDOException $e) {
                 $retorno->msg = $e->getMessage();
                 $retorno->status = 501;
             }
             return $retorno;
         }

         public function resetPassword(Usuario $usuario) {
             $retorno = new stdClass();
             try {

                 $sql = "UPDATE {$this->table} SET usu_password=?, usu_estado=? WHERE usu_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $usuario->getUsu_password());
                 @$query->bindParam(2, $usuario->getUsu_estado());
                 @$query->bindParam(3, $usuario->getUsu_id());
                 $query->execute();
                 $retorno->data = $query->fetchObject($this->nameEntity);
                 $retorno->msg = "Password Editado Correctamente";
                 $retorno->status = 200;
             } catch (PDOException $e) {
                 $retorno->msg = $e->getMessage();
                 $retorno->status = 501;
             }
             return $retorno;
         }

         public function validarCliente(Usuario $usuario) {
             $retorno = new stdClass();
             try {
                 $usuario instanceof Usuario;
                 $sql = "SELECT * FROM {$this->table} INNER JOIN tbl_persona ON {$this->table}.per_id = tbl_persona.per_id "
                      . "WHERE usu_usuario=? AND usu_password=? AND rol_id=4";

                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $usuario->getUsu_usuario());
                 @$query->bindParam(2, $usuario->getUsu_password());
                 $query->execute();
                 
                 $retorno->data = $query->fetchObject($this->nameEntity);
                 
                 if ($retorno->data instanceof $this->nameEntity) {
                     $retorno->status = 200;
                     $retorno->msg = "Bienvenido a IPPARKING {$retorno->data->per_nombre}";
                 } else {
                     $retorno->status = 201;
                     $retorno->msg = "{$this->nameEntity} no encontrado. Verifique Intente nuevamente";
                 }
             } catch (PDOException $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }
             return $retorno;
         }
     }