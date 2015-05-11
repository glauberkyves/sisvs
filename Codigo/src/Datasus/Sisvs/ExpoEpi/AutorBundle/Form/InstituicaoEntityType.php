<?php

namespace Datasus\Sisvs\ExpoEpi\AutorBundle\Form;

use Datasus\Sisvs\Base\BaseBundle\Repository\BaseRepository;
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
            ->add('coTipoInstituicao', 'entity', array(
                'class' => 'DatasusSisvsExpoEpiAdministrativoBundle:InstituicaoEntity',
                'attr'  => array('class' => 'span4 hide')
            ))
            ->add('coUfIbge', 'entity',
                array(
                    'class'         => 'DatasusSisvsExpoEpiAdministrativoBundle:UfEntity',
                    'empty_value'   => 'Selecione...',
                    'property'      => 'noUf',
                    'attr'          => array('class' => 'span6', 'disabled' => 'disabled'),
                    'query_builder' => function (BaseRepository $repository) {
                            return $repository
                                ->createQueryBuilder('e')
                                ->orderBy('e.noUf', 'ASC');
                        }
                )
            )
            ->add('coMunicipioIbge', 'entity',
                array(
                    'class'         => 'DatasusSisvsExpoEpiAdministrativoBundle:MunicipioEntity',
                    'empty_value'   => 'Selecione...',
                    'property'      => 'noMunicipio',
                    'attr'          => array('class' => 'span6' ,'disabled' => 'disabled', 'id' => 'estado'),
                    'query_builder' => function (BaseRepository $repository) use ($builder) {
                            return $repository
                                ->createQueryBuilder('m')
                                ->orderBy('m.noMunicipio', 'ASC')
                                ->setMaxResults(1)
		                            ;
                        }
                )
            )
            ->add('noInstituicao', 'text', array(
                'attr' => array('class' => 'span6 required', 'maxlength' => 60),
            ))
            ->add('nuCep', 'text', array(
                'attr' => array('class' => 'input-medium required', 'maxlength' => 8, 'mask' => 'cep')
            ))
            ->add('dsEndereco', 'text', array(
                'attr' => array('class' => 'span6 required', 'maxlength' => 100)
            ))
            ->add('dsComplemento', 'text', array(
                'attr' => array('class' => 'span6', 'maxlength' => 15)
            ))
            ->add('noBairro', 'text', array(
                'attr' => array('class' => 'span6 required', 'maxlength' => 30)
            ))
            ->add('sgUf', 'text', array(
                'attr' => array('class' => 'span6 required', 'maxlength' => 2)
            ))
            ->add('nuTelefone', 'text', array(
                'attr' => array('class' => 'span6 required', 'maxlength' => 15, 'mask' => 'foneBR')
            ))
            ->add('nuFax', 'text', array(
                'attr' => array('class' => 'span6', 'maxlength' => 15, 'mask' => 'foneBR')
            ))
            ->add('noRegiao', 'text', array(
                'attr' => array('class' => 'span6 required', 'disabled' => 'disabled')
            ))
            ->setMethod('POST');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InstituicaoEntity',
            'required'   => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'datasus_sisvs_expoepi_autorbundle_instituicaoentitytype';
    }

}
