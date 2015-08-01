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
// import ModelContatoTable com Alias
use Application\Model\UsuarioTable as ModelUsuario;

//import ModelContatoable com alias
use Application\Model\Pagamento as ModelPagamento;

class UsuarioController extends AbstractActionController
{

	public function __construct()
	{
		
		$this->data = null;
	}

	public function perfilAction()
	{
		return new ViewModel();
	}
	public function dicionarioAction()
	{
		try{
			$this->adapter = $this->getServiceLocator()->get('AdapterDb');
            $ModelPagamento = new ModelPagamento($this->adapter); //alias para contatoTable
            $user = $ModelPagamento->findall();
        }catch(Expection $e){
        die($e->getMessage());
    }
	{
		return new ViewModel();
	}

 }
	public function registroAction()
	{
		try{
			if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']))
			{
				if($_POST['password'] == $_POST['password']){

					$this->adapter = $this->getServiceLocator()->get('AdapterDb');
					$ModelUsuario = new ModelUsuario($this->adapter); //alias para contatoTable
					$user = $ModelUsuario ->save($_POST);
            		if($user){

            		}

				}else{
					$this->data['class'] = 'danger';
					$this->data['msg'] = 'Senha de confirmacao nao condiz';
				}
			}else{
				$this->data['class'] = 'danger';
				$this->data['msg'] = 'Favor preencher todos os campos';
			}
		}catch(Exepction $e){
			die($e->getMessage());
		}
		//var_dump($this->data);
		//die('file');
		//die('chegou');
		$this->data['flag'] = 'registro';

		$view = new ViewModel($this->data);
		$view->setTemplate('application/index/logar.phtml');//path to phtml file under view
		return $view;
		//return new ViewModel();

	}

 }
