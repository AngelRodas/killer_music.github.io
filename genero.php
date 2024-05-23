<?php
    require_once "includes/header.php";
    require_once "includes/formulario.php";
    $conn = Cconexion::ConexionDB();
    if(isset($_POST['agregar'])){
        $descripcion = $_POST['descripcion'];
        $genero = $_POST['genero']; 
        if(strlen($genero)>0){
            $options = array( PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1);
            $insertQuery = $conn->prepare("INSERT INTO Genero(Genero, Descripcion) values (?,?)", $options);
            
            if($insertQuery->execute(array($genero, $descripcion))) {
                echo "Género registrado exitósamente";
                            
            } else {
                echo "Error: " . $insertQuery->errorInfo();
            }            
            unset($insertQuery);
            //unset($conn);        
        }
    }
    else if(isset($_POST['actualizar'])){
        $descripcion = $_POST['descripcion'];
        $genero = $_POST['genero']; 
        $GeneroID = $_POST['GeneroID']; 
        if(strlen($genero)>0){
            $options = array( PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1);
            $UpdateQuery = $conn->prepare("UPDATE Genero set Genero = ?, Descripcion = ? where GeneroID = ?", $options);
            
            if($UpdateQuery->execute(array($genero, $descripcion, $GeneroID))) {
                echo "Registro actualizado exitosamente";
                            
            } else {
                echo "Error: " . $UpdateQuery->errorInfo();
            }            
            unset($UpdateQuery);
        }
    }
    else if(isset($_POST['Eliminar'])){
        $GeneroID = $_POST['GeneroID'];
        $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
        $query = "select * from Genero left join Artista on Artista.GeneroID = Genero.GeneroID left join Album on Album.GeneroID = Genero.GeneroID where Genero.GeneroID = ? and (Artista.ArtistaID is not null or Album.AlbumID is not null)";
        $selectQuery = $conn->prepare($query,$options);
        if($selectQuery->execute(array($GeneroID))){
            if($selectQuery->rowCount()>0)
            {
                echo "No se puede eliminar el registro porque está en uso";
            }
            else
            {
                $options = array( PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1);
                $DeleteQuery = $conn->prepare("DELETE from Genero where GeneroID = ?", $options);
                
                if($DeleteQuery->execute(array($GeneroID))) {
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="includes/css/main.css">
    <link rel="stylesheet" href="includes/css/boton.css">
    <title>Document</title>
</head>
<body>
<div class="posicion">
        <div class="player__btn player__btn--small" id="previous"  >
            <a href="agregar.php"><i class="fas fa-arrow-left"></i></a>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="text-center mb-2">Formulario de Género</h2>
        <form action="" method="POST">
            <?php
                if(isset($_POST['Editar'])){                    
                    $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
                    $query = "select * from Genero where GeneroID = ?";
                    $GeneroID = $_POST['GeneroID'];
                    $selectQuery = $conn->prepare($query,$options);
                    if($selectQuery->execute(array($GeneroID))){
                        while($row = $selectQuery->fetch(PDO::FETCH_ASSOC)){
                            $descripcion = $row['Descripcion'];
                            $genero = $row['Genero'];
                        }
                    }
                    echo "<input type='hidden' name='GeneroID' value='".$GeneroID."'/>";
                }

            
            ?>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label fw-bold">Género:</label>
                    <?php
                        if(isset($_POST['Editar'])){
                            echo "<input type='text' class='form-control' id='genero' name='genero' value='".$genero."' required>";
                        }
                        else
                        {
                            echo "<input type='text' class='form-control' id='genero' name='genero' required>";
                        }                        
                    ?>
                </div>
                <div class="col-md-6">
                    <label for="artista" class="form-label fw-bold">Descripcion:</label>
                    <?php
                        if(isset($_POST['Editar'])){
                            echo "<input type='text' class='form-control' id='descripcion' name='descripcion' value='".$descripcion."' required>";
                        }
                        else
                        {
                            echo "<input type='text' class='form-control' id='descripcion' name='descripcion' required>";
                        }
                    ?>
                </div>
            </div>
            <div class="text-center">
            <?php
                if(isset($_POST['Editar'])){
                    echo "<button type='submit' class='btn btn-primary' name='actualizar'>Actualizar</button>";
                }
                else
                {
                    echo "<button type='submit' class='btn btn-primary' name='agregar'>Agregar</button>";
                }                        
                    ?>
            </div>
        </form>
    </div>
    <div class="container">
        <?php
            $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL);
            $query = "select * from Genero";
            $selectQuery = $conn->prepare($query,$options);
            if($selectQuery->execute()){
                if($selectQuery->rowCount()>0)
                {
                    echo "<table>";
                    echo "  <tr>";
                    echo "    <td>Genero</td>";
                    echo "    <td>Descripcion</td>";
                    echo "  </tr>";
                    while($row = $selectQuery->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>";
                        echo "  <form method='POST'>";
                        echo "    <input type='hidden' name='GeneroID' value='".$row['GeneroID']."'/>";
                        echo "    <td>".$row['Genero']."</td>";
                        echo "    <td>".$row['Descripcion']."</td>";
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