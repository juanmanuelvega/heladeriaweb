<?php

class VistaLocalidades
{
  public function listar($localidadesObt)
  {
    echo "<table border='1' class='table table-bordered table-hover'>
         <tr>
                <th>ID</th>
                <th>Localidad</th>
                <th></th>
                <th></th>
          </tr>";
        while ($localidad=mysqli_fetch_array($localidadesObt))
        {
          $id=$localidad['localidadesid'];
          $nombre=$localidad['localidadesnombre'];
          $enlaceEditar="index.php?seccion=localidades&accion1=editar&id=$id";
          $enlaceEliminar="index.php?seccion=localidades&accion=eliminar&id=$id";
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