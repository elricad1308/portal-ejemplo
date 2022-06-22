<?php

namespace core;

class DBManager
{

  // Crea un objeto para conectarse a la base de datos
  static function getInstance($f3)
  {
    // Extrae la info de conexión desde la configuración de Fat Free
    $db = new \DB\SQL(
      'mysql:host='  . $f3->get('db_host')
        . ';port='   . $f3->get('db_port')
        . ';dbname=' . $f3->get('db_name')
      , $f3->get('db_user')
      , $f3->get('db_pass')
    );

    // Almacena las sesiones de usuario en la BD
    new \DB\SQL\Session($db);

    return $db;
  }

}