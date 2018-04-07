<?php

namespace markhuot\CraftQL\Builder2;

use markhuot\CraftQL\Builder2\Attributes\HasNameAttribute;

class ObjectType extends GraphQLBuilder {

    use HasNameAttribute;

    /** @var ObjectType[] */
    protected $fields = [];

    /**
     * ObjectType constructor.
     * @param $name
     */
    function __construct(string $name) {
        $this->name = $name;
    }

    /**
     * Get a configuration array
     *
     * @return array
     */
    protected function config(): array {
        return [
            'name' => $this->name,
            'fields' => array_map(function (FieldType $field) {
                return $field->toGraphQL();
            }, $this->fields),
        ];
    }

    function hasFields() {
        return count($this->fields) > 0;
    }

    function addStringField($name) {
        return $this->fields[] = new FieldType($name);
    }

}