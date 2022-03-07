<?php

namespace Timedoor\TmdGitTag\Exceptions;

use RuntimeException;

class GitTagNotFoundException extends RuntimeException
{
    public function __construct()
    {
        return parent::__construct( parent::getMessage() );
    }
}
