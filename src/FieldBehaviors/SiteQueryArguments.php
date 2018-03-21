<?php

namespace markhuot\CraftQL\FieldBehaviors;

use Craft;
use markhuot\CraftQL\Behaviors\FieldBehavior;

class SiteQueryArguments extends FieldBehavior {

    static $enum;

    function initSiteQueryArguments() {
        $this->owner->addArgument('site')->type($this->getSitesEnum());
        $this->owner->addIntArgument('siteId');
    }

    function getSitesEnum() {
        if (!empty(static::$enum)) {
            return static::$enum;
        }

        $enum = $this->owner->createEnumType('SitesEnum');

        /** @var \markhuot\CraftQL\Types\Site $site */
        foreach ($this->owner->getRequest()->sites()->all() as $site) {
            $enum->addValue($site->getContext()->handle, ['value' => $site->getContext()->id]);
        }

        return static::$enum = $enum;
    }

}