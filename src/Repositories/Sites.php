<?php

namespace markhuot\CraftQL\Repositories;

use Craft;

class Sites {

    private $sites = [];

    function load() {
        foreach (Craft::$app->getSites()->getAllSites() as $site) {
            $this->sites[$site->id] = $site;
        }
    }

    function get($id) {
        return $this->sites[$id];
    }

    function all() {
        return $this->sites;
    }

}