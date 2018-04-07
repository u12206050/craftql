<?php

namespace markhuot\CraftQL\Builder2\Attributes;

use GraphQL\Type\Definition\Type;

trait HasNameAttribute {

    /** @var string */
    protected $name;

    /**
     * Set the name
     *
     * @param $name
     * @return self
     */
    function name($name): self {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the name
     *
     * @return string
     */
    function getName() {
        return $this->name;
    }

}