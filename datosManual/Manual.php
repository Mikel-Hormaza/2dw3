<?php

class Manual
{
    public function __construct(
        $p_tituloManual,
        $p_descripcionManual,
        $p_equipoNecesario,
        $p_medidasDeSeguridad,
        $p_fotoManual,
        $p_codHerramienta,
        $p_codUsuario,
        $p_fechaCreacion
    ) {
        $this->tituloManual = $p_tituloManual;
        $this->descripcionManual = $p_descripcionManual;
        $this->equipoNecesario = $p_equipoNecesario;
        $this->medidasDeSeguridad = $p_medidasDeSeguridad;
        $this->fotoManual = $p_fotoManual;
        $this->codHerramienta = $p_codHerramienta;
        $this->codUsuario = $p_codUsuario;
        $this->fechaCreacion = $p_fechaCreacion;
    }
    public function getTituloManual()
    {
        return $this->tituloManual;
    }

    public function getDescripcionManual()
    {
        return $this->descripcionManual;
    }

    public function getEquipoNecesario()
    {
        return $this->equipoNecesario;
    }

    public function getMedidasDeSeguridad()
    {
        return $this->medidasDeSeguridad;
    }

    public function getFotoManual()
    {
        return $this->fotoManual;
    }

    public function getCodHerramienta()
    {
        return $this->codHerramienta;
    }

    public function getCodUsuario()
    {
        return $this->codUsuario;
    }

    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /*comprobar la extensión de la imagen. si es correcto: return true */
    public function validarFotoManual()
    {
        $ext = pathinfo($this->getFotoManual(), PATHINFO_EXTENSION);
        $extensionesValidas = array('jpeg', 'png', 'jpg');

        if (!in_array($ext, $extensionesValidas)) {
            return false;
        } else {
            return true;
        }
    }
}
