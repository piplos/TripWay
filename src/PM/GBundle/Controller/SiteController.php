<?php

namespace PM\GBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SiteController
 * @package PM\GBundle\Controller
 */
class SiteController extends Controller
{
    /**
     * @return array
     *
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }
}
