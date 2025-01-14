<?php
    if (!isset($_SESSION['role'])) {
        echo '<meta http-equiv="refresh" content="0;url=index.php">';
    }
    elseif ($_SESSION['role'] == "admin") {
        echo '<meta http-equiv="refresh" content="0;url=index.php?controller=Multas&action=list">';
    }
    else {
        echo '<meta http-equiv="refresh" content="0;url=index.php?controller=Multas&action=show">';
    }
?>