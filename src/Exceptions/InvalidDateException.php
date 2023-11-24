<?php

namespace Shahonseven\MyKad\Exceptions;

use Exception;

class InvalidDateException extends Exception
{
    protected $message = 'Invalid MyKad date of birth';
}