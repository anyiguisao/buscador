<?php
$conex = mysqli_connect("localhost", "root", "","inventario");

$output= "";

if(isset($_POST['buscar'])){

    $input=$_POST['input'];

    if(!empty($input)) {

        $query = "SELECT * FROM datos WHERE sku LIKE '%$input%' OR caja LIKE '%$input%'";

        $res = mysqli_query($conex, $query);

        $output .= "
            <table class='table table-bordered table-atriped'>
                <tr style='border: 10px; border-color: black; background-color: #0e026b'>
                    <th>Estiba</th>
                    <th>Caja</th>
                    <th>Rack</th>
                    <th> columna</th>
                    <th>Sku</th>
                    <th>Nivel</th>
                    <th>Descripcion</th>
                    <th>Total</th>
                    <th>Fecha ingreso</th>
                    
                </tr>

        ";

        if(mysqli_num_rows($res) < 1 ){

            $output .="
            <tr>
            <td colspan='6' class='text-center'> no hay resltados </td>
            </tr>
            ";
        }else{
            while($row = mysqli_fetch_array($res)){
                $output .="
                <tr >
                    <td style='color: black;'>".$row['stiba']."</td>
                    <td style='color:black;'>".$row['caja']."</td>
                    <td style='color:black;'>".$row['rack']."</td>
                    <td style='color:black;'>".$row['columna']."</td>
                    <td style='color:black;'>".$row['sku']."</td>
                    <td style='color:black;'>".$row['nivel']."</td>
                    <td style='color:black;'>".$row['descripcion']."</td>
                    <td style='color:black;'>".$row['total']."</td>
                    <td >".$row['fecha_ingreso']."</td>
                    
                </tr>
                ";
            }
        }
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h2 class="text-center my-4" > como crear un bucador usando php y mysql </h2>

    <div class="container d-flex justify-content-center  flex-column">

        <div class="col-md-12">
        
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-9" >
                        <input type="text" name="input" class="form-control" placeholer="Buscar">
                    </div>
                    <div class="col-md-3" >
                        <input type="submit" name="buscar" class="btn btn-info" value="buscar" >
                    </div>
                    
                </div>
                </div>
            </form>
        <br><br>
            <?php
            echo $output;
            ?>

        </div>
    </div>
</body>
</html>