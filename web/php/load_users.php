<?php

$user = "theciuc0_jdev";
$pass = "tqHzLt6N]h8X";
$dbh = new PDO('mysql:host=69.195.124.206;dbname=theciuc0_1', $user, $pass);
$local_file = "../../data/uniq_user.csv";

/* Sample code for FTP stuff
$local_file = 'local.zip';
$server_file = 'server.zip';

$ftp_user_name = "greenenergy";
$ftp_user_pass = "Springtime";
$ftp_server = "data.city.ames.ia.us";

// set up basic connection
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

// try to download $server_file and save to $local_file
if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
    echo "Successfully written to $local_file\n";
} else {
    echo "There was a problem\n";
}

// close the connection
ftp_close($conn_id); */


$row = 1;
$stmt = $dbh->prepare("REPLACE INTO User(
username ,
password ,
questions
)
VALUES (
:customer_id, :password, 0
);");
if (($handle = fopen($local_file, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if(count($data) > 0 && is_numeric($data[0])){
	        $stmt->bindParam(':customer_id', $data[0]);
			$stmt->bindParam(':password', md5($data[1]));
	        $stmt->execute();
		}

    }
    fclose($handle);
}
