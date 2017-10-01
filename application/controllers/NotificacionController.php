<?php

/**
 * Description of NotificacionController
 *
 * @author edeveloper
 */
class NotificacionController extends CI_Controller {
    
     public function notificacion_automatica() {
        date_default_timezone_set('America/Bogota');
        $vencido = $this->notifica->cantidadVencidos();
        $agotado = $this->notifica->cantidadAgotados();
        $porAgotarse = $this->notifica->cantidadXAgotarse();
        $envio = $this->notifica->ObtenerCorreoAdmin()->email;
        $this->email->from('immerpro2018@gmail.com', 'ImmerPRO');
        $this->email->to($envio);
        $this->email->bcc('immerpro2018@gmail.com');
        $this->email->subject('ImmerPRO - Notificaciones-' . date("d F Y h:i a"));
        $this->email->message('  <strong> <font size="3" color="grey"> productos vencidos:</strong> ' . $vencido->cantVencido . '</font><br>'
                . ' <strong><font size="3" color="red"> productos Agotados:</font></strong> ' . $agotado->agotados . '<br>'
                . ' <strong><font size="3" color="orange"> Producto Proximo a  Agotarse :</font></strong> ' . $porAgotarse->cuantoAgotarse . ' se sugiere realize un pedido de los productos <br>'
                . ' <font size="3" color="green">Para ver la informacion de los  productos notificados dar click en el siguiente link: </font> <a href="' . base_url() . 'iniciar">Iniciar Sesiòn </a>'.br(8).''
                 . '<img src="'. base_url().'public/img/immerpro.png" alt="Proyecto_Immerpro" height="200" width="200" >');

        if ($this->email->send()) {
            return TRUE;
        } else {
            return FALSE; 
        }
    }
   
}
