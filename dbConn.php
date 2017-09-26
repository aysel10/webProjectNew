<?php
// First let's define constants in order to be sure that values won't be changed outside this code.
    DEFINE('DB_HOST', 'localhost');
    DEFINE('DB_USER', 'root');
if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    DEFINE('DB_PASSWORD', ''); // CAUTION! FOR WINDOWS
}
else {
    DEFINE('DB_PASSWORD', 'root'); // CAUTION! It is not empty on MAC OS with MAMP AND XAMPP. THERE IS PASSWORD -> root
}
    DEFINE('DB_NAME', 'DB001');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die("Couldn't connect to the database, ERROR: " . mysqli_connect_error()  );

?>