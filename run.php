<?php
//FOLDER TO SEARCH IN
$src = 'C:/Users/j/Documents/GitHub/z_j/b2tob3/src/';

//FILE TYPES TO SEARCH
$extentions = array('html', 'htm', 'php', 'js', 'css');


if(isset($extentions) && !empty($extentions)) {
        $path = realpath($src);
        foreach($extentions as $ext) {
                $regex =  '/^.+\.'.$ext.'$/i';
                foreach (new RegexIterator(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)), $regex, RecursiveRegexIterator::GET_MATCH) as $filename)
                {
                        $file_content = file_get_contents($filename[0]);
                        $file_content = preg_replace('/span(\d+)/', 'col-md-$1', $file_content);
                        $file_content = preg_replace('/offset-(\d+)/', 'col-md-offset-$1', $file_content);
                        $file_content = preg_replace('/offset-(\d+)/', 'col-md-offset-$1', $file_content);
                        $file_content = preg_replace('/icon-(\w+)/', 'glyphicon glyphicon-$1', $file_content);
                        $file_content = preg_replace('/hero-unit/', 'jumbotron', $file_content);
                        $file_content = preg_replace('/(row)-fluid/', '$1', $file_content);
                        $file_content = preg_replace('/nav-(collapse|toggle)/', 'navbar-$1', $file_content);
                        $file_content = preg_replace('/(input|btn)-small/', '$1-sm', $file_content);
                        $file_content = preg_replace('/(input|btn)-large/', '$1-lg', $file_content);
                        $file_content = preg_replace('/btn-navbar/', 'navbar-btn', $file_content);
                        $file_content = preg_replace('/btn-mini/', 'btn-xs', $file_content);
                        $file_content = preg_replace('/unstyled/', 'list-unstyled', $file_content);
                        $file_content = preg_replace('/(visible|hidden)-phone/', '$1-sm', $file_content);
                        $file_content = preg_replace('/(visible|hidden)-tablet/', '$1-md', $file_content);
                        $file_content = preg_replace('/(visible|hidden)-desktop/', '$1-lg', $file_content);
                        $file_content = preg_replace('/input-(prepend|append)/', 'input-group', $file_content);
                        $file_content = preg_replace('/input-(prepend|append)/', 'input-group', $file_content);
                        $file_content = preg_replace('/input-mini/', 'form-control', $file_content);
                        $file_content = preg_replace('/input-small/', 'form-control', $file_content);
                        $file_content = preg_replace('/input-medium/', 'form-control', $file_content);
                        $file_content = preg_replace('/input-large/', 'form-control', $file_content);
                        $file_content = preg_replace('/input-xlarge/', 'form-control', $file_content);
                        $file_content = preg_replace('/navbar-fixed-top/', 'navbar-default navbar-static-top', $file_content);
                        $file_content = preg_replace('/class="label"/', 'class="label label-default"', $file_content);

                        if(!empty($file_content)) {
                                file_put_contents($filename[0],$file_content);
                        }

                        $arr[$ext][] = $filename[0];
                }
        }
}
?>
