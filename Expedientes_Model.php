<?php
/*
*  @Autor:         Julio C. Soriano.
*  @Fecha:         02/02/2015.
*  @Info:          Datos para expedientes
*  @Parametros:    Array data con los datos a guardar
*  @Return:        --
*/
class Expedientes_Model extends CI_Model
{
    //inicializa las funciones para base de datos.
    function __construct() 
    {
        parent::__construct();
    }

    //carga los datos solicitados para el dataTableJs
    function dataTableJs($tabla='',$columnas='',$sSearch='',$sEcho=1,$iDisplayLength=10,$iDisplayStart=0,$iSortCol_0=0,$sSortDir_0)
    {
        $count_all = $this->db->count_all($tabla);
        $this->db->select(implode($columnas,','));  

        //Si tienee un valor sSearch entonces busca por cualquiera de los campos a ver si existe
        if($sSearch != '')
        {
            foreach($columnas as $key => $val)
            {
                if($key == 0){
                    $this->db->like($val,$sSearch);
                }else{
                    $this->db->or_like($val,$sSearch);
                }                
            }
        }
        $this->db->order_by($columnas[$iSortCol_0],$sSortDir_0); 
        $this->db->limit($iDisplayLength,$iDisplayStart);
        $query = $this->db->get($tabla);
        //Retorno da datos en Json
        $output = array
        (
            "sEcho" => $sEcho,
            "iTotalRecords" => $count_all,
            "iTotalDisplayRecords" => $count_all,
            "aaData" => $query->result()
        );
        return json_encode($output);
    }
}