<?php
    class DataGroup {
        function create_object($name, $link) {
            $obj = new stdClass();
            $obj->name = $name;
            $obj->link = $link;
            return $obj;
        }
        function create_internal_object($name, $bse, $nse) {
            $obj = new stdClass();
            $obj->name = $name;
            $obj->bse = $bse;
            $obj->nse = $nse;
            return $obj;
        }
        function create_object_of_total_list($total_s_list) {
            $s_index = 0;
            $final_s_list = new stdClass();
            foreach ($total_s_list as $s_list) {
                $array_info = get_content($s_list, 'li');
                $comp_name = get_content($array_info[1][0], 'a')[1][0];
                $objName = extract_object_name($comp_name);
                $final_s_list->$objName = $this->create_internal_object($comp_name, $array_info[1][1], $array_info[1][2]);
            }
            return $final_s_list;
        }
    }
?>