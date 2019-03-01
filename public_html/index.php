<?php
    $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/config/config.ini", true);
?>
<html lang="en">
<head>
    <title>Dockerised LAMP server</title>
</head>
<body>
    <h3 align='center'>Your app is running inside a Docker container</h3>
    You can ssh to the container using <i>ssh root@localhost -p2022</i> Using the password you setup in your docker file<br>
    <h5>Attempting to connect to the MySQL Database ... </h5>
    <?php
        $link = @new mysqli($config ['Database']['host'], $config ['Database']['username'], $config ['Database']['password'], $config ['Database']['database']);
        if ($link->connect_error) {
            echo "Error: ";
            die($link->connect_error);
        }
        $result = $link->query("Show Databases;");
        if ($result->num_rows > 0) {
            echo "<h5>Database connection was successful. Here is a list of the databases found :-</h5>";
            $dbs = array();
            while($db = $result->fetch_row())
                $dbs[] = $db[0];
            echo implode('<br/>', $dbs);
        }
        $link->close();
    ?>
<br><br><hr>
<h5 align='center'>Php info :</h5>
    <?php
        phpinfo();
    ?>
</body>
</html>