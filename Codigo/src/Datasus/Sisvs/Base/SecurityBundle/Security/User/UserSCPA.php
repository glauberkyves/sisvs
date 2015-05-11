<?php

namespace Datasus\Sisvs\Base\SecurityBundle\Security\User;

use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserSCPA implements UserInterface, EquatableInterface
{
    private $username;
    private $password;
    private $salt;
    private $attr;
    private $roles = array();

    public function __construct($username, $password, $salt = null, array $roles = array(), $attr = null)
    {
        $this->username = $username;
        $this->password = $password;
        $this->salt     = $salt;
        $this->roles    = $roles;
        $this->attr     = $attr;
    }

    public function eraseCredentials()
    {
    }

    public function isEqualTo(UserInterface $user)
    {
        if (!$user instanceof UserSCPA) {
            return false;
        }

        if ($this->password !== $user->getPassword()) {
            return false;
        }

        if ($this->getSalt() !== $user->getSalt()) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        return true;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return null
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param null $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    public function getNome()
    {
        return $this->attr->getNoUsuario();
    }

    public function getPerfil()
    {
        $roles = array_flip($this->roles);

        if (isset($roles[$this->getCurrentRole()])) {
            return $roles[$this->getCurrentRole()];
        }

        return;
    }

    /**
     * @return mixed
     */
    public function getCurrentRole()
    {
        return current($this->roles);
    }

    /**
     * @return null
     */
    public function getAttr()
    {
        return $this->attr;
    }
}