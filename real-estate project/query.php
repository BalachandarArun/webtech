<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        $conn = new mysqli("localhost", "root", "", "realhomie");
        if ($conn->connect_error) {
            die("connection failed");
        }
        else {
            echo "<h1>Connected successfully!</h1>";
        }
        $result = $conn->query("select * from homeseller");
        echo "<table border='2'>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            $cid = $row['customerId'];
            $cname = $row['CustomerName'];
            $desc = $row['HomeDescription'];
            $srft = $row['sqf'];
            $baths = $row['baths'];
            $beds = $row['beds'];
            $price = $row['price'];
            // $img = $row['propimage'];
            echo "<td>$cid</td>";
            echo "<td>$cname</td>";
            echo "<td>$desc</td>";
            echo "<td>$srft</td>";
            echo "<td>$baths</td>";
            echo "<td>$beds</td>";
            echo "<td>$price</td>";
            // echo "<td><img src='upload image/$row[\"df\"]' width='100px' height='100px'></td>";
            echo '<td><img src="data:image;base64,'.base64_encode($row["propimage"]).'" width="100px" height="100px"></td>';
            echo "</tr>";
        }
        echo "</table>";
    ?>

</body>
</html>

<!-- 
    Table structure
    customerId
int(11)
NO
PRI
NULL
CustomerName
varchar(100)
NO
NULL
HomeDescription
text
NO
NULL
sqf
int(11)
NO
NULL
beds
int(11)
NO
NULL
baths
int(11)
NO
NULL
price
int(11)
NO
NULL
propimage
 -->