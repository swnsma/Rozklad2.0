<?php
/**
 * Created by tania.
 * Date: 10.03.16
 * Time: 20:00
 * @corporation Maksi
 */

namespace Rozklad\UniversityBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class GroupController
 * @package Rozklad\UniversityBundle\Controller
 */
class GroupController extends Controller
{
    /**
     * @Rest\View
     */
    public function allAction()
    {
//        $em = $this->getDoctrine()->getManager();
//        $em->getRepository('ApplicationSonataNewsBundle:Post')->findCollection();
        return array('asd'=>'asd');
    }

}
