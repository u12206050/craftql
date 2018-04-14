<?php

namespace markhuot\CraftQL\Builder2\Attributes;

use GraphQL\Type\Definition\Type;
use markhuot\CraftQL\Builder2\DateFieldType;
use markhuot\CraftQL\Builder2\EnumFieldType;
use markhuot\CraftQL\Builder2\FieldType;
use markhuot\CraftQL\Builder2\UnionFieldType;

trait HasFieldsConfig {

    /** @var ObjectType[] */
    protected $fields = [];

    /**
     * Whether this object has any fields defined.
     *
     * @return bool
     */
    function hasFields() {
        return count($this->fields) > 0;
    }

    /**
     * Adds a field and returns the fluent builder for the field
     *
     * @param $name
     * @return FieldType
     */
    function addField($name) {
        return $this->fields[] = new FieldType($name);
    }

    /**
     * Add a string field
     *
     * @param $name
     * @return FieldType
     */
    function addStringField($name) {
        return $this->addField($name)
            ->type(Type::string());
    }

    /**
     * Add a boolean field
     *
     * @param $name
     * @return FieldType
     */
    function addBooleanField($name) {
        return $this->addField($name)
            ->type(Type::boolean());
    }

    /**
     * Add an int field
     *
     * @param $name
     * @return FieldType
     */
    function addIntField($name) {
        return $this->addField($name)
            ->type(Type::int());
    }

    /**
     * Add a float field
     *
     * @param $name
     * @return FieldType
     */
    function addFloatField($name) {
        return $this->addField($name)
            ->type(Type::float());
    }

    /**
     * Add an enum field
     *
     * @param $name
     * @return EnumFieldType
     */
    function addEnumField($name) {
        return $this->fields[] = new EnumFieldType($name);
    }

    /**
     * Add a date field
     *
     * @param $name
     * @return DateFieldType
     */
    function addDateField($name) {
        return $this->fields[] = new DateFieldType($name);
    }

    /**
     * Add a union field
     *
     * @param $name
     * @return UnionFieldType
     */
    function addUnionField($name) {
        return $this->fields[] = new UnionFieldType($name);
    }

    /**
     * Add a union field
     *
     * @param $name
     * @return self
     */
    function addFieldsByLayoutId($fieldLayoutId) {
        // some places in craft leave a null field layout, so account for that
        if (!$fieldLayoutId) {
            return $this;
        }

        $fieldService = \Yii::$container->get('craftQLFieldService');
        $fields = $fieldService->getFields($fieldLayoutId, $this->request, $this);
        $this->fields = array_merge($this->fields, $fields);
        return $this;
    }

}