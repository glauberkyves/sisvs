<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CoAutorEntityType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('coInscricao', 'entity', array(
                    'class' => 'DatasusSisvsExpoEpiAutorBundle:CoAutorEntity',
                    'label' => 'Co-Autor:',
                    'attr'  => array('class' => 'span4 hide')
                )
            )
            ->add('noAutor', 'text', array(
                'attr' => array('class' => 'span6')
            ))

            ->add('noInstituicao', 'text', array(
                'attr' => array('class' => 'span6')
            ))

            ->setMethod('POST');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\CoAutorEntity',
            'required'   => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'datasus_sisvs_expoepi_autorbundle_coautorentitytype';
    }

}
