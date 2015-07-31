<?php

namespace Aplication\Model;


Class Pagamento{

	public $id;
	public $usuario_id;
	public $tech;
	public $forma_pagamento;
	public $num_parcelas;
	public $valor_parcela;
	public $serialize;
	public $codigo_retorno;
	public $msg_retorno;
	public $dt_pedido;
	public $status;


	public function exchangeArray($data)

	{
		$this->id = (!empty($data['id'])) ? $data['id'] : null;
		$this->$usuario_id = (!empty($data['$usuario_id'])) ? $data['$usuario_id'] : null;
		$this->$tech = (!empty($data['$tech'])) ? $data['$tech'] : null;
		$this->$forma_pagamento = (!empty($data['$forma_pagamento'])) ? $data['$forma_pagamento'] : null;
		$this->$num_parcelas = (!empty($data['$num_parcelas'])) ? $data['$num_parcelas'] : null;
		$this->$valor_parcela = (!empty($data['$valor_parcela'])) ? $data['$valor_parcela'] : null;
		$this->$serialize = (!empty($data['$serialize'])) ? $data['$serialize'] : null;
		$this->$codigo_retorno = (!empty($data['$codigo_retorno'])) ? $data['$codigo_retorno'] : null;
		$this->$msg_retorno = (!empty($data['$msg_retorno'])) ? $data['$msg_retorno'] : null;
		$this->$dt_pedido = (!empty($data['$dt_pedido'])) ? $data['$dt_pedido'] : null;
		$this->$status = (!empty($data['$status'])) ? $data['$status'] : null;
	}
	}
}