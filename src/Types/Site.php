<?php

namespace markhuot\CraftQL\Types;

use GraphQL\Type\Definition\Type;
use markhuot\CraftQL\Request;
use markhuot\CraftQL\Builders\Schema;

class Site extends Schema {

    function boot() {
        $this->addIntField('id');
        $this->addStringField('name');
    }

}