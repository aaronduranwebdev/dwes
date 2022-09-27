<?php

    function quitarMenoresLimite(array $numeros, int $limite){
        $final = array();
        for ($i=0; $i < count($numeros); $i++) { 
            if ($numeros[$i] < $limite) {
                array_push($final, $numeros[$i]);
            }
        }
        return $final;
    }
    print_r(quitarMenoresLimite(array(5,6,3,5,8,4,2,1,5,7,4,8),5));
?>