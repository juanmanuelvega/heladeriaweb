<?php
require_once 'app/core/HelperVistas.php';
class VistaProductos
{
  public function listar($productosObt)
  {
    echo "<table border='1' class='table table-bordered table-hover'>
          <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Rubros</th>
                <th></th>
                <th></th>
          </tr>";
        while ($producto=mysqli_fetch_array($productosObt))
        {
          $id=$producto['productosid'];
          $nombre=$producto['productosdescripcion'];
          $precio=$producto['productosprecio'];
          $rubNombres=$producto['rubrosnombre'];
          $enlaceEditar="index.php?seccion=productos&accion=editar&id=$id";
          $enlaceEliminar="index.php?seccion=productos&accion=eliminar&id=$id";
          $onclick='return confirm("¿Estas seguro q desea eliminar al producto '.$nombre.'?")';
          echo "<tr>
                  <td>$id</td>
                  <td>$nombre</td>
                  <td>$precio</td>
                  <td>$rubNombres</td>
                  <td><a href='$enlaceEditar'>Editar</a></td>
                  <td><a href='$enlaceEliminar' onclick='$onclick'>Eliminar</a></td>
                  </tr>";
        }
        echo "</table>";
  }
  public function nuevo(){
            $formulario = file_get_contents('static/formularioproductos.html');
            $datosProducto=array('{productosid}'=>'',
                                '{productosdescripcion}'=>'',
                                '{productosprecio}'=>'',
                                '{contenidoCboRubro}'=> HelperVistas::obtenerContenidoCboRubros(0));

    foreach ($datosProducto as $clave => $valor) {
      $formulario = str_replace($clave, $valor, $formulario);
    }
    print $formulario;
    }
    
    public function editar($registroObtenido){
            $formulario = file_get_contents('static/formularioproductos.html');
            $datosProducto=array('{productosid}'=>$registroObtenido['productosid'],
                                '{productosdescripcion}'=>$registroObtenido['productosdescripcion'],
                                '{productosprecio}'=>$registroObtenido['productosprecio'],
                                '{contenidoCboRubro}'=> HelperVistas::obtenerContenidoCboRubros($registroObtenido['productosrubrosid']));

    foreach ($datosProducto as $clave => $valor) {
      $formulario = str_replace($clave, $valor, $formulario);
    }
    print $formulario;
    }
}