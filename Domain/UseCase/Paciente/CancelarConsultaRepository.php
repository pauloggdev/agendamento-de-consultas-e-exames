<?php


interface CancelarConsultaRepository{
    public function CancelarConsulta(Consulta $consulta):Consulta;
}