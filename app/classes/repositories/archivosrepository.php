<?php

namespace repositories;

class ArchivosRepository extends \core\Repository
{
  public function getFileSource($url)
  {
    $query = $this->qm->getQuery("selectUbicacionSourceByURL");
    $result = $this->db->exec($query, ["url" => $url]);

    return $result ? $result[0] : $result;
  }
}