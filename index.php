<!doctype html>
<html lang="en">
    <head>
        <title>Pagina en PHP</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
    <h1>Formulario empleados</h1>
    <!-- CAMPOS DE MI FORMULARIO -->
    <form class="d-flex" action="crud_empleados.php" method="post">
        <div class="col">
       
             <div class="mb-3">
                <label for="lbl_id" class="form-label"><b>ID</b></label>
                <input
                    type="text"
                    name="text_id"
                    id="text_id"
                    class="form-control"
                    value="0" readonly>
            </div>

            <div class="mb-3">
                <label for="lbl_codigo" class="form-label"><b>Codigo</b></label>
                <input
                    type="text"
                    name="text_codigo"
                    id="text_codigo"
                    class="form-control"
                    placeholder="Codigo: E001" Required/>
            </div>
            <div class="mb-3">
                <label for="lbl_nombres" class="form-label"><b>Nombres</b></label>
                <input
                    type="text"
                    name="text_nombres"
                    id="text_nombres"
                    class="form-control"
                    placeholder="Nombres: Nombre1 Nombre2" Required/>
            </div>
            <div class="mb-3">
                <label for="lbl_apellidos" class="form-label"><b>Apellidos</b></label>
                <input
                    type="text"
                    name="text_apellidos"
                    id="text_apellidos"
                    class="form-control"
                    placeholder="Apellidos: Apellidos1 Apellidos2" Required/>
            </div>
            <div class="mb-3">
                <label for="lbl_direccion" class="form-label"><b>Direccion</b></label>
                <input
                    type="text"
                    name="text_direccion"
                    id="text_direccion"
                    class="form-control"
                    placeholder="Direccion: #casa: calle avenida lugar" Required/>
            </div>
            <div class="mb-3">
                <label for="lbl_telefono" class="form-label"><b>Telefono</b></label>
                <input
                    type="number"
                    name="text_telefono"
                    id="text_telefono"
                    class="form-control"
                    placeholder="Telefono: 00000000" Required/>
            </div>
            <div class="mb-3">
                <label for="lbl_puesto" class="form-label"><b>Puesto</b></label>
                <select
                    class="form-select"
                    name="drop_puesto"
                    id="drop_puesto"
                >
                <option value=0>---Puesto--</option>
                <?php
                  include("datos_conexion.php");
                  $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                  $db_conexion ->real_query("select id_puesto as id,puesto from puestos;");
                  $resultado = $db_conexion->use_result();
                  while($fila=$resultado->fetch_assoc()){
                  echo"<option value=".$fila['id'].">".$fila['puesto']."</option>";  
                  }
                  $db_conexion ->close();
                ?>

                </select>
            </div>
            <div class="mb-3">
                <label for="lbl_fn" class="form-label"><b>Fecha Nacimiento</b></label>
                <input
                    type="date"
                    name="text_fn"
                    id="text_fn"
                    class="form-control"
                    placeholder="aaaa-mm-dd" Required/>
            </div>
            
            <div class="mb-3">
                <input
                    type="submit"
                    name="btn_agregar"
                    id="btn_agregar"
                    class="btn btn-primary"
                    value="Agregar"
                />
                <input
                    type="submit"
                    name="btn_modificar"
                    id="btn_modificar"
                    class="btn btn-success"
                    value="Modificar"
                />
                <input
                    type="submit"
                    name="btn_eliminar"
                    id="btn_eliminar"
                    class="btn btn-danger"
                    value="Eliminar"
                />



            </div>
            
        </div>
    </form>

  <!-- SE CREA LA TABLA -->


        <table
            class="table table-striped table-inverse table-responsive"
        >
            <thead class="thead-inverse">
               
                <tr>
                    <th>Codigo</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Puesto</th>
                    <th>Nacimiento</th>
                </tr>
            </thead>
            <tbody id="tbl_empleados">
            <?php
                  include("datos_conexion.php");
                  $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                  $db_conexion ->real_query("select e.id_empleado as id, e.codigo, e.nombres, e.apellidos, e.direccion, e.telefono, p.puesto, e.fecha_nacimiento, e.id_puesto from empleados as e inner join puestos as p on e.id_puesto=p.id_puesto;");
                  $resultado = $db_conexion->use_result();
                  while($fila=$resultado->fetch_assoc()){
                    echo "<tr data-id='" . $fila['id'] . "' data-idp='" . $fila['id_puesto'] . "'>";
                    echo "<td>" . $fila['codigo'] . "</td>";  
                    echo "<td>" . $fila['nombres'] . "</td>"; 
                    echo "<td>" . $fila['apellidos'] . "</td>";  
                    echo "<td>" . $fila['direccion'] . "</td>";  
                    echo "<td>" . $fila['telefono'] . "</td>";  
                    echo "<td>" . $fila['puesto'] . "</td>";  
                    echo "<td>" . $fila['fecha_nacimiento'] . "</td>";  
                    echo "</tr>";
                }
                
                  $db_conexion ->close();
                ?>
             </tbody>
    </table>

    
  

       <!-- Bootstrap JavaScript Libraries  poner un div-->
       <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<script>
    $("#tbl_empleados").on('click', 'tr', function(e) {
    var target = $(this);  
    
    var id = target.data('id');  
    var idp = target.data('idp');  

    var codigo = target.find("td").eq(0).text();
    var nombres = target.find("td").eq(1).text();
    var apellidos = target.find("td").eq(2).text();
    var direccion = target.find("td").eq(3).text();
    var telefono = target.find("td").eq(4).text();
    var nacimiento = target.find("td").eq(6).text();  

    // Asignar los valores al formulario
    $("#text_id").val(id);
    $("#text_codigo").val(codigo);
    $("#text_nombres").val(nombres);
    $("#text_apellidos").val(apellidos);
    $("#text_direccion").val(direccion);
    $("#text_telefono").val(telefono);
    $("#text_fn").val(nacimiento);
    $("#drop_puesto").val(idp);  // Asignar el puesto seleccionado
});

</script>


</body>
</html>
