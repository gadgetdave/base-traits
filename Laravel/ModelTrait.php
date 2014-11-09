<?php
namespace BaseTraits;

trait ModelTrait
{
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    
    protected $setPrimaryKey = true;
    protected $setTableName = true;
    
    public static $snakeAttributes = false;
    
    public function __construct(array $attributes = array())
    {
        $this->setup();
        
        parent::__construct($attributes);
    }
    
    protected function setup()
    {
        if ($this->setPrimaryKey) {
            $this->setPrimaryKey();
        }
        
        if ($this->setTableName) {
            $this->setTableName();
        }
    }
    
    protected function setPrimaryKey()
    {
        $this->primaryKey = lcfirst(get_class($this)) . 'Id';
    }
    
    protected function setTableName()
    {
        $this->table = lcfirst(get_class($this));
    }
}