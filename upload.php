<?php
// connect to the database
$conn = mysqli_connect('dbMysql', 'root', 'password', 'file_upload_db');

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // exit();
  }
  else{
    echo "Database Connected !";
  }
    echo "<br>";
    // echo "Initial character set is: " . mysqli_character_set_name($conn);
    // echo "<br>";
    // var_dump(mysqli_get_charset($conn));
    // echo "<br>";
    // echo mysqli_get_client_info();
    // echo "<br>";
    // print_r(mysqli_get_connection_stats($conn));
    // echo "<br>";
    // print_r(mysqli_get_connection_stats($con));


    // Change character set to utf8
    // mysqli_set_charset($conn,"utf8mb4");
    // echo "<br>";
    // echo "Current character set is: " . mysqli_character_set_name($conn);



// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
        echo "You file extension must be 'jpg', 'jpeg', 'png'";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        //php user
        echo "<br>";
        echo exec('whoami');
        echo "<br>";
        echo (" : .... : ");
        echo "<br>";
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            echo "File Upload is Success, Inserting data in database container";
            $sql = "INSERT INTO file_upload (file_name, path, status) VALUES ('$filename', '$destination', 0)";
             if (mysqli_query($conn, $sql)) {
				echo "<br>";
                echo "Data Insertion is successful in the database container at 3306";
             }else{
				echo "<br>";
                echo("Error description: " . $sql . "<br>" . mysqli_error($conn));
             }
        } else {
            echo "Failed to upload file.";
        }
    }
}

mysqli_close($conn);

?>