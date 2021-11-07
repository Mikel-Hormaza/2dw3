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
        $this->tituloManual=$p_tituloManual;
        $this->descripcionManual=$p_descripcionManual;
        $this->equipoNecesario=$p_equipoNecesario;
        $this->medidasDeSeguridad=$p_medidasDeSeguridad;
        $this->fotoManual=$p_fotoManual;
        $this->codHerramienta=$p_codHerramienta;
        $this->codUsuario=$p_codUsuario;
        $this->fechaCreacion=$p_fechaCreacion;
    }
    public function getTituloManual() {
        return $this->tituloManual;
    }
    public function setTituloManual($tituloManual){
        $this->tituloManual = $tituloManual;
    }

    public function getDescripcionManual() {
        return $this->descripcionManual;
    }
    public function setDescripcionManual($descripcionManual){
        $this->descripcionManual = $descripcionManual;
    }

    public function getEquipoNecesario() {
        return $this->equipoNecesario;
    }
    public function setEquipoNecesario($equipoNecesario){
        $this->equipoNecesario = $equipoNecesario;
    }

    public function getMedidasDeSeguridad() {
        return $this->medidasDeSeguridad;
    }
    public function setMedidasDeSeguridad($medidasDeSeguridad){
        $this->medidasDeSeguridad = $medidasDeSeguridad;
    }

    public function getFotoManual() {
        return $this->fotoManual;
    }
    public function setFotoManual($fotoManual){
        $this->fotoManual = $fotoManual;
    }

    public function getCodHerramienta() {
        return $this->codHerramienta;
    }
    public function setCodHerramienta($codHerramienta){
        $this->codHerramienta = $codHerramienta;
    }    
    
    public function getFechaCreacion() {
        return $this->fechaCreacion;
    }
    public function setFechaCreacion($fechaCreacion){
        $this->fechaCreacion = $fechaCreacion;
    }
}
