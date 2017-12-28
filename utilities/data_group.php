<?php
    class DataGroup {
        function create_object($name, $link) {
            $obj = new stdClass();
            $obj->name = $name;
            $obj->link = $link;
            return $obj;
        }
        function create_object_of_total_list($total_s_list) {
            $s_index = 0;
            $final_s_list = array();
            foreach ($total_s_list as $s_list) {
                $obj = new stdClass();
                $array_info = get_content($s_list, 'li');
                $obj->name = get_content($array_info[1][0], 'a')[1][0];
                $obj->bse = $array_info[1][1];
                $obj->nse = $array_info[1][2];
                $final_s_list[$s_index] = $obj;
                $s_index++;
            }
            return $final_s_list;
        }
    }
?>