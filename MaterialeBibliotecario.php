<?php

class MaterialeBibliotecario
{
    protected static $contatoreMateriali = 0;

    public static function contaLibri()
    {
        return Libro::$contatoreLibri;
    }

    public static function contaDVD()
    {
        return DVD::$contatoreDVD;
    }
}
