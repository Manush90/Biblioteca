<?php
require_once 'MaterialeBibliotecario.php';

class DVD extends MaterialeBibliotecario
{
    protected static $contatoreDVD = 0;
    private $quantitaDisponibile;

    public function __construct($numeroDisponibile)
    {
        $this->quantitaDisponibile = $numeroDisponibile;
        self::$contatoreDVD += $numeroDisponibile;
    }

    public function presta()
    {
        if ($this->quantitaDisponibile > 0) {
            $this->quantitaDisponibile--;
            self::$contatoreDVD--;
        } else {
            echo "Sono finiti i DVD bello !";
        }
    }

    public function restituisci()
    {
        if ($this->quantitaDisponibile < 10) {
            $this->quantitaDisponibile++;
            self::$contatoreDVD++;
        } else {
            echo "Non puoi restituire altri DVD Bello !.";
        }
    }
}
