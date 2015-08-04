<?php

namespace Application\Model;

Class Agenda{

	public $id;
	public $id_usuario;
	public $dt_ocorencia;
	public $descricao;



	public function exchangeArray($data)

	{	
		$this->id = (!empty($data['id'])) ? $data['id'] : null;
		$this->id_usuario = (!empty($data['$id_usuario'])) ? $data['$id_usuario'] : null;
		$this->t_ocorencia = (!empty($data['$dt_ocorencia'])) ? $data['$dt_ocorencia'] : null;
		$this->descricao = (!empty($data['$descricao'])) ? $data['$descricao'] : null;
	}
}
