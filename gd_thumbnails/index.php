<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Thumbnail images</title>
    </head>
    <body>
        <?php
        require 'image_names.php';
        $image_src = get_image_paths('./thumbnails');
        // print_r($image_src);
        ?>
        
        <?php foreach ($image_src as $key => $path): ?>
            <?php
            $start_img_src = strpos($path, '/thumbnails/');
            $start_img_name = strpos($path, '/thumbnails/') + strlen('/thumbnails') + 1;
            ?>
            <h3><?php echo substr($path, $start_img_name, -4); ?></h3>
            <img src="<?php echo '.' . substr($path, $start_img_src); ?>" alt="">
            <br>
        <?php endforeach; ?>
    </body>
</html>