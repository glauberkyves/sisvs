<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InscricaoEntityType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('coSeqInscricao', 'hidden')
            ->setMethod('POST')

            ->add('stAutoria', 'choice', array(
                'choices'  => array('S' => 'Sim', 'N' => 'Não'),
                'expanded' => true,
            ))
            ->add('noOrientador', 'text', array(
                    'label' => 'Nome Completo do Orientador:',
                    'attr'  => array('class' => 'span6 required', 'maxlength' => 120)
                )
            )
            ->add('noCoOrientador', 'text', array(
                    'label' => 'Nome Completo do Co-Orientador:',
                    'attr'  => array('class' => 'span6', 'maxlength' => 120)
                )
            )
            ->add('dsTitulo', 'textarea', array(
                    'label' => 'Titulo do Resumo:',
                    'attr'  => array('class' => 'span6  required textarea teste1', 'maxlength' => 250)
                )
            )
            ->add('dsResumo', 'textarea', array(
                    'label' => 'Resumo:',
                    'attr'  => array('class' => 'span6 required textarea', 'rows' => '5', 'maxlength' => 1500)
                )
            )
            ->add('stVeracidade', 'checkbox', array(
                    'attr' => array('class' => 'required')
                )
            )
            ->add('coInscricaoApresentacao', 'collection', array(
                'type'      => new InscricaoApresentacaoEntityType(),
                'allow_add' => true,
            ))
            ->add('coAutor', 'collection', array(
                'type'      => new CoAutorEntityType(),
                'allow_add' => true,
            ))
            ->add('coAnexo', 'collection', array(
                'type'      => new AnexoEntityType(),
                'allow_add' => true,
            ))
            ->add('coTema', 'entity', array(
                'class' => 'DatasusSisvsExpoEpiAdministrativoBundle:TemaEntity',
                'attr'  => array('class' => 'span4 hide')
            ))

		        ->add('dsEmailSecundario', 'text', array(
						        'attr'  => array('class' => 'span6 required', 'maxlength' => 120)
				        )
		        )

            ->add('coInstituicao', new InstituicaoEntityType());
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity',
            'required'   => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'datasus_sisvs_expoepi_autorbundle_inscricaoentity';
    }

}
