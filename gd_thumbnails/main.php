<?php

require './thumbnail.php';
require './image_names.php';

$file_paths = get_image_paths('./images');

foreach ($file_paths as $key => $path) {
    make_thumb(".$path", 100, 100);
}