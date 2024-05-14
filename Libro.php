<?php
require_once 'MaterialeBibliotecario.php';

class Libro extends MaterialeBibliotecario
{
    protected static $contatoreLibri = 0;
    private $quantitaDisponibile;

    public function __construct($numeroDisponibile)
    {
        $this->quantitaDisponibile = $numeroDisponibile;
        self::$contatoreLibri += $numeroDisponibile;
    }

    public function presta()
    {
        if ($this->quantitaDisponibile > 0) {
            $this->quantitaDisponibile--;
            self::$contatoreLibri--;
        } else {
            echo "I Libri sono finiti Bello !!!.";
        }
    }

    public function restituisci()
    {
        if ($this->quantitaDisponibile < 10) {
            $this->quantitaDisponibile++;
            self::$contatoreLibri++;
        } else {
            echo "Hai finito i libri da restituire Bello !!!";
        }
    }
}
