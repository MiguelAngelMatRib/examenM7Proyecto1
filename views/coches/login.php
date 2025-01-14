<?php
    if (isset($text)) {
        echo $text;
    }
?>
<h2>Consulta les teves multes</h2>
<form method="post" action="">
    <label for="username">Matricula:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>
<a href="index.php?controller=Coches&action=registre">Registra't per consultar les teves multes</a>
<br>
<a href="index.php?controller=Users&action=loginadmin">Soc administrador</a>
