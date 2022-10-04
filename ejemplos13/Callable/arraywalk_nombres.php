<?php
$array = array('Pepe', 'juan', 'fran', 'jose', 'julián');

function primeraMayus(&$item)
{
    if (is_string($item))
    {
        $item = strtoupper(substr($item, 0, 1)) . substr($item, 1);
    }
}
echo "<pre>";
print_r($array);
echo "</pre>";
array_walk($array, 'primeraMayus');
echo "<pre>";
print_r($array);
echo "</pre>";
?>