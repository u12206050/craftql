<?php

namespace markhuot\CraftQL\Builder2;

abstract class GraphQLBuilder {

    /** @var string */
    protected $graphQLType = \GraphQL\Type\Definition\ObjectType::class;

    /**
     * Get a configuration array
     *
     * @return array
     */
    abstract protected function config(): array;

    /**
     * Serialize the builder down to a native GraphQL implementation
     *
     * @return mixed
     */
    function toGraphQL() {
        if ($className = $this->graphQLType) {
            return new $className($this->config());
        }

        return $this->config();
    }

}