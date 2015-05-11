<?php

namespace Datasus\Sisvs\Base\BaseBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuBase extends ContainerAware
{
    public function menu(FactoryInterface $factory, array $options)
    {
        $context     = $this->container->get('security.context');
        $currentRole = current($context->getToken()->getRoles())->getRole();

        /**
         * @todo refatorar role
         */
        switch ($currentRole) {
            case 'ROLE_COO':
                return $this->getMenuCoordenador($factory, $options);
                break;

            case 'ROLE_AUT':
                return $this->getMenuAutor($factory, $options);
                break;
        }
    }

    public function getMenuCoordenador(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('AdministrativoBundle')
            ->setChildrenAttribute('class', 'sf-menu');

        # administrativo
        $children = $menu->addChild('Módulo Administrativo', array(
            'route'          => 'administrativo_default',
            'linkAttributes' => array('class' => 'sf-with-ul'),
            'attributes'     => array('class' => 'current')
        ));

        $children->addChild('Cadastrar Apresentação', array(
            'route'          => 'datasus_sisvs_expoepi_administrativo_apresentacao',
            'linkAttributes' => array('class' => 'sf-with-ul')
        ));

        $children->addChild('Cadastrar Critério', array(
            'route'          => 'datasus_sisvs_expoepi_administrativo_criterio',
            'linkAttributes' => array('class' => 'sf-with-ul')
        ));

        $children->addChild('Cadastrar Evento', array(
            'route'          => 'datasus_sisvs_expoepi_administrativo_evento',
            'linkAttributes' => array('class' => 'sf-with-ul')
        ));

        $children->addChild('Cadastrar Tipo de Instituição', array(
            'route'          => 'datasus_sisvs_expoepi_administrativo_instituicao',
            'linkAttributes' => array('class' => 'sf-with-ul')
        ));

        $children->addChild('Cadastrar Tipo de Modalidade', array(
            'route'          => 'datasus_sisvs_expoepi_administrativo_tipo_modalidade',
            'linkAttributes' => array('class' => 'sf-with-ul')
        ));

        # Formulario
        $children = $menu->addChild('Formulários', array(
            'uri'            => '#',
            'linkAttributes' => array('class' => 'sf-with-ul'),
            'attributes'     => array('class' => 'current')
        ));

        $children->addChild('Formulário de Inscrição', array(
            'route'          => 'datasus_sisvs_expoepi_formulario_formulario_inscricao',
            'linkAttributes' => array('class' => 'sf-with-ul')
        ));

        $children->addChild('Prorrogar Prazos', array(
            'route'          => 'datasus_sisvs_expoepi_administrativo_prazo',
            'linkAttributes' => array('class' => 'sf-with-ul')
        ));

        # Módulo Acompanhamento
        $children = $menu->addChild('Módulo Acompanhamento', array(
            'uri'            => '#',
            'linkAttributes' => array('class' => 'sf-with-ul'),
            'attributes'     => array('class' => 'current')
        ));

        $children->addChild('Acompanhar Inscrição do Evento', array(
            'route'          => 'acompanhar_evento',
            'linkAttributes' => array('class' => 'sf-with-ul')
        ));

        $children->addChild('Listar Possíveis Duplicadas / Duplicadas (bloqueadas)', array(
            'route'          => 'acompanhar_duplicata',
            'linkAttributes' => array('class' => 'sf-with-ul')
        ));

        # Módulo Email
        $children = $menu->addChild('Enviar Mala Direta', array(
            'uri'            => '#',
            'linkAttributes' => array('class' => 'sf-with-ul'),
            'attributes'     => array('class' => 'current')
        ));

        $children->addChild('Mala Direta', array(
            'route'          => 'datasus_sisvs_expoepi_email_mala_direta',
            'linkAttributes' => array('class' => 'sf-with-ul')
        ));

        # Módulo Relatorio
        $children = $menu->addChild('Relatórios', array(
            'uri'            => '#',
            'linkAttributes' => array('class' => 'sf-with-ul'),
            'attributes'     => array('class' => 'current')
        ));

        $children->addChild('Gerar Relatório de Inscrição', array(
            'route'          => 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao',
            'linkAttributes' => array('class' => 'sf-with-ul')
        ));

        $children->addChild('Gerar Gráfico', array(
            'route'          => 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao_grafico',
            'linkAttributes' => array('class' => 'sf-with-ul')
        ));

        return $menu;
    }

    public function getMenuAutor(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('AdministrativoBundle')
            ->setChildrenAttribute('class', 'sf-menu');

        $menu->addChild('Acompanhar Informações da Inscrição', array(
            'route'          => 'autor_acompanhar_inscricao',
            'linkAttributes' => array('class' => 'sf-with-ul')
        ));

        return $menu;
    }
}
