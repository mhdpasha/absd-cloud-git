<?php
require 'function.php';

$id = $_GET["id"];

if( hapus($id) > 0 ) {
    echo "
        <script>
            alert('file deleted');
            document.location.href = 'index.php';
        </script>
    ";
}
else {
    echo "
        <script>
            alert('error file not deleted');
            document.location.href = 'index.php';
        </script>
    ";
}
