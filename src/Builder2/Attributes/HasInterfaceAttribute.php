<?php

namespace markhuot\CraftQL\Builder2\Attributes;

trait HasInterfaceAttribute {

    protected $interfaces = [];

    function interface($interface) {
        $this->interfaces[] = $interface;
        return $this;
    }

    function getInterfaces() {
        return $this->interfaces;
    }

}