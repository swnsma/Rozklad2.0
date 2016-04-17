<?php
/**
 * Created by tania.
 * Date: 8.03.16
 * Time: 14:12
 * @corporation Maksi
 */

namespace Rozklad\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sonata\AdminBundle\Controller\CoreController;

class AdminController extends CoreController
{
    public function calendarAction(Request $request)
    {
        return $this->render('RozkladCalendarBundle:Admin:calendar.html.twig', array(
            'base_template'   => $this->getBaseTemplate(),
            'admin_pool'      => $this->container->get('sonata.admin.pool'),
            'blocks'          => $this->container->getParameter('sonata.admin.configuration.dashboard_blocks')
        ));
    }

}
