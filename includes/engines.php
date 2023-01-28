<?php

/*****************************************
 * ***********LOGIN ENGINES***************
 *****************************************/
include_once "includes/login.php";

echo "<p class='small'>";

if (empty($_SESSION['user'])) {
    echo "<a href='user-login.php'>Login</a>";
} else {
    echo "Hello, " . $_SESSION['nome'];
}
echo "<?p>";
