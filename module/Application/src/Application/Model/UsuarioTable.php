<?php

// namespace de localizacao do nosso model
namespace Application\Model;
 
// import ZendDb
use Zend\Db\Adapter\Adapter,
    Zend\Db\ResultSet\ResultSet,
    Zend\Db\TableGateway\TableGateway;
 
class UsuarioTable
{
    protected $tableGateway;
 
    /**
     * Contrutor com dependencia do Adapter do Banco
     * 
     * @param Adapter $adapter
     */
    public function __construct(Adapter $adapter)
    {
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Usuario());
 
        $this->tableGateway = new TableGateway('usuarios', $adapter, null, $resultSetPrototype);
    }
    
    /**
     * Localizar linha especifico pelo id da tabela usuario
     * 
     * @param type $id
     * @return ModelUsuario
     * @throws Exception
     */
    public function find($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new Exception("Não foi encontrado usuario de id = {$id}");
        }
 
        return $row;
    }

    /**
     * @see Localizar linha especifico pelo id da tabela usuario
     * 
     * @param type $data
     * @return ModelUsuario
     * @throws Exception
     */
    public function findUser($data)
    {
        try {
            $rowset = $this->tableGateway->select(array('login' => $data['username'], 'senha' => md5($data['password'])));
            $row = $rowset->current();
            return $row;
        } catch (Exception $e) {
            throw new Exception("Error Processing Request #401");
        }
    }
     public function save($data)
    {
        try{
    

        $data = array(

            'nome' => $data['username'],
            'login'    => $data['email'],
            'senha' => md5($data['password']),
            'status'   => 1,
        );
    
        return $this->tableGateway->insert($data);
    }catch(Exception $e){

        throw new Exception($e->getMessage());
    }
     
      
        //try {
           // $rowset = $this->tableGateway->select(array('login' => $data['username'], 'senha' => md5($data['password'])));
           // $row = $rowset->current();
           // return $row;
       // } catch (Exception $e) {
           // throw new Exception("Error Processing Request #401");
        //}
    }
}