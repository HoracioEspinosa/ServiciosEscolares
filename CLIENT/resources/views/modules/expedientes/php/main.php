<?php
// En versiones de PHP anteriores a la 4.1.0, debería utilizarse $HTTP_POST_FILES en lugar
// de $_FILES.
$dir_subida = '../archivos/';
$fichero_subido = $dir_subida . basename($_FILES['Archivo']['name']);
echo '<pre>';
if (move_uploaded_file($_FILES['Archivo']['tmp_name'], $fichero_subido)) {
    echo "El fichero es válido y se subió con éxito.\n";
} else {
    echo "¡Posible ataque de subida de ficheros!\n";
}
echo 'Más información de depuración:';
print_r($_FILES);
print "</pre>";

?>

<?php
$gestor = fopen("../Archivos/1.txt", "r");
?>
