<?php

namespace markhuot\CraftQL\Builder2\Attributes;

use GraphQL\Type\Definition\Type;
use markhuot\CraftQL\Builder2\GraphQLBuilder;
use markhuot\CraftQL\Builder2\ObjectType;

trait HasTypeAttribute {

    /** @var string */
    protected $type;

    /**
     * Set the name
     *
     * @param $type
     * @return self
     */
    function type($type) {
        $this->type = $type;
        return $this;
    }

    /**
     * Get the type
     *
     * @return string
     */
    function getType() {
        return $this->type ?: Type::string();
    }

    function getRawType() {
        $type = $this->getType();

        if (is_a($this->type, ObjectType::class)) {
            return $type->toGraphQL();
        }

        return $type;
    }

}