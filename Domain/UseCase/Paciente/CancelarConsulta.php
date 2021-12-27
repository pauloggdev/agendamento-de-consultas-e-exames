<?php

class CancelarConsulta
{
    private CancelarConsultaRepository $repository;
    public function __construct(CancelarConsultaRepository $repository)
    {
        $this->repository = $repository;
    }
    public function handle()
    {
    }
}
