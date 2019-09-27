<?php

namespace VerisureLab\Library\AAAGuardAuthenticator\Security;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    /**
     * @var string
     */
    private $clientIdentifier;

    /**
     * @var string
     */
    private $username;

    /**
     * @var array
     */
    private $roles;

    /**
     * @param array $info
     *
     * @return User
     */
    public static function fromAAAInfo(array $info): self
    {
        $user = new static();
        $user->clientIdentifier = $info['client'];
        $user->username = $info['email'];
        $user->roles = $info['roles'];

        return $user;
    }

    /**
     * Get clientIdentifier
     *
     * @return string
     */
    public function getClientIdentifier(): string
    {
        return $this->clientIdentifier;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getPassword(): string
    {
        return '';
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function eraseCredentials(): void
    {
        // No actions
    }
}