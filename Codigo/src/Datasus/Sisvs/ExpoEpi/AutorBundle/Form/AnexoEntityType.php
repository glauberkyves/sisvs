<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AnexoEntityType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('coSeqAnexo', 'hidden')
            ->add('coInscricao', 'entity', array(
                'class' => 'DatasusSisvsExpoEpiAutorBundle:InscricaoEntity',
                'attr'  => array('class' => 'span4 hide')
            ))
            ->add('noArquivo', 'text', array(
                'attr' => array('class' => 'span6', 'maxlength' => 100)
            ))
            ->add('dsArquivo', 'file', array(
                'data_class' => null,
                'attr'       => array(
                    'class' => 'span6',
                )
            ))
            ->setMethod('POST');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\AnexoEntity',
            'required'   => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'datasus_sisvs_expoepi_autorbundle_anexoentitytype';
    }

}
