<?php

namespace markhuot\CraftQL\Builder2;

use GraphQL\Type\Definition\Type;
use markhuot\CraftQL\Builder2\Attributes\HasNameAttribute;
use markhuot\CraftQL\Builder2\Attributes\HasResolveAttribute;
use markhuot\CraftQL\Builder2\Attributes\HasTypeAttribute;

class FieldType extends GraphQLBuilder {

    use HasNameAttribute;
    use HasResolveAttribute;
    use HasTypeAttribute;

    protected $lists = false;

    /** @var string */
    protected $graphQLType = null;

    function __construct(string $name) {
        $this->name = $name;
    }

    function config(): array
    {
        return [
            'name' => $this->name,
            'type' => $this->lists ? Type::listOf($this->getRawType()) : $this->getRawType(),
            'resolve' => $this->getResolve(),
        ];
    }

    function lists($lists = true) {
        $this->lists = $lists;
        return $this;
    }

}