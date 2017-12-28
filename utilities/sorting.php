<?php
    function f_usort($sorting_array) {
        usort($sorting_array, "my_sort");
        return $sorting_array;
    }
    function my_sort($a,$b) {
        if ($a==$b) return 0;
        return ($a<$b)?-1:1;
    }
?>