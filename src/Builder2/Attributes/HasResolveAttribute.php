<?php

namespace markhuot\CraftQL\Builder2\Attributes;

use markhuot\CraftQL\Builder2\Stack\Queue;

trait HasResolveAttribute {

    /** @var callable|string */
    protected $resolve;

    /**
     * Set the name
     *
     * @param $name
     * @return self
     */
    function resolve($resolve): self {
        $this->resolve = $resolve;
        return $this;
    }

    /**
     * Get the name
     *
     * @return string
     */
    function getResolve() {
        if (empty($this->resolve)) {
            return null;
        }

        return function($root, $args, $context, $info) {
            if (is_callable($this->resolve)) {
                return call_user_func_array([$this, 'resolve'], [$root, $args, $context, $info]);
            }
            else {
                return $this->resolve;
            }
        };
    }

}