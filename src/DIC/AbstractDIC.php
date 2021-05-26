<?php

namespace srag\DIC\DIC;

use ILIAS\DI\Container;
use srag\DIC\Database\DatabaseDetector;
use srag\DIC\Database\DatabaseInterface;

/**
 * Class AbstractDIC
 *
 * @package srag\DIC\DIC
 */
abstract class AbstractDIC implements DICInterface
{

    /**
     * @var Container
     */
    protected $dic;


    /**
     * @inheritDoc
     */
    public function __construct(Container &$dic)
    {
        $this->dic = &$dic;
    }


    /**
     * @inheritDoc
     */
    public function database() : DatabaseInterface
    {
        return DatabaseDetector::getInstance($this->databaseCore());
    }
}
