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

//import Zend\Db
use Zend\Db\Adapter\Adapter as Adaptador,
    Zend\Db\Sql\Sql;

// import ModelContatoTable com Alias
use Application\Model\UsuarioTable as ModelUsuario;

class IndexController extends AbstractActionController
{
    public function __construct()
    {
      $this->data = null;
    	SESSION_START();
    }

    public function indexAction()
    {
        return new ViewModel();
    }
    public function servicoAction()
    {
    	return new ViewModel();
    }
    public function contatoAction()
    {
    	try{
    		if(isset($_POST) && !empty($_POST))
    		{
           $html = "Ola".$_POST['name']."<br/>";
           $html +="Obrigado por entrar em contato <br/>";
           $html +="Assim que possivel retornaremos o seu contato";
           $html +="<table border='1'>";
           $html +="<tr>Email<td></td><td>".$_POST['email']."<td></tr>";
           $html +="<tr>Telefone<td></td><td>".$_POST['mobile']."<td></tr>";
           $html +="<tr>Mensagem<td></td><td>".$_POST['message']."<td></tr>";
           $html +="</table>";

           $destinatario = $_POST['email'];
           $assunto = $_POST['subject'];
           $remetente = 'suporte@teste.com.br';

           if(mail($destinatario,$html,$assunto,$remetente))
           {
           		$this->data['class'] = 'success';
           		$this->data['retorno'] = 'Email enviado com sucesso';
           }else{

           		$this->data['class'] = 'danger';
           		$this->data['retorno'] = 'Não foi possivel enviar o seu email';
           }

    		}
    	}catch(Exception $e){
    		die ($e->getMessage());
		    
	    }
	    return new ViewModel($this->data);
    }
    /**
    *@see:verifica se o post enviado da tela e igual a user = root 
    *senha = md5(65432211), caso seja aparece na tela login correto;
    *caso nao aparece login ou senha invalidos
    **/

    public function logarAction()
    {
        try {
            if(isset($_POST) && !empty($_POST))
            {
                $Adapter = $this->getServiceLocator()->get('AdapterDb');
                $ModelUsuario = new ModelUsuario($Adapter); //alias para contatoTable
                $user = $ModelUsuario ->findUser($_POST);
                if($user){
                    if($user->status){
                      
                         $_SESSION['user'] = $_POST['username'];
                        $_SESSION['timer'] = date('Y/m/d');
                        return $this->redirect()->toRoute('perfil');
                    }else{
                        $this->data['class']='warning';
                        $this->data['msg']='Login errado';
                    }
                }else{
                    $this->data['class'] = 'danger';
                    $this->data['msg'] = 'Login ou senha inativo';
                }
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return new ViewModel($this->data);
    }

  }
