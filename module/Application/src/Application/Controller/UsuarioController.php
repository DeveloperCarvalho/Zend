<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Form\Form;

//import Zend\Db
use Zend\DbAdapter\Adapter as Adaptador,
    Zend\Db\Sql\Sql;

//import ModelContatoable com alias
use Application\Model\UsuarioTable as ModelUsuario;

class UsuarioController extends AbstractActionController
{

	public function __construct()
	{
		SESSION_START();
		if(!isset($_SESSION['user']) || empty($_SESSION['user']))
		{
			HEADER('LOCATION:'.$_SERVER['HTTP_REFERER'].'login');
			die('#############');
			//return $this->redirect()->toRouter('logar');
		}
		$this->data = null;
	}

	public function perfilAction()
	{
		return new ViewModel();
	}
	public function dicionarioAction()
	{
		return new ViewModel();
	}
	/**
	*@see: Verifica se o tempo salvo na sessao jã não pasosu os 15 minutos do timeout
	**/

	 private function verif_time_out(){

	}
}
