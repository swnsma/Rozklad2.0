<?php
/**
 * Created by tania.
 * Date: 22.02.16
 * Time: 22:41
 * @corporation Maksi
 */
namespace Rozklad\UniversityBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class TeacherAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', 'text', array('label' => 'Teacher Name'))
            ->add('chair');
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name')->addIdentifier('chair');
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('chair');
    }
}