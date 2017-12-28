<?php
    function get_content( $string, $tagname ) {
        $pattern = "#<\s*?$tagname\b[^>]*>(.*?)</$tagname\b[^>]*>#s";
        preg_match_all($pattern, $string, $matches);
        return $matches;
    }
    function get_link($tag) {
        preg_match('/href="([^"]+)"/', $tag, $m);
        return $m[1];
    }
    function get_name($tag) {
        $matches = array();
        preg_match_all('#<a[^>]*>(.*?)</a>#', $tag, $matches);
        $xml = $matches[1][0];
        return $xml;
    }
?>