<?php

class Paso
{
    public function __construct(
        $p_tituloPaso,
        $p_descripcionPaso,
        $p_fotoPaso,
        $p_codManual
    ) {
        $this->tituloPaso = $p_tituloPaso;
        $this->descripcionPaso = $p_descripcionPaso;
        $this->fotoPaso = $p_fotoPaso;
        $this->codManual = $p_codManual;
    }
    public function getTituloPaso()
    {
        return $this->tituloPaso;
    }
    public function setTituloPaso($tituloPaso)
    {
        $this->tituloPaso = $tituloPaso;
    }

    public function getDescripcionPaso()
    {
        return $this->descripcionPaso;
    }
    public function setDescripcionPaso($descripcionPaso)
    {
        $this->descripcionPaso = $descripcionPaso;
    }

    public function getFotoPaso()
    {
        return $this->fotoPaso;
    }
    public function setFotoPaso($fotoPaso)
    {
        $this->fotoPaso = $fotoPaso;
    }

    public function getCodManual()
    {
        return $this->codManual;
    }

    /*comprobar la extensión de la imagen. si es correcto: return true */
    public function validarFotoPaso()
    {
        $ext = pathinfo($this->getFotoPaso(), PATHINFO_EXTENSION);
        $extensionesValidas = array('jpeg', 'png', 'jpg');

        if (!in_array($ext, $extensionesValidas)) {
            return false;
        } else {
            return true;
        }
    }
}
