<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TemaEntityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('coSeqTema', 'hidden')
            ->add('coArea', 'entity', array(
                    'class' => 'DatasusSisvsExpoEpiAdministrativoBundle:AreaEntity',
                    'label' => 'Área',
                    'attr'  => array(
                        'class' => 'span6 hide'
                    )
                )
            )
            ->add('coTipoClassificacao', 'entity', array(
                    'class'       => 'DatasusSisvsExpoEpiAdministrativoBundle:TipoClassificacaoEntity',
                    'label'       => 'Tipo de Classificação',
                    'empty_value' => 'Selecione...',
                    'attr'        => array(
                        'class' => 'span6 alingCombo required'
                    )
                )
            )
            ->add('noTema', 'text', array(
                'label' => 'Tema',
                'attr'  => array(
                    'class' => 'span6 required', 'placeholder' => 'Tema', 'maxlength' => '300'
                )
            ))
            ->add('dsTema', 'textarea', array(
                'label' => 'Descrição: ',
                'attr'  => array('class' => 'span6 maxlength', 'rows' => '6', 'maxlength' => '500')
            ))
            ->add('nuTema', 'choice', array(
                'label'   => 'Código',
                'choices' => array(
                    ''  => 'Selecione...',
                    'M' => 'Mestrado',
                    'D' => 'Doutorado',
                    'E' => 'Especialização'
                ),
                'attr'    => array(
                    'class' => 'span6 alingCombo required'
                )
            ))
            ->add('stAtivo', 'choice', array(
                'choices' => array('' => 'Selecione...', 'N' => 'Inativo'),
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
            'data_class' => 'Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Entity\TemaEntity',
            'required'   => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'datasus_sisvs_expoepi_administrativobundle_temaentity';
    }
}
