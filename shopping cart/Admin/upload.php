<?php
$src = $_FILES['pimage']['tmp_name'];
$filename = $_FILES['pimage']['name'];
$output_dir = "images/".$filename;

if (move_uploaded_file($src, $output_dir)) {
 
        
        echo "Success! Image uploaded! File: ".$filename;
} else{
    echo "Error! Image upload failed! File: ".$filename;
};

