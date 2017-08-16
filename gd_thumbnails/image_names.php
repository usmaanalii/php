<?php  
function get_dir_contents($directory, &$results = array()){
    $files = scandir($directory);

    foreach($files as $key => $value){
        $path = realpath($directory.DIRECTORY_SEPARATOR.$value);
        if(!is_dir($path)) {
            $results[] = $path;
        } else if($value != "." && $value != "..") {
            get_dir_contents($path, $results);
            $results[] = $path;
        }
    }

    return $results;
}

function get_image_paths($directory) {
    $file_names = get_dir_contents($directory);
    $image_paths = array();

    foreach ($file_names as $key => $value) {
        if (strpos($value, '.jpg') !== false) {
            $start = strpos($value, '/images');
            array_push($image_paths, substr($value, $start));
        }
    }

    return $image_paths;
}

// print_r(get_image_paths('./images'));
