#!/usr/bin/php
<?php
    function create_directory($argument_one) {
        $directory_new = $argument_one;
        if (file_exists($directory_new) && is_dir($directory_new))
            return ($directory_new);
        mkdir($directory_new);
        return ($directory_new);        
    }
    function get_images($web_name) {
        $site = file_get_contents("https://".$web_name);
        preg_match_all('/<img src\s*=\s*"(.+?)"/', $site, $images);
        return ($images);
    }
    function create_file($name, $path) {
        preg_match('/[^\/]*$/', $name, $morph);
  
        if(file_exists($path."/".$morph)){
            unlink($fullpath);
        }
        $file_name = $morph[0];
  
        $new = fopen($path."/".$morph[0], 'w');
        $new_path = $path."/".$morph[0];
        return ($new_path);
 
    }
    function save_image($img, $fullpath){
        preg_match('/src[^"]+\"(.*)/', $img, $ret);
        $ch = curl_init($ret[1]);
    }
    function download_image($link_to_image, $destination, $add) {
        preg_match('/src[^"]+\"(.*)/', $link_to_image, $ret);
        $final = substr_replace($ret[1] ,"", -1);
        if (!strstr($final, "http")) {
            $final = "https://".$add.$final;
        }
        $ch = curl_init ($final);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
        $rawdata = curl_exec ($ch);
        curl_close ($ch);
        $fp = fopen($destination, 'w');
        fwrite($fp, $rawdata);
        fclose($fp);
    }
    if ($argc < 2 || !isset($argv[1])) {
        exit();
    }
    $directory_new = create_directory($argv[1]);
    $path = "=../ex04/".$directory_new;
    $img_links = get_images($argv[1]);
    $i = 0;
    $pos = 0;
    $links = $img_links[1];
    $img = $img_links[0][$pos];
    while ($links[$i]) {
        $new = "../ex04/".create_file($links[$i], $directory_new);
        download_image($img_links[0][$pos], $new, $argv[1]);
        $i++;
        $pos++;
    }
?>