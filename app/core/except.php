<?php

class ERR
{
    const NO_DATA_FOR_VIEW = 1;
    const FATAL_ERROR = 100;
}

class ErrGetModelDataException extends Exception {}

class ErrDBConnection extends Exception {}

class NoDataException extends Exception
{
    public function outMessage()
    {
        if ($this->getCode() == ERR::NO_DATA_FOR_VIEW) {
            echo '<center>Error load module ', $this->getMessage(), '</center>';
        }
    }
}