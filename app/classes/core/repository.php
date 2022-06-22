<?php

namespace core;

class Repository
{
  /**
   * Objeto para establecer conexiones con la base de datos.
   */
  protected $db;

  /**
   * Instancia del QueryManager para obtener los queries predefinidos.
   */
  protected $qm;

  /**
   * Instancia del framework Fat-Free.
   */
  protected $f3;

  function __construct ($db)
  {
    $this->db = $db;
    $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    $this->f3 = \Base::instance();
    $this->qm = new QueryManager();
  }

}