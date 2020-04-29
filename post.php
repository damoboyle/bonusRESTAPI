<?php
	$incomingContentType = $_SERVER['CONTENT_TYPE'];

	if ($incomingContentType != 'application/json')
	{
		header ($_SERVER['SERVER_PROTOCOL'] . '500 Internal Server Error');
		exit();
	}

	$content = trim (file_get_contents("php://input"));
	$decoded = json_decode ($content, true);

	$host = "sql303.epizy.com:3306";
	$database = "epiz_25508544_contents";
	$username = "epiz_25508544";
	$password = "pk0bO9HnHb";

    $conn = mysqli_connect($host, $username, $password, $database);
   	if(!$conn)
   	{
		die("Unable to connect: " . $conn->connect_error);
    }

    $user = $decoded['user'];
    $message = $decoded['message'];

    $sql = "INSERT INTO epiz_25508544_contents.contents (date, user, message) VALUES (UTC_TIMESTAMP, '$user', '$message')";

    if ($conn->query($sql) === TRUE)
    {
    echo "New record created successfully";
    header ($_SERVER['SERVER_PROTOCOL'] . '201 Created');
	}
	else
	{
    echo "Error: " . $sql . "<br>" . $conn->error;
	}

    $conn->close();
?>