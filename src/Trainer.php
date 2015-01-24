<?php
/**
 * Created by PhpStorm.
 * User: Laura
 * Date: 12/01/15
 * Time: 23:29
 *
 * /bin/doctrine --> orm validator schema --force  (truc dans le genre) --> créer les tables
 * Créer un trainer dans la base : (index.php)
 *  - truc qu'on a fait sur les articles
 * Sur la page index.php récupérer les valeurs du formulaire avec POST et les mettre dans setname et setpassword
 *
 *
 */

namespace lauraam\PokemonBattle;


/**
 * Class Trainer
 * @package lauraam\PokemonBattle
 *
 * @Entity
 * @Table(name="trainer")
 */
class Trainer {

    /**
     * @var int
     *
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(name="id", type="integer")
     */

    private $id;

    /**
     * @var string
     *
     * @Column(name="username", type="string", length=20)
     */
    private $username;

    /**
     * @var string
     *
     * @Column(name="password", type="string", length=10)
     */
    private $password;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @throws \Exception
     * @return Trainer
     */
    public function setUsername($username)
    {
        if (is_string($username))
            $this->username = $username;
        else
            throw new \Exception('Username must be a string');

        return $this;
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
     * @throws \Exception
     * @return Trainer
     */
    public function setPassword($password)
    {

            if (is_string($password))
                $this->password = $password;
            else
                throw new \Exception('Password must be a string');

            return $this;


    }



} 