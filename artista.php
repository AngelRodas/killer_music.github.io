<?php
require_once "includes/header.php";
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: login.php");
}

if ($_SESSION['EsAdmin'] == 0) {
    echo "Usted no tiene permisos de estar acá!, fuera o le digo a tus papás";
    exit;
}

require_once "includes/formulario.php";
$conn = Cconexion::ConexionDB();
?>
<?php
if (isset($_POST['agregar'])) {
    $nombreA = $_POST['nombrea'];
    $genero = $_POST['genero'];
    $imagen = $_POST['imagen'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $anio = $_POST['anio'];
    $esgrupo = $_POST['esgrupo'];
    if (strlen($genero) > 0 && strlen($nombreA) > 0) {
        if ($esgrupo == "Si" || $esgrupo == "si") {
            $esgrupo = 1;
        } elseif ($esgrupo == "No" || $esgrupo == "no") {
            $esgrupo = 0;
        }
        $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1);
        $insertArtista = $conn->prepare("INSERT INTO Artista(NombreArtistico, Nombre, Apellido, GeneroID, AnioNacimiento, EsGrupo, Imagen) values (?,?,?,?,?,?,?)", $options);

        if ($insertArtista->execute(array($nombreA, $nombre, $apellido, $genero, $anio, $esgrupo, $imagen))) {
            echo "Artista registrado exitósamente";
        } else {
            echo "Error: " . $insertArtista->errorInfo();
        }
        unset($insertArtista);
        
    }
} else if (isset($_POST['actualizar'])) {
    $nombreA = $_POST['nombrea'];
    $genero = $_POST['genero'];
    $imagen = $_POST['imagen'];
    $anio = $_POST['anio'];
    $esgrupo = $_POST['esgrupo'];
    $ArtistaID = $_POST['ArtistaID'];
    if (strlen($genero) > 0) {
        $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1);
        $UpdateQuery = $conn->prepare("UPDATE Artista set NombreArtistico = ?, AnioNacimiento = ?, Imagen = ?, EsGrupo = ?, GeneroID = ? where ArtistaID = ?", $options);

        if ($UpdateQuery->execute(array($nombreA, $anio, $imagen, $esgrupo, $genero, $ArtistaID))) {
            echo "Registro actualizado exitosamente";
        } else {
            echo "Error: " . $UpdateQuery->errorInfo();
        }
        unset($UpdateQuery);
    }
} else if (isset($_POST['Eliminar'])) {
    $ArtistaID = $_POST['ArtistaID'];
    $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
    $query = "select * from Artista left join Album on Album.ArtistaID = Artista.ArtistaID where Album.GeneroID = ? and (Album.ArtistaID is not null)";
    $selectQuery = $conn->prepare($query, $options);
    if ($selectQuery->execute(array($ArtistaID))) {
        if ($selectQuery->rowCount() > 0) {
            echo "No se puede eliminar el registro porque está en uso";
        } else {
            $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1);
            $DeleteQuery = $conn->prepare("DELETE from Artista where ArtistaID = ?", $options);

            if ($DeleteQuery->execute(array($ArtistaID))) {
                echo "Registro eliminado exitosamente";
            } else {
                echo "Error: " . $DeleteQuery->errorInfo();
            }
            unset($DeleteQuery);
        }
    }
    unset($selectQuery);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="includes/css/main.css">
    <link rel="stylesheet" href="includes/css/boton.css">
    <title>Document</title>
</head>

