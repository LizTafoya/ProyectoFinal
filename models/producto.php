<?php
namespace Model;

//use Model\ActiveRecord;

class producto extends ActiveRecord {
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id', 'Nombre', 'Descripcion', 'Imagen','Existencias','Precioventa','Proveedor'];

    public $id;
    public $Nombre;
    public $Descripcion;
    public $Imagen;
    public $Existencias;
    public $Precioventa;
    public $Proveedor;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->Nombre= $args['Nombre'] ?? '';
        $this->Descripcion= $args['Descripcion'] ?? '';
        $this->Imagen= $args['Imagen'] ?? '';
        $this->Existencias= $args['Existencias'] ?? '';
        $this->Precioventa= $args['Precioventa'] ?? '';
        $this->Proveedor= $args['Proveedor'] ?? '';
        
    }

    public static function all($orden = 'DESC') {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id {$orden}";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function where($columna, $valor) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE $columna = '$valor'";
         $resultado = self::consultarSQL($query);
         return array_shift( $resultado ) ;
     }

     public function sincronizar($args=[]) { 
        foreach($args as $key => $value) {
          if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
          }
        }
    }

    public function actualizar() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Iterar para ir agregando cada campo de la BD
        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        // debuguear($query);

        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function guardar() {
        $resultado = '';
        if(!is_null($this->id)) {
            // actualizar
            $resultado = $this->actualizar();
        } else {
            // Creando un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }


}
?>