
<?php

/*
*  Create 16/08/2021
*
*  Code
*
*/
function formatMoney($money, $suffix = "đ")
{
    return number_format($money) . $suffix;
}


function convert_name($str)
{

    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
    $str = preg_replace("/( )/", '-', $str);
    return $str;
}




function convert_num($str)
{
    $str = preg_replace("/(1.|2.|3.|4.|5.|6.|7.|8.|9.|10.|11.|12.|13.|14.|15.|16.|17.|18.|19.)/", '', $str);
    return $str;
}

function TableOfContents($contents, $depth = 3)
{   
    // Khởi tạo giá trị
    $pattern = '/<h[2-' . $depth . ']*[^>]*>.*?<\/h[2-' . $depth . ']>/';
    $whocares = preg_match_all($pattern, $contents, $winners);
    $search = ['<h2>', '</h2>', '<h3>', '</h3>', '<h4>', '</h4>', '<h5>', '</h5>','<span style="font-size:22px">', '</span>', '<strong>', '</strong>'];
    $i = 0; 
    $contents = "<div class='toc'>";
    $contents .= "<ul>";
    foreach ($winners[0] as $val) {
        $i++;
        $heads = str_replace($search, '', $val);
        $herf = convert_num($heads);
        if(preg_match('<h2>', $val)) {
            $contents .= "<li class='item-h2'> <a href='#tab$i'> {$herf} </a> </li>";
        } else if (preg_match('<h3>',$val) != false) {
            $contents .= "<li class='item-h3'> <a href='#tab$i'> {$herf} </a> </li>";
        } else {
            $contents .= "<li class='item-h4'> <a href='#tab$i'> {$herf} </a> </li>";
        }
    }
    $contents .= "</ul>";
    $contents .= "</div>";

    return $contents;
}

function makeContent($contents, $depth = 3) 
{
    
    $pattern = '/<h[2-' . $depth . ']*[^>]*>.*?<\/h[2-' . $depth . ']>/';
    $h = preg_match_all($pattern, $contents, $winners);
    $i = 0;
    foreach($winners[0] as $val) {
        $i++;
        $str = str_replace(['<h2>'], "<h2 id='tab{$i}'>", $val);
        $contents = str_replace($val, $str, $contents);    
        $str = str_replace(['<h3>'], "<h3 id='tab{$i}'>", $val);
        $contents = str_replace($val, $str, $contents); 
    }

    return $contents;
}


