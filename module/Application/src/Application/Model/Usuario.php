<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Model;


class Usuario
{
	public $id;
	public $nome;
	public $login;
	public $senha;
	public $status;
	
	public function exchangeArray($data)
	{
		$this->id = (!empty($data['id'])) ? $data['id'] : null;
		$this->nome = (!empty($data['nome'])) ? $data['nome'] : null;
		$this->login = (!empty($data['login'])) ? $data['login'] : null;
		$this->senha = (!empty($data['senha'])) ? $data['senha'] : null;
		$this->status = (!empty($data['status'])) ? $data['status']: null;
	}
}