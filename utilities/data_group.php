<?php
    function create_object($name, $link) {
        $obj = new stdClass();
        $obj->name = $name;
        $obj->link = $link;
        return $obj;
    }
?>