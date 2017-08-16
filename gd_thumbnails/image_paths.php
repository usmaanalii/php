<?php  
/**
 * Recursively get all file paths for a given directory
 * @param  string $directory - Represents the directory to get the files from
 * @param  array  $results   - Array to hold all of the file paths
 * @return array             - Array containing all file paths beneath the
 *                             given directory
 */
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

print_r(get_dir_contents('./images/'));

/**
 * Takes the array returned from the get_dir_contents and
 * filters out the images
 * @param  string $directory - Takes the directory name where the images are
 *                             held, in this case its the 'images' directory
 *                             so, the parameter is './images/'
 * @return array             - Array holding all of the image paths from the
 *                             relative to the location of the index.php file
 */
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

print_r(get_image_paths('./images/'));