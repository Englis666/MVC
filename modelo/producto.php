<?php

    class Producto{
        private $pdo;

        //ATRIBUTOS QUE VIENEN DE AL BASE DE DATOS
        //SOLO SE DEBEN SER ACCEDIDOS POR LOS MISMOS OBJETOS
        private $pro_id;
        private $pro_nom;
        private $pro_mar;
        private $pro_cos;
        private $pro_pre;
        private $pro_can;
        private $pro_img;

        //SE USA UN MODELO CONSTRUCTOR 
        public function __CONSTRUCT(){
            //SE ASIGNA AL PDO LA BASE DE DATOS
            $this->pdo = BaseDeDatos::Conectar();
        }

        //OBTENCION Y RECOLECCION PARA TRABAJAR LOS ATRIBUTOS DE ARRIBA
        //CON DOS PUNTOS SE PUEDE DECIR QUE TIPO DE DATO SE VA A DEVOLVER
        // ? = NULL O ENTERO
        //SE HACE CON TODOS LOS ATRIBUTOS
        //#1
        public function getPro_id() : ?int{
            return $this->pro_id;
        }
        //VA A INICAIR CON UN PARAMETRO
        public function setPro_id(int $id){
            $this->pro_id=$id;
        }
        //#2
        public function getPro_nom() : ?string{
            return $this->pro_nom;
        }
        //VA A INICAIR CON UN PARAMETRO
        public function setPro_nom(string $nom){
            $this->pro_nom=$nom;
        }
        //#3
        public function getPro_mar() : ?string{
            return $this->pro_mar;
        }
        //VA A INICAIR CON UN PARAMETRO
        public function setPro_mar(string $mar){
            $this->pro_mar=$mar;
        }
        //#4
        public function getPro_cost() : ?float{
            return $this->pro_cost;
        }
        //VA A INICAIR CON UN PARAMETRO
        public function setPro_cost(float $cost){
            $this->pro_cost=$cost;
        }
        //#5
        public function getPro_pre() : ?float{
            return $this->pro_pre;
        }
        //VA A INICAIR CON UN PARAMETRO
        public function setPro_pre(float $pre){
            $this->pro_pre=$pre;
        }
        //#6
        public function getPro_can() : ?int{
            return $this->pro_can;
        }
        //VA A INICAIR CON UN PARAMETRO
        public function setPro_can(int $can){
            $this->pro_can=$can;
        }
        //#7
        public function getPro_img() : ?string{
            return $this->pro_img;
        }
        //VA A INICAIR CON UN PARAMETRO
        public function setPro_img(string $img){
            $this->pro_img=$img;
        }

        //METODO PARA VER LA CANTIDAD
        public function Cantidad(){
            try{
                $consulta = $this->pdo->prepare("SELECT SUM(pro_can) AS Cantidad FROM productos;");
                $consulta->execute();
                return $consulta->fetch(PDO::FETCH_OBJ);
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
        public function Listar(){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM productos;");
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
        public function Insertar(Producto $p){
            try{
                $consulta = "INSERT INTO productos(pro_nom,pro_mar,pro_cost,pro_pre,pro_can) VALUES (? , ? , ? , ? , ? )";
                $this->pdo->prepare($consulta)
                        ->execute(array(
                            $p->getPro_nom(),
                            $p->getPro_mar(),
                            $p->getPro_cost(),
                            $p->getPro_pre(),
                            $p->getPro_can()
                        ));

            }catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
        public function Obtener($id) {
            try {
                // Preparar la consulta
                $consulta = $this->pdo->prepare("SELECT * FROM productos WHERE pro_id = ?;");
                $consulta->execute(array($id));

                // Asignar el resultado a la variable $r
                $r = $consulta->fetch(PDO::FETCH_OBJ);
        
                // Verificar si se obtuvo un resultado
                if ($r) {
                    // Crear un nuevo objeto Producto y asignar valores
                    $p = new Producto();
                    $p->setPro_id($r->pro_id);
                    $p->setPro_nom($r->pro_nom);
                    $p->setPro_mar($r->pro_mar);
                    $p->setPro_cost($r->pro_cost);
                    $p->setPro_pre($r->pro_pre);
                    $p->setPro_can($r->pro_can);
        
                    return $p;
                } else {
                    // Si no se encontró el producto, puedes manejarlo de alguna forma
                    return null; // O lanzar una excepción, o manejar el caso de 'producto no encontrado'
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Actualizar(Producto $p){
            try{
                $consulta = "UPDATE productos SET 
                             pro_nom = ?,
                             pro_mar = ?,
                             pro_cost = ?,
                             pro_pre = ?,
                             pro_can = ?
                             where pro_id = ?;
                             ";
                $this->pdo->prepare($consulta)
                        ->execute(array(
                            $p->getPro_nom(),
                            $p->getPro_mar(),
                            $p->getPro_cost(),
                            $p->getPro_pre(),
                            $p->getPro_can(),
                            $p->getPro_id()
                        ));

            }catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
        public function Eliminar($id){
            try{
                $consulta = "DELETE FROM productos WHERE pro_id = ?;";
                $this->pdo->prepare($consulta)
                        ->execute(array($id));
            }catch(Exception $e)
            {
                die($e->getMessage());
            }
        }


    }


?>