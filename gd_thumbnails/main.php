<?php
/**
 * This file takes in the thumbnail function from thumbnail.php and the
 * get_image_paths function from image_paths.php
 *
 * It uses, them to generate all of the thumbnail images which will be
 *      1, Taken from the images directory
 *      2. Placed in the thumbnails directory
 *      
 * The file structure will be mirrored, so for example the following input file
 * (1) will generate (2)
 *      1. images/bright_colours/alu.jpg
 *      2. thumbnails/bright_colours/alu.jpg
 */

require './thumbnail.php';
require './image_paths.php';

$file_paths = get_image_paths('./images');

foreach ($file_paths as $key => $path) {
    make_thumb(".$path", 100, 100);
}