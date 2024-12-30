<?php

namespace Slvler\Ether\Exception;

use InvalidArgumentException;

class MissingApiKey extends InvalidArgumentException
{
    public static function create(): self
    {
        return new self(
            'The Etherscan API Key is missing. Please publish the [etherscan.php] configuration file and set the [api_key].'
        );
    }
}
