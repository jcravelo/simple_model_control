<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expedientes extends CI_Controller
{
    
    function index()
    {
        
    }

    function dataRepoExp()
    {
    	$columnas = array ("id","codigo_expediente","fecha_solicitud","nombre_solicitante","nombre_propietario","tipo_proyecto","uso","fecha_salida","direccion_proyecto","sector","fase","estatus");
        if($this->input->get("sEcho") > 1){$sEcho=$this->input->get("sEcho");}else{$sEcho = 1;}
        if($this->input->get("iColumns") > 1){$iColumns=$this->input->get("iColumns");}else{$iColumns = 10;}
        if($this->input->get("iDisplayLength") > 1){$iDisplayLength=$this->input->get("iDisplayLength");}else{$iDisplayLength = 10;}        
        echo $this->Expedientes_Model->dataTableJs("tramitacion",$columnas,$this->input->get("sSearch"),$sEcho,$this->input->get('iDisplayLength'),$this->input->get('iDisplayStart'),$this->input->get("iSortCol_0"),$this->input->get("sSortDir_0"));
    }
}
?>