<?php
echo 'La media de los números es ' . (function() {
    return array_sum(func_get_args()) / func_num_args();
}
)(5,2,3,6,8)
?>