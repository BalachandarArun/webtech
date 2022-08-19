<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>validate</title>
</head>
<body>

    <!-- PHP code -->
    <?php
        $cid = $_POST['cid'];
        $cname = $_POST['cname'];
        $desc = $_POST['description'];
        $srft = $_POST['sqrft'];
        $baths = $_POST['baths'];
        $beds = $_POST['beds'];
        $price = $_POST['price'];

        $arrayName = array($cid , $cname , $desc , $srft , $baths , $beds , $price);

        // Check for null safety
        if ($cid && $cname && $desc && $srft && $baths && $beds && $price) {
            echo "<script>console.log('verified successfully')</script>";
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "realhomie";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $db);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $check = $_FILES["choseFile"]["name"];

            echo "<script>console.log('Connected successfully!')</script>";

            // image script
            $status = 'error'; 
            if(!empty($_FILES["choseFile"]["name"])) { 
            // POST file info 
                echo "<script>console.log('Accepted image!...')</script>";
                $fileName = basename($_FILES["choseFile"]["name"]); 
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
                echo "<script>console.log('$fileType')</script>";

                // Allow certain file formats 
                $allowTypes = array('jpg','png','jpeg','gif'); 
                if(in_array($fileType, $allowTypes)){ 
                    $image = $_FILES['choseFile']['tmp_name']; 
                    $imgContent = addslashes(file_get_contents($image)); 
                
                    // Insert content into database 
                    $insert = $conn->query("INSERT INTO `homeseller`(`customerId`, `CustomerName`, `HomeDescription`, `sqf`, `beds`, `baths`, `price`, `propimage`) VALUES ('$cid','$cname','$desc','$srft','$beds','$baths','$price','$imgContent')");
                    
                    if($insert){ 
                        $status = 'success'; 
                        $statusMsg = "File uploaded successfully."; 
                    }
                    else{ 
                        $statusMsg = "File upload failed, please try again."; 
                    }  
                }
            }
            else{ 
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
            }
                echo "<script>alert('$statusMsg')</script>";
        }
        else {
            echo "<script>console.log('not verified successfully')</script>";
        }
    ?>
    
</body>
</html>