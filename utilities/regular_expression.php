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
    function get_name($tag, $tag_name) {
        $matches = array();
        preg_match_all('#<' . $tag_name . '[^>]*>(.*?)</' . $tag_name . '>#', $tag, $matches);
        $xml = $matches[1][0];
        return $xml;
    }
    function get_all_matched_rows($tag) {
        $matches = array();
        preg_match_all('#<div class=("row"|"row [a-z].*?")>(.*?)<\/div>#s', $tag, $matches);
        $xml = $matches[2];

        return $xml;
    }
?>