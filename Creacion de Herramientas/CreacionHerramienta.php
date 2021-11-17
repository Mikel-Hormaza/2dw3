<?php 

class Creacion
{
    public function __construct(
        $p_nombreHerramienta,
        $p_categoria,
        $p_fotoHerramienta
    )
    {
        $this->nombreHerramienta = $p_nombreHerramienta;
        $this->categoria = $p_categoria;
        $this->fotoHerramienta = $p_fotoHerramienta;
    }

    public function getNombreHerramienta()
    {
        return $this->nombreHerramienta;
    }
    public function setNombreHerramienta($nombreHerramienta)
    {
        return $this->nombreHerramienta = $nombreHerramienta;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setCategoria($categoria)
    {
        return $this->categoria = $categoria;
    }

    public function getfotoHerramienta()
    {
        return $this->fotoHerramienta;
    }
    public function setfotoHerramienta($fotoHerramienta)
    {
        $this->fotoHerramienta = $fotoHerramienta;
    }

    public function validarFotoPaso()
    {
        $ext = pathinfo($this->getfotoHerramienta(), PATHINFO_EXTENSION);
        $extensionesValidas = array('jpeg', 'png', 'jpg');

        if (!in_array($ext, $extensionesValidas)) {
            return false;
        } else {
            return true;
        }
    }

}




?>
