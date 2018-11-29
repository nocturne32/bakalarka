<?php
declare(strict_types=1);


namespace App\Model;


use Nette\Security\AuthenticationException;
use Nette\Security\IAuthenticator;
use Nette\Security\Identity;
use Nette\Security\IIdentity;
use Nette\Security\Passwords;

class Authenticator implements IAuthenticator
{
    /** @var UserFacade */
    private $userFacade;

    /**
     * Authenticator constructor.
     * @param UserFacade $userFacade
     */
    public function __construct(UserFacade $userFacade)
    {
        $this->userFacade = $userFacade;
    }

    /**
     * @param array $credentials
     * @return Identity|IIdentity
     * @throws AuthenticationException
     */
    public function authenticate(array $credentials)
    {
        [$username, $password] = $credentials;
        $user = $this->userFacade->findUserBy(['username' => $username]);

        if (!$user || !Passwords::verify($password, $user->password)) {
            throw new AuthenticationException('Invalid credentials');
        }

        if (Passwords::needsRehash($user->password)) {
            $user->update([
                'password' => Passwords::hash($password),
            ]);
        }

        return new Identity($user->getPrimary(), $user->roles, ['username' => $user->username]);
    }
}