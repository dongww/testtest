<?php
/**
 * User: dongww
 * Date: 2016/5/21
 * Time: 14:06
 */

namespace ValueObject\User;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\ExclusionPolicy;
use PhpGo\ApiService\Request\BodyInterface as RequestBodyInterface;
use PhpGo\ApiService\Response\BodyInterface as ResponseBodyInterface;

/**
 * Class User
 * @package ValueObject\User
 * @ExclusionPolicy("none")
 */
class User implements RequestBodyInterface, ResponseBodyInterface
{
    /**
     * @Exclude
     * @Type("array")
     * @var array
     */
    private $groups;
    /**
     * @Type("integer")
     * @var int
     */
    private $userId;

    /**
     * @Type("string")
     * @var  string
     */
    private $realName;


    /**
     * @Type("string")
     * @Groups({"login"})
     * @var  string
     */
    private $pricipalName;

    /**
     * @Type("string")
     * @Groups({"login"})
     * @var  string
     */
    private $password;

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getRealName()
    {
        return $this->realName;
    }

    /**
     * @param string $realName
     */
    public function setRealName($realName)
    {
        $this->realName = $realName;
    }

    /**
     * @return string
     */
    public function getPricipalName()
    {
        return $this->pricipalName;
    }

    /**
     * @param string $pricipalName
     */
    public function setPricipalName($pricipalName)
    {
        $this->pricipalName = $pricipalName;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setGroups(array $groups)
    {
        $this->groups = $groups;
    }

    public function getGroups()
    {
        return $this->groups;
    }
}