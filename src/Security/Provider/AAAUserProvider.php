<?php

namespace VerisureLab\Library\AAAGuardAuthenticator\Security\Provider;

use VerisureLab\Library\AAAGuardAuthenticator\Security\User;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use VerisureLab\Library\AAAApiClient\Service\ApiClient;

class AAAUserProvider implements UserProviderInterface
{
    /**
     * @var ApiClient
     */
    private $apiClient;

    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function loadUserByUsername($token)
    {
        try {
            return User::fromAAAInfo($this->apiClient->info($token));
        } catch (\Throwable $e) {
            throw new CustomUserMessageAuthenticationException('Cannot retrieve user info', [], $e->getCode(), $e);
        }
    }

    public function refreshUser(UserInterface $user)
    {
        throw new \RuntimeException('This method should not be called');
    }

    public function supportsClass($class): bool
    {
        return true;
    }
}