<?php
    class ExtractCode {
        function init_extract($total_list, $s_axis_list) {
            foreach ($s_axis_list as $stock) {
                $search_name = extract_object_name($stock->name);
                echo $stock->name . '<br />';
                echo $total_list->$search_name->name . '<br /><br /><br />';
            }
        }
    }
    
?>