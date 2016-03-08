<?php
/**
 * Created by tania.
 * Date: 8.03.16
 * Time: 11:40
 * @corporation Maksi
 */

namespace Rozklad\CalendarBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

/**
 * Class GenderType
 * @package Rozklad\CalendarBundle\Form\Type
 */
class CalendarType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {

    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rozklad_calendar';
    }


}