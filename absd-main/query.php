<?php
require 'function.php';
ini_set('display_errors', 0);

$query = "";

if (isset($_POST['ascending'])) {
  $query = "SELECT * FROM file ORDER BY id ASC";
} 
elseif (isset($_POST['descending'])) {
  $query = "SELECT * FROM file ORDER BY id DESC";
}
elseif (isset($_GET['search'])) {
  $query = "SELECT * FROM file WHERE displayname LIKE '%".$_GET['search']."%'";
}
else{
  $query = "SELECT * FROM file";
}

$sql = $query;

$result = mysqli_query($conn, $sql);
if($result >=1) {
  while ($data = mysqli_fetch_assoc($result)) {
    $res[] = $data;
  }
  
  $files = $res;
}


if (isset($_POST['submit'])) {
    
   if ( upload($_POST) > 0 ) {
       echo "
           <script>
           alert('Upload berhasil!');
           document.location.href = 'index.php'
           </script>
       ";
   }
   else {
       echo "
           <script>
           alert('Upload gagal!');
           document.location.href = 'index.php'
           </script>
       ";
   }

// if (isset($_POST['deleteFile'])) {
//     global $conn;
//     $id = $_GET['deleteFile'];
//     $del = mysqli_query($conn, "DELETE FROM file WHERE id = $id");
//     $row=mysql_fetch_array($del);
//     mysql_query("DELETE FROM file WHERE id= $id");
//     unlink("repo/". $row['file']);

//     return mysqli_affected_rows($conn);
// }

}