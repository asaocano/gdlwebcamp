<?php 
    function productos_json(&$boletos = 0, &$camisas = 0, &$etiquetas = 0){
    // "&" significa "paso por referencia" y hace que los datos se mantengan intactos y tome los valores originales
    $dias = array(0 => 'un_dia', 1 => 'pase_completo', 2 => 'pase_2dias');
    $total_boletos = array_combine($dias, $boletos);
    $json = array();
    foreach($total_boletos as $key => $boletos):
        if ((int) $boletos > 0) {
            $json[$key] = (int) $boletos;
        }
    endforeach;
    return json_encode($json);
    }  