<?php

namespace PM\GBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ProfileController
 * @package PM\GBundle\Controller
 *
 * @Route("/dashboard")
 */
class DashboardController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/", name="pmg_dashboard_index")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }
}