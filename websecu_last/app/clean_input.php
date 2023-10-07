<?php
#ssss
function clean_input($data)
{
    if (is_string($data)) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    return null;

}

?>