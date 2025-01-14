<?php
    if (isset($flag)) {
        echo $userdata;
    }
?>
<h2>Registre</h2>
<form method="post" action="">
    <label for="username">Matricula:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    <label for="propietario">Propietari:</label>
    <input type="text" id="propietario" name="propietario" required><br><br>
    <input type="submit" value="Registre">
</form>
<a href="index.php">Torna al log-in</a>