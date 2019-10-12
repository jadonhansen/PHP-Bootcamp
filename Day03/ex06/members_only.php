<?php
    if ($_SERVER['PHP_AUTH_USER'] == "zaz" && $_SERVER['PHP_AUTH_PW'] == "Ilovemylittleponey")        
    {
        header("Content-type: text/html");
        $img = file_get_contents('../img/42.png');
        $file = base64_encode($img);
        echo "<html><body>Hello Zaz<br /><img src='data:image/jpeg;base64,".$file."'></body></html>";
    }
    else
    {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        echo '<html><body>That area is accessible for members only</body></html>';
    }
?>