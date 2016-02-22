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

class FacultyAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', 'text', array('label' => 'Faculty Title'));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title');
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper->add('title');
    }
}