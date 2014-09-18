<?php
namespace SalesLocations\Controller\Front;

use Thelia\Controller\Front\BaseFrontController;
use Thelia\Core\Template\TemplateDefinition;

class DefaultController extends BaseFrontController
{
    public function indexAction()
    {
        $args = array();

        return $this->render('sales-locations', $args);
    }

    /**
    * @return ParserInterface instance parser
    */
    /*protected function getParser($template = null)
    {
        $parser = $this->container->get("thelia.parser");
        // Define the template that should be used
        $parser->setTemplateDefinition(
            new TemplateDefinition(
                'frontOffice/',
                TemplateDefinition::FRONT_OFFICE
            )
        );

        return $parser;
    }*/
}