<body>
    <div class="posicion">
        <div class="player__btn player__btn--small" id="previous">
            <a href="agregar.php"><i class="fas fa-arrow-left"></i></a>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="text-center mb-2">Formulario de Artista</h2>
        <?php
        if (isset($_POST['Editar'])) {
            $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
            $query = "SELECT * from Artista where ArtistaID = ?";
            $ArtistaID = $_POST['ArtistaID'];
            $selectQuery = $conn->prepare($query, $options);
            if ($selectQuery->execute(array($ArtistaID))) {
                while ($row = $selectQuery->fetch(PDO::FETCH_ASSOC)) {
                    $nombre = $row['Nombre'];
                    $anio = $row['AnioNacimiento'];
                    $portada = $row['Imagen'];
                    $nombrea = $row['NombreArtistico'];
                    $apellido = $row['Apellido'];
                    $esgrupo = $row['EsGrupo'];
                    $ArtistaID = $row['ArtistaID'];
                }
            }
            
        }


        ?>
        <form action="" method="POST">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label fw-bold">Artista:</label>
                    <?php
                    if (isset($_POST['Editar'])) {
                        echo "<input type='text' class='form-control' id='nombrea' name='nombrea' value='" . $nombrea . "' required>";
                        echo "<input type='hidden' name='ArtistaID' value='" . $ArtistaID . "'/>";
                    } else {
                        echo "<input type='text' class='form-control' id='nombrea' name='nombrea' required>";
                    }
                    ?>
                </div>
                <div class="col-md-6">
                    <label for="artista" class="form-label fw-bold">Nombre:</label>
                    <?php
                    if (isset($_POST['Editar'])) {
                        echo "<input type='text' class='form-control' id='nombre' name='nombre' value='" . $nombre . "'>";
                    } else {
                        echo "<input type='text' class='form-control' id='nombre' name='nombre'>";
                    }
                    ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="album" class="form-label fw-bold">Apellido:</label>
                    <?php
                    if (isset($_POST['Editar'])) {
                        echo "<input type='text' class='form-control' id='apellido' name='apellido' value='" . $apellido . "' >";
                    } else {
                        echo "<input type='text' class='form-control' id='apellido' name='apellido' >";
                    }
                    ?>
                </div>
                <div class="col-md-6">
                    <label for="genero" class="form-label fw-bold">Año:</label>
                    <?php
                    if (isset($_POST['Editar'])) {
                        echo "<input type='number' class='form-control' id='anio' name='anio' value='" . $anio . "' required>";
                    } else {
                        echo "<input type='number' class='form-control' id='anio' name='anio' required>";
                    }
                    ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="imagen" class="form-label fw-bold">Género: </label>
                    <select id="genero" name="genero">
                        <option value='0'>Seleccione....</option>
                        <?php
                        $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
                        $query = "SELECT Genero, GeneroID from Genero ";
                        $selectQuery = $conn->prepare($query, $options);
                        if ($selectQuery->execute()) {
                            if ($selectQuery->rowCount() > 0) {
                                while ($row = $selectQuery->fetch(PDO::FETCH_ASSOC)) {
                                    if ($row['GeneroID'] == $_POST['GeneroID']) {
                                        echo "<option value='" . $row['GeneroID'] . "' selected>" . $row['Genero'] . "</option>";
                                    } else {
                                        echo "<option value='" . $row['GeneroID'] . "'>" . $row['Genero'] . "</option>";
                                    }
                                }
                            }
                        }

                        unset($selectQuery);
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="anio" class="form-label fw-bold">Es grupo (si, no):</label>
                    <select id="esgrupo" name="esgrupo">
                        <option value=''>Seleccione....</option>
                        <option value='si'>Si</option>
                        <option value='no'>No</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="imagen" class="form-label fw-bold">Imagen: </label>
                    <?php
                    if (isset($_POST['Editar'])) {
                        echo "<input type='text' class='form-control' id='portada' name='imagen' value='" . $portada . "' required>";
                    } else {
                        echo "<input type='text' class='form-control' id='portada' name='imagen' required>";
                    }
                    ?>
                </div>
            </div>
            <div class="text-center">
                <?php
                if (isset($_POST['Editar'])) {
                    echo "<button type='submit' class='btn btn-primary' name='actualizar'>Actualizar</button>";
                } else {
                    echo "<button type='submit' class='btn btn-primary' name='agregar'>Agregar</button>";
                }
                ?>
            </div>
        </form>
    </div>
    <div class="container">
        <?php
        $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
        $query = "select Artista.*, Genero.Genero from Artista inner join Genero on Genero.GeneroID = Artista.GeneroID";
        $selectQuery = $conn->prepare($query, $options);
        if ($selectQuery->execute()) {
            if ($selectQuery->rowCount() > 0) {
                echo "<table border='1px'>";
                echo "  <tr>";
                echo "    <td>NombreArtistico</td>";
                echo "    <td>Nombre</td>";
                echo "    <td>Apellido</td>";
                echo "    <td>Año de Nacimiento</td>";
                echo "    <td>Es Grupo</td>";
                //echo "    <td>Imagen</td>";
                echo "    <td>Genero</td>";
                echo "  </tr>";
                while ($row = $selectQuery->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "  <form method='POST'>";
                    echo "    <input type='hidden' name='GeneroID' value='" . $row['GeneroID'] . "'/>";
                    echo "    <input type='hidden' name='ArtistaID' value='" . $row['ArtistaID'] . "'/>";
                    echo "    <td>" . $row['NombreArtistico'] . "</td>";
                    echo "    <td>" . $row['Nombre'] . "</td>";
                    echo "    <td>" . $row['Apellido'] . "</td>";
                    echo "    <td>" . $row['AnioNacimiento'] . "</td>";
                    echo "    <td>" . $row['EsGrupo'] . "</td>";
                  //  echo "    <td>" . $row['Imagen'] . "</td>";
                    echo "    <td>" . $row['Genero'] . "</td>";
                    echo "    <td><button type='submit' class='btn btn-primary' name='Editar'>Editar</button></td>";
                    echo "    <td><button type='submit' class='btn btn-primary' name='Eliminar'>Eliminar</button></td>";
                    echo "  </form>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
        unset($selectQuery);
        unset($conn);
        ?>
    </div>
</body>
<?php
require_once "includes/footer.php";
?>