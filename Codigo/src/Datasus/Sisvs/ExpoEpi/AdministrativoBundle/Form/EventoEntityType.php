<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventoEntityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('coSeqEvento', 'hidden')
            ->add('anEvento', 'text', array(
                'label' => 'Ano',
                'attr'  => array(
                    'class' => 'span5 required ano', 'placeholder' => 'Ano', 'maxlength' => '4', 'mask' => 'numeric'
                ),
            ))
            ->add('noEvento', 'text', array(
                'label' => 'Evento',
                'attr'  => array(
                    'class' => 'span5 required', 'placeholder' => 'Evento', 'maxlength' => '60'
                )
            ))
            ->add('noLogotipo', 'text', array(
                'attr' => array(
                    'class' => 'span5 imLogotipo', 'maxlength' => '100'
                )
            ))
            ->add('noEdital', 'text', array(
                'attr' => array(
                    'class' => 'span5 dsEdital required', 'maxlength' => '100'
                )
            ))
            ->add('dsEvento', 'textarea', array(
                'label' => 'Descrição',
                'attr'  => array(
                    'class' => 'span5 maxlength', 'rows' => '6', 'maxlength' => '500'
                )
            ))
            ->add('dsEdital', 'file', array(
                'label'      => 'Edital',
                'data_class' => null,
                'attr'       => array(
                    'class' => 'span5 hide ',
                )
            ))
            ->add('imLogotipo', 'file', array(
                'label'      => 'Logo',
                'data_class' => null,
                'attr'       => array(
                    'class' => 'span5 hide',
                )
            ))
            ->add('stAtivo', 'choice', array(
                'choices' => array('' => 'Selecione...', 'S' => 'Ativo', 'N' => 'Inativo'),
                'label'   => 'Situação',
                'attr'    => array(
                    'class' => 'span5'
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
            'data_class' => 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\EventoEntity',
            'required'   => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'datasus_sisvs_expoepi_administrativobundle_eventoentity';
    }
}
