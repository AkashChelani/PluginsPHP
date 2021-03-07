<?php
    /*
    Plugin Name: PluginEx1
    Description: Plugin que ens mostri per pantalla les tasques principals que falten del projecte.
    Version: 1.0
    Author: Sergi Castro Nieto
    */

    add_shortcode('plugin_tareas', 'pluginTareas');

    function pluginTareas() {
        ob_start();
            $connexio = mysqli_connect("localhost", "sergi", "P@ssw0rd", "practicaplugins");
            $select = "SELECT * FROM tareaspendientes";
            $result = mysqli_query($connexio, $select);
            $rows = mysqli_fetch_array($result, MYSQLI_ASSOC);
            do {
                $data[]= $rows;
            }while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC));

            $s = '<table border="1">';
            foreach ($data as $r) {
                $s .= '<tr>';
                foreach ($r as $v) {
                    $s .= '<td>'.$v.'</td>';
                }
                $s .= '</tr>';
            }
            $s .= '</table>';
            echo $s;

            echo "<form method='POST'>";
            echo "<label for='eliminarTasca'>Quina tasca vols eliminar?</label><br>";
            echo "<input type='text' id='eliminarTarea' name='eliminarTarea' value=''><br><br>";
            echo "<input type='submit' name='eliminar' value='Eliminar'><br><br>";
            echo "</form>";

            $eliminarTarea = $_POST["eliminarTarea"];

            if (isset($_POST["eliminarTarea"])) {
                foreach($data as $tarea) {
                    foreach ($tarea as $a => $b) {
                        if ($b == $eliminarTarea) {
                            $delete = "DELETE FROM tareaspendientes WHERE tareas = '$eliminarTarea'";
                            $result2=mysqli_query($connexio, $delete);
                            echo "La tasca s'ha eliminat correctament!";
                        }
                    }
                }
            }
            mysqli_close($connexio);
        return ob_get_clean();
    }
    pluginTareas();
?>