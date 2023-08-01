<?php
namespace Exceptions;
use JetBrains\PhpStorm\Pure;

class NotfoundExceptions extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
