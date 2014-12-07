<?php

namespace PM\GBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;

/**
 * Class SiteController
 * @package PM\GBundle\Controller
 */
class SiteController extends Controller
{
    /**
     * @return array
     *
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {

        if (false === $this->get('security.context')->getToken() instanceof AnonymousToken) {

            return $this->redirect($this->generateUrl('intro'));

        }

        return [];
    }

    /**
     * @Route("/intro", name="intro")
     * @Template()
     */
    public function introAction() {

        $cities = $this->get('manager.city')->randomCities(5);

        if (!$cities) {
            throw new NotFoundHttpException('Cities not found.');
        }

        return [
            'cities' => $cities
        ];
    }
}
