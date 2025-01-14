<h1>Benvingut/da treballador/a: <?php echo $_SESSION['username'] ;?></h1>
<h3>Llistat de totes les multes</h3>
<table border="1">
    <tr>
        <td>Data</td>
        <td>Tipus</td>
        <td>Vehicle</td>
        <td>Propietari</td>
        <td></td>
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
            echo "<tr>
            <td>" . $fecha . "</td>
            <td>" . $tipus . "</td>
            <td>" . $multa['matricula'] . "</td>
            <td>" . $multa['propietario'] . "</td>
            <td><a href=''>Imprimir document en word</a></td>
            </tr>";
        }
    ?>
</table>