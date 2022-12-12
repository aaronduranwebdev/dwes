<?php
$array = array(1,
    array("buenos",
        2,
        array(
            array("José",
                "Manuel"),
            "Pérez",
            40),
        "días"),
    3);

doTheThingy($array, 10);

function doTheThingy($input_arr, $sum)
{

    $current = current($input_arr);

    if (!$current)
    {
        return;
    }

    if (is_array($current))
    {
        doTheThingy($current, $sum);
    }
    else if (is_string($current))
    {
        echo flipString($current) . "<br>";
    }
    else if (is_numeric($current))
    {
        echo ($current + $sum) . "<br>";
    }

    next($input_arr);

    doTheThingy($input_arr, $sum);
}

function flipString(string $val)
{
    $lenght = mb_strlen($val);

    if ($lenght == 1)
    {
        return $val;
    }
    else
    {
        $lenght--;

        return flipString(mb_substr($val, 1, $lenght)) . mb_substr($val, 0, 1);
    }
}
?>