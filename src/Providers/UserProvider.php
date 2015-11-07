<?php
/**
 * Created by PhpStorm.
 * User: Максим В. Янушев
 * Date: 15.07.15
 * Time: 21:33
 */

namespace Providers;


use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

class UserProvider implements UserProviderInterface {

    public $users;
    public $encoder;
    public function __construct(){
        $this->encoder=new MessageDigestPasswordEncoder();
        $this->users=array("admin"=>"admin");
    }


    public function loadUserByUsername($username)
    {
        $username=strtolower($username);
        if (is_null($this->users[$username])) {
            throw new UsernameNotFoundException(sprintf('Username "%s" does not exist.', $username));
        }

        return new User($username,
                            $this->encoder->encodePassword($this->users[$username],""),
                            array(), true, true, true, true);
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === 'Symfony\Component\Security\Core\User\User';
    }

} 