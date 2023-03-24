<?php
require 'connect.php';

function getData($query){
    global $conn;

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $res = $stmt->get_result();

    while ( $row = $res->fetch_assoc() ) {
        $rows[] = $row;
    }

    return $rows;
}

function upload($data){
    global $conn;
    $file = intend();

    $displayname = $file['displayname'];
    $filename = $file['filename'];

    $add = "INSERT INTO file VALUES(
        '', '$displayname', '$filename', curdate())";
    mysqli_query($conn, $add);

    return mysqli_affected_rows($conn);
}

function intend(){
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];

    if ( $error === 4 ) {
        echo "
            <script>
            alert('aplod file woi');
            </script>
        ";
    }

    $validExtension = ['xlsx', 'docx', 'pdf'];
    $uploadExtension = explode('.', $fileName);
    $fileExtension = strtolower(end($uploadExtension));

    if ( !in_array($fileExtension, $validExtension) ) {
        echo "
            <script>
            alert('ekstensi tidak support');
            </script>
        ";

        return false;
    }

    if ( $fileSize > 1000000 ) {
        echo "
            <script>
            alert('file terlalu besar');
            </script>
        ";

        return false;
    }

    $newFilename = $uploadExtension[0];
    $newFilename .= "_";
    $newFilename .= uniqid();
	$newFilename .= '.';
	$newFilename .= $fileExtension;

    $data = array('displayname'=>$uploadExtension[0], 'filename'=>$newFilename);

    move_uploaded_file($tmpName, 'repo/' . $newFilename);

    return $data;

}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM file WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    $id = $data["id"];  
    $name = $data["displayname"];

    $query = "UPDATE file SET
                displayname = '$name'
                WHERE id = $id
            ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}