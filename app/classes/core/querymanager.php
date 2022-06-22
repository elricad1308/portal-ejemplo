<?php

namespace core;

class QueryManager
{

  public function getQuery ($key)
  {
    switch ($key)
    {
      case 'selectUbicacionSourceByURL':
        return "SELECT 
          s.ubicacion
          , s.tipo
        FROM archivos a
        INNER JOIN archivos_source s
          ON a.id_archivo = s.id_archivo_src
        WHERE a.url = :url";
    }
  }

}