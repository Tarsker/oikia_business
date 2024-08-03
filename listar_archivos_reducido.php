<?php
// Función para listar archivos y mostrar su contenido limitado
function listar_archivos($dir, $extensiones = ['php', 'blade.php'], $lineas_mostrar = 50)
{
    $result = "";
    $archivos = scandir($dir);
    foreach ($archivos as $archivo) {
        if ($archivo != '.' && $archivo != '..') {
            $ruta_completa = $dir . '/' . $archivo;
            if (is_dir($ruta_completa)) {
                $result .= listar_archivos($ruta_completa, $extensiones, $lineas_mostrar);
            } else {
                $ext = pathinfo($ruta_completa, PATHINFO_EXTENSION);
                if (in_array($ext, $extensiones)) {
                    $result .= "Archivo: $ruta_completa\n";
                    $contenido = file($ruta_completa);
                    $contenido_mostrado = array_slice($contenido, 0, $lineas_mostrar);
                    foreach ($contenido_mostrado as $line) {
                        $result .= htmlspecialchars($line);
                    }
                    $result .= "\n\n";
                }
            }
        }
    }
    return $result;
}

// Define el directorio raíz de tu proyecto Laravel
$root_dir = 'C:/xampp/htdocs/oikia_business/oikia-business';

// Lista y muestra el contenido de los archivos PHP y Blade
$resultado = listar_archivos($root_dir);

// Guardar el resultado en un archivo de texto
file_put_contents('resultado_reducido.txt', $resultado);

echo "El listado de archivos y su contenido limitado ha sido guardado en resultado_reducido.txt";
?>
