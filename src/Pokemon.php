<?php
/**
 * Created by PhpStorm.
 * User: Laura
 * Date: 13/01/15
 * Time: 14:16
 */

namespace lauraam\PokemonBattle;

/**
 * Class Pokemon
 * @package lauraam\PokemonBattle
 *
 * @Entity
 * @Table(name="pokemon")
 */
class Pokemon {

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
     * @Column(name="name", type="string", length=20)
     */
    private $name;

    /**
     * @var int
     * @Column(name="hp", type="integer", length=20)

     */
    private $hp;


    /**
     * @var int
     *
     * @Column(name="type", type="smallint", length=1)
     */
    private $type;

    const TYPE_WATER = 0;

    const TYPE_FIRE = 1;

    const TYPE_PLANT = 2;

    /**
     * @var trainer
     *
     * @OneToOne(targetEntity="Trainer")
     */
    private $trainer;

    /**
     * @var int
     *
     * @Column(name="timeFight", type="integer", length=10)
     */
    private $timeFight;


    /**
     * @var int
     *
     * @Column(name="restart", type="integer", length=10)
     */
    private $restart;





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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @throws \Exception
     * @return Pokemon
     */
    public function setName($name)
    {
        if (is_string($name))
            $this->name = $name;
        else
            throw new \Exception('Name must be a string');

        return $this;
    }

    /**
     * @return int
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * @param int $hp
     * @throws \Exception
     * @return Pokemon
     */
    public function setHp($hp)
    {
        if (is_int($hp))
            $this->hp = $hp;
        else
            throw new \Exception('HP must be an int');

        return $this;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @throws \Exception
     * @return Pokemon
     */
    public function setType($type)
    {
        if (true === in_array($type, [
                self::TYPE_WATER,
                self::TYPE_FIRE,
                self::TYPE_PLANT,
            ]))
            $this->type = $type;
        else
            throw new \Exception('Type is not valid');

        return $this;
    }

    /**
     * @return int
     */
    public function getTrainer()
    {
        return $this->trainer;
    }

    /**
     * @param object $trainer
     * @throws \Exception
     * @return Pokemon
     */
    public function setTrainer($trainer)
    {
        if (is_object($trainer))
            $this->trainer = $trainer;
        else
            throw new \Exception('Trainer must be a string');

        return $this;
    }


    /**
     * @return int
     */
    public function getTimeFight()
    {
        return $this->timeFight;
    }

    /**
     * @param int $timeFight
     * @throws \Exception
     * @return Pokemon
     */
    public function setTimeFight($timeFight)
    {
        if (is_int($timeFight))
            $this->timeFight = $timeFight;
        else
            throw new \Exception('Time fight must be an integer');

        return $this;

    }

    /**
     * @return int
     */
    public function getRestart()
    {
        return $this->restart;
    }

    /**
     * @param int $restart
     * @throws \Exception
     * @return Pokemon
     */
    public function setRestart($restart)
    {
        if (is_int($restart))
            $this->restart = $restart;
        else
            throw new \Exception('Restart must be an integer');

        return $this;
    }



} 