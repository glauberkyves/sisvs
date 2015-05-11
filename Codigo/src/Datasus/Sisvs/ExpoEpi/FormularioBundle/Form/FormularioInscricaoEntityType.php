<?php

namespace Datasus\Sisvs\ExpoEpi\FormularioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FormularioInscricaoEntityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('coSeqFormularioInscricao', 'hidden')
            ->add('nuFormulario', 'text', array(
                    'label' => 'N° Formulario:',
                    'attr'  => array('class' => 'tm200', 'maxlength' => '60','disabled' => 'disabled' )
                )
            )
            ->add('coModalidade', 'entity', array(
                    'class' => 'DatasusSisvsExpoEpiAdministrativoBundle:ModalidadeEntity',
                    'label' => 'Modalidade:',
                    'attr' => array('class' => 'required tm495')
                )
            )
            ->add('dsTitulo', 'textarea', array(
                    'label' => 'Título do Formulário:',
                    'attr'  => array('class' => 'required textarea tm1062', 'maxlength' => '200')
                )
            )

            ->add('dtInicio', 'date', array(
                    'label' => 'Data Início:',
                    'attr'  => array('class' => 'required tm200'),
                    'widget'  => 'single_text',
                    'format'  => 'dd/MM/y'
                )
            )
            ->add('dtFim', 'date', array(
                    'label' => 'Data Fim:',
                    'attr'  => array('class' => 'required tm200'),
                    'widget'  => 'single_text',
                    'format'  => 'dd/MM/y'
                )
            )
            ->add('dsObjeto', 'textarea', array(
                    'label' => 'Objeto Descritivo:',
                    'attr'  => array('class' => 'required textarea tm495', 'rows' => '6', 'maxlength' => '2000')
                )
            )
            ->add('dsAreaEvento', 'textarea', array(
                    'label' => 'Áreas do Evento (seleção da área):',
                    'attr'  => array('class' => 'textarea tm1062', 'maxlength' => '500')
                )
            )
            ->add('dsResumo', 'textarea', array(
                    'label' => 'Resumo Estruturado:',
                    'attr'  => array('class' => 'required textarea tm495', 'rows' => '6', 'maxlength' => '2000')
                )
            )
            ->add('dsApresentacao', 'textarea', array(
                    'label' => 'Apresentação:',
                    'attr'  => array('class' => 'required textarea tm495', 'rows' => '6', 'maxlength' => '2000')
                )
            )
            ->add('dsDeclaracao', 'textarea', array(
                    'label' => 'Declaração da Veracidade das Informações:',
                    'attr'  => array('class' => 'required textarea tm1062', 'rows' => '6', 'maxlength' => '2000')
                )
            )
            ->add('dsAnexos', 'textarea', array(
                    'label' => 'Descrição para Anexos:',
                    'attr'  => array('class' => 'textarea tm495', 'rows' => '6', 'maxlength' => '2000')
                )
            )
            ->add('dsJustificativa', 'textarea', array(
                    'label' => 'Descrição para Prorrogação:',
                    'attr'  => array('class' => 'textarea tm495', 'rows' => '6', 'maxlength' => '500')
                )
            )
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
            'data_class' => 'Datasus\Sisvs\ExpoEpi\FormularioBundle\Entity\FormularioInscricaoEntity',
            'required'   => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity';
    }
}
