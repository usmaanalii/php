This directory contains the following files

- test.php -> Used to ensure that php was installed successfully

- thumbnail.php -> Used to generate thumbnails for a given file

- image_paths -> Used to generate the image file locations for every image
                 in the 'images/' directory

- main.php -> Combines the thumbnail generating function and the image path
              generating function to create all of thumbnails for every image
              located in the 'images/' directory.
              The thumbnails will then be located in the 'thumbnails/'
              directory

- index.php -> The file used to show the thumbnails. It will display the
               following for all images
               1. File name (category/image_name)
               2. Image