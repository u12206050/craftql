<?php

namespace markhuot\CraftQL\Builder2;

class SchemaType extends GraphQLBuilder {

    /** @var string */
    protected $graphQLType = \GraphQL\Type\Schema::class;

    /** @var Object */
    public $query;

    /** @var Object */
    public $mutation;

    /** @var ObjectType[] */
    protected $types = [];

    /**
     * SchemaType constructor.
     */
    function __construct() {
        $this->query = $this->newObject('Query');
        $this->mutation = $this->newObject('Mutation');
    }

    /**
     * Get a configuration array
     *
     * @return array
     */
    protected function config(): array {
        $config = [];

        if ($this->query->hasFields()) {
            $config['query'] = $this->query->toGraphQL();
        }

        if ($this->mutation->hasFields()) {
            $config['mutation'] = $this->mutation->toGraphQL();
        }

        if (!empty($this->types)) {
            $config['types'] = array_map(function(ObjectType $type) {
                return $type->toGraphQL();
            }, $this->types);
        }

        return $config;
    }

    function query(Object $query=null) {
        $this->query = $query;
        return $this;
    }

    function addType(Object $type) {
        $this->types[] = $type;
        return $this;
    }

}