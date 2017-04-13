<<<<<<< HEAD

<?php
$link = mysqli_connect("localhost", "root", "123456", "campeonato_db");
=======
<?php
$link = mysqli_connect("localhost", "campeonato", "123456", "campeonato_db");
>>>>>>> 5504b6ea8bad3dd14ee9578b60ec91ac7cf605c7

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

<<<<<<< HEAD
//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

//mysqli_close($link);
?>
=======
// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

// mysqli_close($link);
?>
>>>>>>> 5504b6ea8bad3dd14ee9578b60ec91ac7cf605c7
