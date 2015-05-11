<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TipoModalidadeEntityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('coSeqTipoModalidade', 'hidden')
            ->add('noTipoModalidade', 'text', array(
                'label' => 'Tipo Modalidade',
                'attr'  => array(
                    'class' => 'span6 required', 'placeholder' => 'Tipo Modalidade', 'maxlength' => '60'
                )
            ))
            ->add('dsTipoModalidade', 'textarea', array(
                'label' => 'Descrição: ',
                'attr'  => array('class' => 'span6 maxlength', 'rows' => '6', 'maxlength' => '500')
            ))
            ->add('stAtivo', 'choice', array(
                'choices' => array('' => 'Selecione...', 'S' => 'Ativo', 'N' => 'Inativo'),
                'label'   => 'Situação',
                'attr'    => array(
                    'class' => 'span6'
                )
            ))
            ->add('submit', 'submit', array(
                'label' => 'Salvar',
                'attr'  => array('class' => 'buttonAzul margim')
            ))
            ->setMethod('POST');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\TipoModalidadeEntity',
            'required'   => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'datasus_sisvs_expoepi_administrativobundle_tipomodalidadeentity';
    }
}