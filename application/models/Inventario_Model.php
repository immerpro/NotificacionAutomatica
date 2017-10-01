<?php

class Inventario_Model extends CI_Model {

    Public function __construct() {
        parent::__construct();
    }
    //    NOTIFICACIONES
    // saber cuantos productos estan  agotados
    public function cantidadAgotados() {
        $cuantoAgotado = $this->db->query("select count(existencia) agotados from productosview pv where existencia = 0");
        return $cuantoAgotado->row();
    }
    // saber cuantos productos estan vencidos   SELECT minimoStock FROM producto
    public function cantidadVencidos() {
        $cuantovencido = $this->db->query("SELECT COUNT(producto) AS cantVencido FROM vencidosview WHERE dvencimiento <= 0");
        return $cuantovencido->row();
    }
   
// CUANTOS PRODUCTOS ESTAN POR AGOTARSE
    public function cantidadXAgotarse() {
        $agotarse = $this->db->query(" SELECT COUNT(vp.codProducto) AS cuantoAgotarse FROM productosview  vp WHERE existencia <= 12");
        return $agotarse->row();
    }

// CUANTAS EXISTENCIAS HAY EN EL INVENTARIO
    public function cantidadExistencia() {
        $cantExist = $this->db->query(" select count(existencia) as ExistenciaTotal from productos ");
        return $cantExist->row();
    }

    public function ObtenerCorreoAdmin() {
        $this->db->select("email");
        $this->db->from("usuario");
        $this->db->where("idUsuario", "1");
        $consulta = $this->db->get();
        return $consulta->row();

    }

}
