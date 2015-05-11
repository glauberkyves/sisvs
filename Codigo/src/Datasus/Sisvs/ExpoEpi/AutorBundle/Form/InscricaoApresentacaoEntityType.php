<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InscricaoApresentacaoEntityType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('coApresentacao', 'entity', array(
                    'class' => 'DatasusSisvsExpoEpiAdministrativoBundle:ApresentacaoEntity',
                    'label' => 'Apresentacao:',
                    'attr'  => array('class' => 'span6 hide')
                )
            )
            ->add('dsApresentacao', 'textarea', array(
                'attr' => array('class' => 'span6 required textarea', 'rows' => '6', 'maxlength' => '500')
            ))
            ->setMethod('POST');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoApresentacaoEntity',
            'required'   => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'datasus_sisvs_expoepi_autorbundle_inscricaoapresentacaoentitytype';
    }

}
