<?php
namespace BaseTraits;

trait ClassTrait
{
    /**
     * Check if supplied value is in an array of allowed values in the child class
     * Required behaviour can be customised to either return boolean or throw an
     * Exception
     * 
     * @param string $valueName
     * @param boolean $returnBoolean
     * @param \Exception $exception
     * @throws \Exception
     * @return void | boolean
     */
    protected function isAllowedValue(
        $valueName = null,
        $returnBoolean = false,
        \Exception $exception
    ) {
        if (!array_key_exists(
            $this->{$valueName}, array_flip($this->{'allowed' . $valueName}))
        ) {
            // If we aren't returning boolean then we want to throw an exception,
            // either a provided one or the default exception
            if (!$returnBoolean) {
                throw (
                    isset($exception) ?
                    $exception :
                    new \Exception("$this->{$valueName} is not an allowed value")
                );
            }
            
            return false;
        }
        
        if ($returnBoolean) {
            return true;
        }
    }
}
