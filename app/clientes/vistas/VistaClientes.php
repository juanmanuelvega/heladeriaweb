<?php
require_once 'app/core/HelperVistas.php';
class VistaClientes
{
  public function listar($clientesObt)
  {
    echo "<table border='1' class='table table-bordered table-hover'>
         <tr>
                <th>ID</th>
                <th>Apellido y Nombre</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>Localidad</th>
                <th></th>
                <th></th>
          </tr>";
        while ($cliente=mysqli_fetch_array($clientesObt))
        {
          $id=$cliente['clientesid'];
          $nombre=$cliente['clientesnombre'];
          $dni=$cliente['clientesdni'];
          $telefono=$cliente['clientestelefono'];
          $enlaceEditar="index.php?seccion=clientes&accion=editar&id=$id";
          $enlaceEliminar="index.php?seccion=clientes&accion=eliminar&id=$id";
          $onclick='return confirm("¿Estas seguro q desea eliminar al cliente '.$nombre.'?")';
          //$fechaNac=date_create($cliente['clientesfechanac']);
          //$fechaNacimiento=date_format($fechaNac,'d/m/Y');
          echo "<tr>
                  <td>$id</td>
                  <td>$nombre</td>
                  <td>$dni</td>
                  <td>$telefono</td>";
                  //tambien se puede concatenar de manera diirecta el elemento de 
                  //array con el texto html en vez de colocarlo en una variable y 
                  //luego de imprimir la variable;     
            echo "<td>".$cliente['localidadesnombre']."</td>
                  <td><a href='$enlaceEditar'>Editar</a></td>
                  <td><a href='$enlaceEliminar' onclick='$onclick'>Eliminar</a></td>
                  </tr>";
        }
        echo "</table>";
    }
    
    public function nuevo(){
            $formulario = file_get_contents('static/formularioclientes.html');
            $datosCliente=array('{clientesid}'=>'',
                                '{clientesnombre}'=>'',
                                '{clientesdni}'=>'',
                                '{clientestelefono}'=>'',
                                '{clientesfechanacimiento}'=>'',
                                '{contenidoCboLocalidad}'=> HelperVistas::obtenerContenidoCboLocalidades(0),
                                '{clientesfoto}'=>'silueta.jpg');

    foreach ($datosCliente as $clave => $valor) {
      $formulario = str_replace($clave, $valor, $formulario);
    }
    print $formulario;
    }
    
    public function editar($registroObtenido){
            $formulario = file_get_contents('static/formularioclientes.html');
            if ($registroObtenido['clientesfoto']=="")
                $foto="silueta.jpg";
            else
                $foto=$registroObtenido['clientesfoto'];
            
            $datosCliente=array('{clientesid}'=>$registroObtenido['clientesid'],
                                '{clientesnombre}'=>$registroObtenido['clientesnombre'],
                                '{clientesdni}'=>$registroObtenido['clientesdni'],
                                '{clientestelefono}'=>$registroObtenido['clientestelefono'],
                                '{clientesfechanacimiento}'=>$registroObtenido['clientesfechanacimiento'],
                                '{contenidoCboLocalidad}'=> HelperVistas::obtenerContenidoCboLocalidades($registroObtenido['clienteslocalidadesid']),
                                '{clientesfoto}'=>$foto);

    foreach ($datosCliente as $clave => $valor) {
      $formulario = str_replace($clave, $valor, $formulario);
    }
    print $formulario;
    }
}