<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InstituicaoEntityType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('coSeqInstituicao', 'hidden')
                ->add('noInstituicao', 'text', array(
                    'label' => 'Tipo Instituição: ',
                    'attr' => array('class' => 'span5 required', 'placeholder' => 'Instituição', 'maxlength' => '60')
                ))
                ->add('dsInstituicao', 'textarea', array(
                    'label' => 'Descrição: ',
                    'attr' => array('class' => 'span5 maxlength', 'rows' => '6', 'maxlength' => '500')
                ))
                ->add('stAtivo', 'hidden')
                ->add('submit', 'submit', array(
                    'label' => 'Salvar',
                    'attr' => array('class' => 'buttonAzul margim')
                ))
                ->setMethod('POST');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\InstituicaoEntity',
            'required' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'datasus_sisvs_expoepi_administrativobundle_instituicaoentity';
    }

}
