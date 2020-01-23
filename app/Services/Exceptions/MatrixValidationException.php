<?php
namespace App\Services\Exceptions;

/**
 * Number Format service
 * 
 * @category Exception
 * @package  App\Services\Exceptions
 * @author   Friday Godswill <faradayyg@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     none
 */
class MatrixValidationException extends \Exception
{
    
    /**
     * Create a new exception instance.
     * 
     * @param String $message the error message to be thrown
     *
     * @return void
     */
    public function __construct($message = 'The matrices cannot be multiplied')
    {
        parent::__construct($message);
    }
}