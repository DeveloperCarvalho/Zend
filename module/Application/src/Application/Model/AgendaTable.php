<?php

// namespace de localizacao do nosso model
namespace Application\Model;
 
// import ZendDb
use Zend\Db\Adapter\Adapter,
    Zend\Db\ResultSet\ResultSet,
    Zend\Db\TableGateway\TableGateway;
 
class AgendaTable
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
        $resultSetPrototype->setArrayObjectPrototype(new Agenda());
 
        $this->tableGateway = new TableGateway('agendas', $adapter, null, $resultSetPrototype);
    }

    /**
     * @see Localizar linha especifico pelo id da tabela usuario
     * 
     * @param type $data
     * @return ModelUsuario
     * @throws Exception
     */
    public function findById($id)
    {
        try {
            var_dump( $this->tableGateway->select(array('id_usuario' => $id)) );
            //return $this->tableGateway->select(array('id_usuario' => $id));
        } catch (Exception $e) {
            throw new Exception("Error Processing Request #401");
        }
    }
     
}