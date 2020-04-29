<?php
	$host = "sql303.epizy.com:3306";
	$database = "epiz_25508544_contents";
	$username = "epiz_25508544";
	$password = "pk0bO9HnHb";

   $conn = mysqli_connect($host, $username, $password, $database);
   	if(!$conn)
   	{
		die("Unable to connect: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM epiz_25508544_contents.contents";
    $results = mysqli_query($conn, $sql);

    if(mysqli_num_rows($results) > 0)
    {
		while($record = mysqli_fetch_assoc($results))
		{
			print json_encode ($record);
            echo "<br/>";
		}	
   }
   else
   {
	echo("No records found");
   }
?>