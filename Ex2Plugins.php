<?php
    /*
    Plugin Name: PluginEx2
    Description: Plugin que calculi el numero d'hores que estem destinant al projecte.
    Version: 1.0
    Author: Sergi Castro Nieto
    */

    add_shortcode('plugin_horasproyecto', 'pluginHorasProyecto');

    function pluginHorasProyecto() {
        ob_start();
            session_start();
            $connexio = mysqli_connect("localhost", "sergi", "P@ssw0rd", "practicaplugins");
            echo "<form method='POST'>";
            echo "<input type='submit' name='iniciar' value='Comença a Comptar'>  ";
            echo "<input type='submit' name='parar' value='Para de Comptar'><br><br>";
            echo "</form>";
            if (isset($_POST["iniciar"])) {
                $tiempoInicial = date('h:i:s');
                $_SESSION["tiempoInicial"] = $tiempoInicial;
            }
            if (isset($_POST["parar"]))  {
                $tiempoFinal = date('h:i:s');
                $_SESSION["tiempoFinal"] = $tiempoFinal;
                $inicio = strtotime($_SESSION["tiempoInicial"]);
                $fin = strtotime($_SESSION["tiempoFinal"]);
                $segundos = $fin-$inicio;
                $segundosMostrar = number_format($fin-$inicio, 0);
                $minutos = $segundos/60;
                $minutosMostrar = number_format($minutos,0 );
                $horas = $minutos/60;
                $horasMostrar = number_format($horas, 0);
                echo "Ara he estat $horasMostrar hores, $minutosMostrar minuts i $segundosMostrar segons fent el projecte.<br>";
                $insert = "INSERT INTO horasproyecto (horas, minutos, segundos) VALUES ('$horas', '$minutos', '$segundos')";
                $return = mysqli_query($connexio, $insert);
                $select = "SELECT SUM(horas), SUM(minutos), SUM(segundos) FROM horasproyecto";
                $result = mysqli_query($connexio, $select);
                $rows = mysqli_fetch_array($result, MYSQLI_ASSOC);
                do {
                    $data[]= $rows;
                }while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC));
                $s = '<table border="1">';
                echo "Aquest es el total d'hores, minuts i segons que he estat fent el projecte:";
                foreach ($data as $r) {
                    $s .= '<tr>';
                    foreach ($r as $v) {
                        $s .= '<td>'.$v.'</td>';
                    }
                    $s .= '</tr>';
                }
                $s .= '</table>';
                echo $s;
            }
            mysqli_close($connexio);
        return ob_get_clean();
    }
    pluginHorasProyecto();
?>
