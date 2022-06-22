<?php

namespace core;

class Archivos 
{

  /**
   * Instancia de la clase ArchivoRepository para interactuar con las
   * tablas de archivos de la Base de Datos.
   */
  private $archivoRepo;

  /**
   * Instancia del framework Fat Free
   */
  private $f3;

  /**
   * Objeto para establecer conexiones con la base de datos.
   */
  private $db;

  /**
   * Instancia de la librería Gregwar Image, usada para la manipulaciòn
   * de imàgenes.
   */
  private $images;

  function __construct ()
  {
    $this->f3 = \Base::instance();
    $this->db = DBManager::getInstance($this->f3);
    $this->archivosRepo = new \repositories\ArchivosRepository($this->db);
  }

  public function hola ()
  {
    echo "Hello Fat-Free!";
  }

  public function getImagen()
  {
    $url = $this->f3->get("PARAMS.0");
    $src = $this->archivosRepo->getFileSource($url);
    $path = $_SERVER['DOCUMENT_ROOT'] . $this->f3->get('BASE');
    $width = $this->f3->get("GET.w");

    // Indica al cliente el tipo de respuesta que recibirá
    header('Content-type: ' . $src["tipo"]);

    // Envìa la imagen, por bloques por si èsta es muy grande
    $handle = fopen($path . $src["ubicacion"], 'rb');
    while(!feof($handle)) 
    {
      echo fread($handle, 8192);
    }
    fclose($handle);
    die;
  }

}