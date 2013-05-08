<?php
# Credits: BitRepository.com
# URL: http://www.bitrepository.com/web-programming/php/show-random-images-from-a-directory.html

// extensions to be checked

$extensions = array('jpg','jpeg','gif','png','bmp');

// images folder

$images_folder_path = '/public_html/letspoop/assets/Uploads/cats/';

// url to folder

$url_to_folder = 'http://eatprescott.com/letspoop/assets/Uploads/cats/';

// Images Array (SRC value)

$images = array();

srand((float) microtime() * 10000000); // IF PHP Version < 4.2.0

// Open directory and read images

if ($handle = opendir($images_folder_path)) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
            
			// get file extension
			$ext = strtolower(substr(strrchr($file, "."), 1));

			if(in_array($ext, $extensions))
			{
			$images[] = $url_to_folder.$file;
			}

        }
    }
    closedir($handle);
}

if(!empty($images)) // Do we have something to show?
{
$rand_key = array_rand($images, 1);

$src = $images[$rand_key];

function randImg(){
echo "<img src='".$src."' align='absmiddle'>";
}

// Show second image; Make sure it will not be the same as the first one; We will remove the element of the first image from the array. This way the script will not reselect it

unset($images[$rand_key]);

$rand_key = array_rand($images, 1);

$src = $images[$rand_key];

echo "<br /><br /><img src='".$src."' align='absmiddle'>";
}
else
{
echo 'No images were found in <strong>'.$images_folder_path.'</strong>';
}
?>

<?php 

function hello() {
	echo "Hello World!";
}