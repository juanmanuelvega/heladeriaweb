<?php

class VistaRubros
{
  public function listar($rubrosObt)
  {
    echo "<table border='1' class='table table-bordered table-hover'>
         <tr>
                <th>ID</th>
                <th>Rubro</th>
                <th></th>
                <th></th>
          </tr>";
        while ($rubro=mysqli_fetch_array($rubrosObt))
        {
          $id=$rubro['rubrosid'];
          $nombre=$rubro['rubrosnombre'];
          $enlaceEditar="index.php?seccion=rubros&accion1=editar&id=$id";
          $enlaceEliminar="index.php?seccion=rubros&accion=eliminar&id=$id";
          $onclick='return confirm("¿Estas seguro q desea eliminar al cliente '.$nombre.'?")';
          echo "<tr>
                  <td>$id</td>
                  <td>$nombre</td>
                  <td><a href='$enlaceEditar'>Editar</a></td>
                  <td><a href='$enlaceEliminar' onclick='$onclick'>Eliminar</a></td>
                  </tr>";
        }
        echo "</table>";
  }
}