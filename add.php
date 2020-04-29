<html>
<body>
<form action="add.php" method="post">
	<br/>
	<input type="text" id="user" name="user" placeholder="Your Name" size="30">
	<br/><br/>
    <textarea id="message" name="message" placeholder="Your Comments" rows="5" cols="100" wrap="on"></textarea>
	<br/><br/>
  	<button type="submit" name="submit">Submit</button>
</form>

<?php
    if (isset ($_POST ['submit']))
    {       
        // API URL
        $url = 'http://bonusrestful.epizy.com/post.php';

        // Create a new cURL resource
        $ch = curl_init($url);

        // Setup request to send json via POST
        $data = array('user' => $_POST ['user'], 'message' => $_POST ['message']);
        $payload = json_encode($data);

        // Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the POST request
        $result = curl_exec($ch);

        // Close cURL resource
        curl_close($ch);

        echo "Input Successfully Posted";
    }
?>
</body>
</html>