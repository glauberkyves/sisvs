<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ModalidadeEntityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('coSeqModalidade', 'hidden')
            ->add('coEvento', 'entity', array(
                    'class' => 'DatasusSisvsExpoEpiAdministrativoBundle:EventoEntity',
                    'label' => 'Evento:',
                    'attr'  => array('class' => 'span4 hide')
                )
            )
            ->add('noModalidade', 'text', array(
                    'label' => 'Modalidade:',
                    'attr'  => array('class' => 'span6 required', 'placeholder' => 'Modalidade', 'maxlength' => '60')
                )
            )
            ->add('dsModalidade', 'textarea', array(
                    'label' => 'Descrição:',
                    'attr'  => array('class' => 'span6 maxlength', 'rows' => '6', 'maxlength' => '500')
                )
            )
            ->add('stPossuiOrientador', 'choice', array(
                'empty_value' => 'Selecione...',
                'choices' => array('S' => 'Sim', 'N' => 'Não'),
                'attr'    => array('class' => 'span6 required'),
                'label'   => 'Exibir orientador:'
            ))
            ->add('stExigeAnexo', 'choice', array(
                'empty_value' => 'Selecione...',
                'choices' => array('S' => 'Sim', 'N' => 'Não'),
                'attr'    => array('class' => 'span6 required'),
                'label'   => 'Obrigatoriedade de Anexo:'
            ))
            ->add('stAtivo', 'choice', array(
                'choices'  => array('S' => 'Sim', 'N' => 'Não'),
                'expanded' => true,
                'label'    => 'Exibir orientador:'
            ))
		        ->add('stOcultaDados', 'choice', array(
				        'empty_value' => 'Selecione...',
				        'choices'     => array('S' => 'Sim', 'N' => 'Não'),
				        'attr'        => array('class' => 'span6 required'),
				        'label'       => 'Ocultar dados do autor:'
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
            'data_class' => 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\ModalidadeEntity',
            'required'   => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'datasus_sisvs_expoepi_administrativobundle_modalidadeentity';
    }
}
