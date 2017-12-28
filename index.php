
<?php

    include './utilities/access_web_pages.php';
    include './utilities/data_group.php';
    include './utilities/regular_expression.php';

    $html = get_web_page("https://www.stockaxis.com/Top50-Stock");
    $table = get_content($html['content'], 'table')[0][0];
    $nameList = get_content($table, 'a')[0];
    $index = 0;
    $link_and_name = array();
    foreach ($nameList as $name) {
        $stripped_tag = strip_tags($name, '<a>');
        if (strpos($stripped_tag, 'ctl00_ContentPlaceHolder1_rptTop50_ct') > 0) {
            $link = get_link($stripped_tag);
            $sname = get_name($stripped_tag);
            $link_and_name[$index] = create_object($sname, $link);
            $index++;
        }
    }
    echo var_dump($link_and_name);
?>