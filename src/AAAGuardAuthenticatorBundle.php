<?php

namespace VerisureLab\Library\AAAGuardAuthenticator;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use VerisureLab\Library\AAAGuardAuthenticator\DependencyInjection\AAAGuardAuthenticatorExtension;

class AAAGuardAuthenticatorBundle extends Bundle
{
    public function getContainerExtension(): AAAGuardAuthenticatorExtension
    {
        return new AAAGuardAuthenticatorExtension();
    }
}