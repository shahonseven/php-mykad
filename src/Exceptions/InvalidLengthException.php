<?php

namespace Shahonseven\MyKad\Exceptions;

use Exception;

class InvalidLengthException extends Exception
{
    protected $message = 'Invalid MyKad length';
}