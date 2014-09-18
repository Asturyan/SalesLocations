<?php

namespace SalesLocations\Hook;

use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;

class Front extends BaseHook
{
    public function onMainAfterJavascriptInclude(HookRenderEvent $event)
    {
        //$content = $this->addJs('http://maps.google.com/maps/api/js?sensor=false');
        $content = $this->render('main-javascript.html');
        $event->add($content);
    }

}
