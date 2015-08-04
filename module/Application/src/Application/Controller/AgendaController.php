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
use Application\Model\AgendaTable as ModelAgenda;

class AgendaController extends AbstractActionController
{

	public function __construct()
	{
		
		$this->data = null;
	}

	public function indexAction()
	{
		try{

			$this->adapter = $this->getServiceLocator()->get('AdapterDb');
			$ModelAgenda = new ModelAgenda($this->adapter); //alias para contatoTable
			$agendas = $ModelAgenda->findById(1);

			foreach ($agendas as $key => $value) {
				$value->dt_ocorencia = date_create($value->dt_ocorencia);
                $value->dt_ocorencia = date_format($value->dt_ocorencia,"d/m/Y H:i:s");
                $this->data['agendas'][] = $value;
                echo $value->descricao;
                die('4');
			}


		}catch(Expection $e){
			die($e->getMessage());
		}
		return new ViewModel($this->data);
	}

	public function cadastroAction()
	{
		return new ViewModel();
	}

 }
