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




class UsuarioController extends AbstractActionController
{

	public function __construct()
    {
    	SESSION_START();
      if(!isset($_SESSION['user']) || empty($_SESSION['user']))
      {
      	header('location:'.$_SERVER['HTTP_REFERER'].'logar');
      	die('###########');
      	//return $this->redirect()->toRoute('logar');
      }
      $this->data = null;
  }

    public function perfilAction()
    {
      return new ViewModel();
  	}

  	/**
  	*@see: verifica se o tempo salvo na sessao ja nao passou os 15 minutos de timeout
  	*
  	**/

  	private function verif_time_out()
  	{

  		try{

  			if(isset($_SESSION['timer']) )
  			{
  				$diferenca = date('Y/m/d') - $_SESSION['timer'];
  				return;
  			}
  			$this->data['class'] = 'warning';
  			$this->data['retorno'] = 'Sua sessao expirou, faça login novamente';
  			return $this->data;
  		}catch(Exception $e){
  			die($e->getMessage());
  		}
  	}
  }
