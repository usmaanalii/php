<?php
/**
 * Function takes in an image and creates a thumbnail
 * @param  string $source         - location of file e.g './image_name.jpg',
 *                                  this is also used to build the destination
 *                                  file name located in the './thumbnails'
 *                                  directory
 * @param  int $desired_width     - integer representing the height of the
 *                                  new image
 * @param  int $desired_height    - integer representing the width of the
 *                                  new image
 * @return string                 - Confirmation message, pointing to where
 *                                  the image is located e.g
 *                                  'Thumbnail located at /thumnail/../image_name.jpg'
 */
function make_thumb($source, $desired_width, $desired_height) {

  /* read the source image */
  $source_image = imagecreatefromjpeg($source);
  $original_width = imagesx($source_image);
  $original_height = imagesy($source_image);
  
  $image_group = explode('/', $source)[2];
  $image_name = explode('/', $source)[3];  // includes .jpg on the end
  $destination = "./thumbnails/$image_group/$image_name";
  
  
  /* find the "desired height" of this thumbnail, relative to the desired width  */
  $desired_height = floor($original_height * ($desired_width / $original_width));
  
  /* create a new, "virtual" image */
  $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
  
  /* copy source image at a resized size */
  imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $original_width, $original_height);
  
  /* create the physical thumbnail image to its destination */
  imagejpeg($virtual_image, $destination);
  
  return 'Thumbnail located at ' . substr($destination, 1);
}