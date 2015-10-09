<?php

namespace Invision\SoporteBundle\Model;

use Invision\SoporteBundle\Model\om\BaseBitacora;

class Bitacora extends BaseBitacora {
    
    public static function escribir($username, $ip, $descripcion, $estado, $tabla, $datoTabla, $error, $datoError, $sede) {
        $bitacora = new Bitacora();        
        $bitacora->setDescripcion($descripcion);
        $bitacora->setEstado($estado);
        $bitacora->setFechaHora(date('Y-m-d H:i:s'));
        $bitacora->setTabla($tabla);
        $bitacora->setDatoTabla($datoTabla);
        $bitacora->setError($error);
        $bitacora->setDatoError($datoError);
        $bitacora->setDireccion($ip);
        $bitacora->setUsuario($username);
        $bitacora->setSedeId($sede);
        $bitacora->save();
    }
}
