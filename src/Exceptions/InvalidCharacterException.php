<?php

namespace Shahonseven\MyKad\Exceptions;

use Exception;

class InvalidCharacterException extends Exception
{
    protected $message = 'Invalid MyKad characters';
}