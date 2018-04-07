<?php

namespace markhuot\CraftQL\Builder2;

use GraphQL\Type\Definition\Type;
use markhuot\CraftQL\Builder2\Attributes\HasNameAttribute;

class FieldType extends GraphQLBuilder {

    use HasNameAttribute;

    /** @var string */
    protected $graphQLType = null;

    function __construct(string $name) {
        $this->name = $name;
    }

    function config(): array
    {
        return [
            'name' => $this->name,
            'type' => Type::string(),
        ];
    }

}