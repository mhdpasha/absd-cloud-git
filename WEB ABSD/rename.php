<?php
require 'function.php';


$id = $_GET["id"];

$data = getData("SELECT * FROM file WHERE id = $id")[0];    
if(isset($_POST["submit"])) {

    if( ubah($_POST) > 0 ) {
        echo "
            <script>
                alert('rename succesful');
                document.location.href = 'index.php';
            </script>
        ";
    }
    else {
        echo "
            <script>
                alert('error rename');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rename File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .container {
        margin-top: 30vh;
        padding: 25px;
        max-width: 600px;
        border: 1px inset #000000;
        border-radius: 20px;
    }
</style>
<body>
    <div class="container">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $data["id"]  ?>">
          <div class="mb-3">
            <label for="displayname" class="form-label">Rename your file</label>
            <input type="text" class="form-control" name="displayname" id="rename" value="<?= $data["displayname"] ?>" autocomplete="off">
          </div>
        <button type="submit" name="submit" class="btn btn-primary">Rename</button>
        </form>
    </div>
</body>
</html>
