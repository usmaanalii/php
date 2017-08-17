This directory contains the following files

- test.php -> Used to ensure that php was installed successfully

- thumbnail.php -> Used to generate thumbnails for a given image file

- image_paths -> Used to generate the file paths for every image
                 in the 'images/' directory.

- main.php -> Combines the thumbnail generating function and the image path
              generating function to create all of thumbnails for every image
              located in the 'images/' directory.
              Thumbnails will then be located in the 'thumbnails/'
              folder.

- index.php -> The file used to show the thumbnails. It will display the
               following for all images
               1. File name (in the form category/image_name e.g
                  bright_colours/alu)
               2. Thumbnail image (with a width of 100px)

NOTE

- Running main.php will generate the thumbnails
- The directories have to be created beforehand, for example, the following
directory structure already needs to be created, since these paths are used
when creating the thumbnails from the original images
    - thumbnails/
        - bright_colours/
        - classics/
        - ...