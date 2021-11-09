<?php

namespace Mk\Feed\Generators\LuigiAvailability;


use Mk, Nette;

/**
 * Class Image
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators\Heureka
 */
class Depot
{
    /* Použití smartobject viz php 7.2 to nette 2.4 */
    use \Nette\SmartObject;



    /** @var string */
    private $id;
    /**
     * @var int
     */
    private $stock;



    /** @var \DateTime */
    protected $orderDeadline;

    /** @var \DateTime */
    protected $orderDeliveryTime;

    /**
     * Depot constructor.
     * @param string $id
     * @param int $stock
     * @param \DateTime $orderDeadline
     * @param \DateTime $orderDeliveryTime
     */
    public function __construct(string $id, int $stock, \DateTime $orderDeadline, \DateTime $orderDeliveryTime) {
        $this->id = $id;
        $this->stock = $stock;
        $this->orderDeadline = $orderDeadline;
        $this->orderDeliveryTime = $orderDeliveryTime;
    }


    /**
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getStock(): int {
        return $this->stock;
    }

    /**
     * @return \DateTime
     */
    public function getOrderDeadline(): \DateTime {
        return $this->orderDeadline;
    }

    /**
     * @param \DateTime $orderDeadline
     * @return Depot
     */
    public function setOrderDeadline(\DateTime $orderDeadline): Depot {
        $this->orderDeadline = $orderDeadline;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getOrderDeliveryTime(): \DateTime {
        return $this->orderDeliveryTime;
    }

    /**
     * @param \DateTime $orderDeliveryTime
     * @return Depot
     */
    public function setOrderDeliveryTime(\DateTime $orderDeliveryTime): Depot {
        $this->orderDeliveryTime = $orderDeliveryTime;
        return $this;
    }





}
