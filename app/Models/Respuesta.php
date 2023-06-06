<?php

namespace App\Models;

use CodeIgniter\Model;

class Respuesta extends Model
{
    protected $table      = 'encuesta';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'N';
    protected $allowedFields = ['Pregunta1', 'Pregunta2', 'Pregunta3', 'Pregunta4', 'Pregunta5'];


    public function obtenerDatosEncuesta1()
    {
        $query = $this->select('Pregunta1,COUNT(*) as total')
            ->groupBy('Pregunta1')
            ->findAll();

        return $query;
    }

    public function obtenerDatosEncuesta2()
    {
        $query = $this->select('Pregunta2,COUNT(*) as total')
            ->groupBy('Pregunta2')
            ->findAll();

        return $query;
    }

    public function obtenerDatosEncuesta3()
    {
        $query = $this->select('Pregunta3,COUNT(*) as total')
            ->groupBy('Pregunta3')
            ->findAll();

        return $query;
    }

    public function obtenerDatosEncuesta4()
    {
        $query = $this->select('Pregunta4,COUNT(*) as total')
            ->groupBy('Pregunta4')
            ->findAll();

        return $query;
    }

    public function obtenerDatosEncuesta5()
    {
        $query = $this->select('Pregunta5,COUNT(*) as total')
            ->groupBy('Pregunta5')
            ->findAll();

        return $query;
    }

    public function obtenerResultado($data)
    {
        $Encuesta = $this->db->table('encuesta');
        $Encuesta->where($data);
        return $Encuesta->get()->getResultArray();
    }

}
