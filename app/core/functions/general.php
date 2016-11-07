<?php
function sanitize($data){
    $conn = getConnection();
    return mysqli_real_escape_string($conn, $data);
}

function output_errors($errors){
    $output = array();
    foreach ($errors as $error) {
        $output[] = $error . '<br>';
    }
    return implode('', $output);

}
?>

