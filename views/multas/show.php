<h2>Consulta multes del vehicle amb matrícula: <?php echo $_SESSION['username'] ;?></h2>
<table border="1">
    <tr>
        <td>Data</td>
        <td>Tipus</td>
        <td>Estat</td>
    </tr>
    <?php
        foreach ($multas as $multa) {
            if ($multa['tipo_multa'] == 1) {
                $tipus = "Lleu";
            }
            elseif ($multa['tipo_multa'] == 2) {
                $tipus = "Greu";
            }
            else {
                $tipus = "Molt greu";
            }
            $fecha = date("d/m/Y", strtotime($multa['fecha']));
            if ($multa['pagada'] == 0) {
                $estat = "<a href='index.php?controller=Multas&action=pay&id=" . $multa['id_multa'] . "'>Fer el pagament</a>";
            }
            else {
                $estat = "Pagada";
            }
            echo "<tr>
            <td>" . $fecha . "</td>
            <td>" . $tipus . "</td>
            <td>" . $estat . "</td>
            </tr>";
        }
    ?>
</table>