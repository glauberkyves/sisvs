<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PrazoEntityType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('coSeqCriterio', 'hidden')
                ->add('noCriterio', 'textarea', array(
                    'label' => 'Critério: ',
                    'attr' => array(
                        'class' => 'span4', 'placeholder' => 'Critério' )
                ))
                ->add('dsCriterio', 'textarea', array(
                    'label' => 'Descrição: ',
                    'attr' => array('class' => 'span4', 'rows' => '6', 'maxlength' => '500')
                ))
                ->add('stAtivo', 'hidden')
                ->add('submit', 'submit', array(
                    'label' => 'Salvar',
                    'attr' => array('class' => 'buttonAzul margim')
                ))
                ->setMethod('POST')

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\PrazoEntity',
            'required' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'datasus_sisvs_expoepi_administrativobundle_prazoentity';
    }

}
