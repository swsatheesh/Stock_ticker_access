
<?php

    include './utilities/access_web_pages.php';
    include './utilities/data_group.php';
    include './utilities/regular_expression.php';
    include './utilities/sorting.php';

    $data_group = new DataGroup();
    $html = get_web_page("https://www.stockaxis.com/Top50-Stock");
    $table = get_content($html['content'], 'table')[0][0];
    $nameList = get_content($table, 'a')[0];
    $index = 0;
    $link_and_name = array();
    foreach ($nameList as $name) {
        $stripped_tag = strip_tags($name, '<a>');
        if (strpos($stripped_tag, 'ctl00_ContentPlaceHolder1_rptTop50_ct') > 0) {
            $link = get_link($stripped_tag);
            $sname = get_name($stripped_tag, 'a');
            $link_and_name[$index] = $data_group->create_object($sname, $link);
            $index++;
        }
    }
    $link_and_name = f_usort($link_and_name);
    $newPage = get_web_page('http://www.marketonmobile.com/search.php');
    $extracted_list = get_all_matched_rows($newPage['content']);
    $total_s_list = $data_group->create_object_of_total_list($extracted_list);
    var_dump($link_and_name);
?>