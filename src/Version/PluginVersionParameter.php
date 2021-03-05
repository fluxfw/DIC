<?php

namespace srag\DIC\Version;

use ilUtil;
use srag\DIC\DICTrait;
use srag\DIC\Plugin\Pluginable;
use srag\DIC\Plugin\PluginInterface;

/**
 * Class PluginVersionParameter
 *
 * @package srag\DIC\Version
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class PluginVersionParameter implements Pluginable
{

    use DICTrait;

    /**
     * @var PluginInterface|null
     */
    protected $plugin = null;


    /**
     * PluginVersionParameter constructor
     */
    private function __construct()
    {

    }


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        return new self();
    }


    /**
     * @param string $url
     *
     * @return string
     */
    public function appendToUrl(string $url) : string
    {
        if ($this->plugin === null) {
            return $url;
        }

        $params = [
            "version" => $this->plugin->getPluginObject()->getVersion()
        ];

        $hash = hash("sha256", base64_encode(json_encode($params)));

        return ilUtil::appendUrlParameterString($url, "plugin_version=" . $hash);
    }


    /**
     * @inheritDoc
     */
    public function getPlugin() : PluginInterface
    {
        return $this->plugin;
    }


    /**
     * @inheritDoc
     */
    public function withPlugin(PluginInterface $plugin) : self
    {
        $this->plugin = $plugin;

        return $this;
    }
}
