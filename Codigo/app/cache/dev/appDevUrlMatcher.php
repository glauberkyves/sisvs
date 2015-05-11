<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        // datasus_sisvs_base_base
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'datasus_sisvs_base_base');
            }

            return array (  '_controller' => 'Datasus\\Sisvs\\Base\\SecurityBundle\\Controller\\SecurityController::checkRouteAction',  '_route' => 'datasus_sisvs_base_base',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // datasus_sisvs_base_security_auth_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\Base\\SecurityBundle\\Controller\\SecurityController::loginAction',  '_route' => 'datasus_sisvs_base_security_auth_login',);
                }

                // datasus_sisvs_base_security_auth_login_check
                if ($pathinfo === '/login_check') {
                    return array('_route' => 'datasus_sisvs_base_security_auth_login_check');
                }

            }

            // datasus_sisvs_base_security_auth_logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'datasus_sisvs_base_security_auth_logout');
            }

        }

        if (0 === strpos($pathinfo, '/a')) {
            // datasus_sisvs_base_security_auth_perfil
            if ($pathinfo === '/auth/perfil') {
                return array (  '_controller' => 'Datasus\\Sisvs\\Base\\SecurityBundle\\Controller\\SecurityController::perfilAction',  '_route' => 'datasus_sisvs_base_security_auth_perfil',);
            }

            if (0 === strpos($pathinfo, '/administrativo')) {
                // administrativo_default
                if ($pathinfo === '/administrativo/default') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\DefaultController::indexAction',  'label' => 'Módulo Administrativo',  '_route' => 'administrativo_default',);
                }

                if (0 === strpos($pathinfo, '/administrativo/apresentacao')) {
                    // datasus_sisvs_expoepi_administrativo_apresentacao
                    if ($pathinfo === '/administrativo/apresentacao') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ApresentacaoController::indexAction',  'label' => 'Apresentação',  'parent' => 'administrativo_default',  '_route' => 'datasus_sisvs_expoepi_administrativo_apresentacao',);
                    }

                    // datasus_sisvs_expoepi_administrativo_apresentacao_search
                    if ($pathinfo === '/administrativo/apresentacao/search') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ApresentacaoController::searchAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_apresentacao_search',);
                    }

                    // datasus_sisvs_expoepi_administrativo_apresentacao_create
                    if ($pathinfo === '/administrativo/apresentacao/create') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ApresentacaoController::createAction',  'label' => 'Cadastrar Apresentação',  'parent' => 'datasus_sisvs_expoepi_administrativo_apresentacao',  '_route' => 'datasus_sisvs_expoepi_administrativo_apresentacao_create',);
                    }

                    // datasus_sisvs_expoepi_administrativo_apresentacao_edit
                    if ($pathinfo === '/administrativo/apresentacao/edit') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ApresentacaoController::editAction',  'label' => 'Alterar Apresentação',  'parent' => 'datasus_sisvs_expoepi_administrativo_apresentacao',  '_route' => 'datasus_sisvs_expoepi_administrativo_apresentacao_edit',);
                    }

                    // datasus_sisvs_expoepi_administrativo_apresentacao_toogle-status
                    if ($pathinfo === '/administrativo/apresentacao/toogle-status') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ApresentacaoController::toogleStatusAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_apresentacao_toogle-status',);
                    }

                }

                if (0 === strpos($pathinfo, '/administrativo/criterio')) {
                    // datasus_sisvs_expoepi_administrativo_criterio
                    if ($pathinfo === '/administrativo/criterio') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\CriterioController::indexAction',  'label' => 'Critério',  'parent' => 'administrativo_default',  '_route' => 'datasus_sisvs_expoepi_administrativo_criterio',);
                    }

                    // datasus_sisvs_expoepi_administrativo_criterio_search
                    if ($pathinfo === '/administrativo/criterio/search') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\CriterioController::searchAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_criterio_search',);
                    }

                    // datasus_sisvs_expoepi_administrativo_criterio_create
                    if ($pathinfo === '/administrativo/criterio/create') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\CriterioController::createAction',  'label' => 'Cadastrar Critério',  'parent' => 'datasus_sisvs_expoepi_administrativo_criterio',  '_route' => 'datasus_sisvs_expoepi_administrativo_criterio_create',);
                    }

                    // datasus_sisvs_expoepi_administrativo_criterio_edit
                    if ($pathinfo === '/administrativo/criterio/edit') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\CriterioController::editAction',  'label' => 'Alterar Critério',  'parent' => 'datasus_sisvs_expoepi_administrativo_criterio',  '_route' => 'datasus_sisvs_expoepi_administrativo_criterio_edit',);
                    }

                    // datasus_sisvs_expoepi_administrativo_criterio_toogle-status
                    if ($pathinfo === '/administrativo/criterio/toogle-status') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\CriterioController::toogleStatusAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_criterio_toogle-status',);
                    }

                }

                if (0 === strpos($pathinfo, '/administrativo/evento')) {
                    // datasus_sisvs_expoepi_administrativo_evento
                    if ($pathinfo === '/administrativo/evento') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\EventoController::indexAction',  'label' => 'Evento',  'parent' => 'administrativo_default',  '_route' => 'datasus_sisvs_expoepi_administrativo_evento',);
                    }

                    // datasus_sisvs_expoepi_administrativo_evento_search
                    if ($pathinfo === '/administrativo/evento/search') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\EventoController::searchAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_evento_search',);
                    }

                    // datasus_sisvs_expoepi_administrativo_evento_create
                    if ($pathinfo === '/administrativo/evento/create') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\EventoController::createAction',  'label' => 'Cadastrar Evento',  'parent' => 'datasus_sisvs_expoepi_administrativo_evento',  '_route' => 'datasus_sisvs_expoepi_administrativo_evento_create',);
                    }

                    // datasus_sisvs_expoepi_administrativo_evento_edit
                    if ($pathinfo === '/administrativo/evento/edit') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\EventoController::editAction',  'label' => 'Alterar Evento',  'parent' => 'datasus_sisvs_expoepi_administrativo_evento',  '_route' => 'datasus_sisvs_expoepi_administrativo_evento_edit',);
                    }

                    // datasus_sisvs_expoepi_administrativo_evento_toogle-status
                    if ($pathinfo === '/administrativo/evento/toogle-status') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\EventoController::toogleStatusAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_evento_toogle-status',);
                    }

                    // datasus_sisvs_expoepi_administrativo_evento_view
                    if ($pathinfo === '/administrativo/evento/view') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\EventoController::viewAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_evento_view',);
                    }

                    // datasus_sisvs_expoepi_administrativo_evento_download
                    if ($pathinfo === '/administrativo/evento/download') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\EventoController::downloadAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_evento_download',);
                    }

                }

                if (0 === strpos($pathinfo, '/administrativo/instituicao')) {
                    // datasus_sisvs_expoepi_administrativo_instituicao
                    if ($pathinfo === '/administrativo/instituicao') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\InstituicaoController::indexAction',  'label' => 'Tipo de Instituição',  'parent' => 'administrativo_default',  '_route' => 'datasus_sisvs_expoepi_administrativo_instituicao',);
                    }

                    // datasus_sisvs_expoepi_administrativo_instituicao_search
                    if ($pathinfo === '/administrativo/instituicao/search') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\InstituicaoController::searchAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_instituicao_search',);
                    }

                    // datasus_sisvs_expoepi_administrativo_instituicao_create
                    if ($pathinfo === '/administrativo/instituicao/create') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\InstituicaoController::createAction',  'label' => 'Cadastrar Tipo de Instituição',  'parent' => 'datasus_sisvs_expoepi_administrativo_instituicao',  '_route' => 'datasus_sisvs_expoepi_administrativo_instituicao_create',);
                    }

                    // datasus_sisvs_expoepi_administrativo_instituicao_edit
                    if ($pathinfo === '/administrativo/instituicao/edit') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\InstituicaoController::editAction',  'label' => 'Alterar Tipo de Instituição',  'parent' => 'datasus_sisvs_expoepi_administrativo_instituicao',  '_route' => 'datasus_sisvs_expoepi_administrativo_instituicao_edit',);
                    }

                    // datasus_sisvs_expoepi_administrativo_instituicao_toogle-status
                    if ($pathinfo === '/administrativo/instituicao/toogle-status') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\InstituicaoController::toogleStatusAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_instituicao_toogle-status',);
                    }

                }

                if (0 === strpos($pathinfo, '/administrativo/tipo-modalidade')) {
                    // datasus_sisvs_expoepi_administrativo_tipo_modalidade
                    if ($pathinfo === '/administrativo/tipo-modalidade') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\TipoModalidadeController::indexAction',  'label' => 'Tipo da Modalidade',  'parent' => 'administrativo_default',  '_route' => 'datasus_sisvs_expoepi_administrativo_tipo_modalidade',);
                    }

                    // datasus_sisvs_expoepi_administrativo_tipo_modalidade_search
                    if ($pathinfo === '/administrativo/tipo-modalidade/search') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\TipoModalidadeController::searchAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_tipo_modalidade_search',);
                    }

                    // datasus_sisvs_expoepi_administrativo_tipo_modalidade_create
                    if ($pathinfo === '/administrativo/tipo-modalidade/create') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\TipoModalidadeController::createAction',  'label' => 'Cadastrar Tipo da Modalidade',  'parent' => 'datasus_sisvs_expoepi_administrativo_tipo_modalidade',  '_route' => 'datasus_sisvs_expoepi_administrativo_tipo_modalidade_create',);
                    }

                    // datasus_sisvs_expoepi_administrativo_tipo_modalidade_edit
                    if ($pathinfo === '/administrativo/tipo-modalidade/edit') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\TipoModalidadeController::editAction',  'label' => 'Alterar Tipo da Modalidade',  'parent' => 'datasus_sisvs_expoepi_administrativo_tipo_modalidade',  '_route' => 'datasus_sisvs_expoepi_administrativo_tipo_modalidade_edit',);
                    }

                    // datasus_sisvs_expoepi_administrativo_tipo_modalidade_toogle-status
                    if ($pathinfo === '/administrativo/tipo-modalidade/toogle-status') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\TipoModalidadeController::toogleStatusAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_tipo_modalidade_toogle-status',);
                    }

                }

                if (0 === strpos($pathinfo, '/administrativo/area')) {
                    // datasus_sisvs_expoepi_administrativo_area
                    if ($pathinfo === '/administrativo/area') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\AreaController::indexAction',  'label' => 'Área',  'parent' => 'datasus_sisvs_expoepi_administrativo_modalidade',  '_route' => 'datasus_sisvs_expoepi_administrativo_area',);
                    }

                    // datasus_sisvs_expoepi_administrativo_area_search
                    if ($pathinfo === '/administrativo/area/search') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\AreaController::searchAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_area_search',);
                    }

                    // datasus_sisvs_expoepi_administrativo_area_create
                    if ($pathinfo === '/administrativo/area/create') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\AreaController::createAction',  'label' => 'Cadastrar Área',  'parent' => 'datasus_sisvs_expoepi_administrativo_area',  '_route' => 'datasus_sisvs_expoepi_administrativo_area_create',);
                    }

                    // datasus_sisvs_expoepi_administrativo_area_edit
                    if ($pathinfo === '/administrativo/area/edit') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\AreaController::editAction',  'label' => 'Alterar Área',  'parent' => 'datasus_sisvs_expoepi_administrativo_area',  '_route' => 'datasus_sisvs_expoepi_administrativo_area_edit',);
                    }

                    // datasus_sisvs_expoepi_administrativo_area_toogle-status
                    if ($pathinfo === '/administrativo/area/toogle-status') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\AreaController::toogleStatusAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_area_toogle-status',);
                    }

                    // datasus_sisvs_expoepi_administrativo_area_view
                    if ($pathinfo === '/administrativo/area/view') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\AreaController::viewAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_area_view',);
                    }

                    // datasus_sisvs_expoepi_administrativo_area_combo_box
                    if ($pathinfo === '/administrativo/area/combo-box') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\AreaController::comboBoxAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_area_combo_box',);
                    }

                }

                if (0 === strpos($pathinfo, '/administrativo/tema')) {
                    // datasus_sisvs_expoepi_administrativo_tema
                    if ($pathinfo === '/administrativo/tema') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\TemaController::indexAction',  'label' => 'Tema / Categoria',  'parent' => 'datasus_sisvs_expoepi_administrativo_area',  '_route' => 'datasus_sisvs_expoepi_administrativo_tema',);
                    }

                    // datasus_sisvs_expoepi_administrativo_tema_search
                    if ($pathinfo === '/administrativo/tema/search') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\TemaController::searchAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_tema_search',);
                    }

                    // datasus_sisvs_expoepi_administrativo_tema_create
                    if ($pathinfo === '/administrativo/tema/create') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\TemaController::createAction',  'label' => 'Cadastrar Tema / Categoria',  'parent' => 'datasus_sisvs_expoepi_administrativo_tema',  '_route' => 'datasus_sisvs_expoepi_administrativo_tema_create',);
                    }

                    // datasus_sisvs_expoepi_administrativo_tema_edit
                    if ($pathinfo === '/administrativo/tema/edit') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\TemaController::editAction',  'label' => 'Alterar Tema / Categoria',  'parent' => 'datasus_sisvs_expoepi_administrativo_tema',  '_route' => 'datasus_sisvs_expoepi_administrativo_tema_edit',);
                    }

                    // datasus_sisvs_expoepi_administrativo_tema_toogle-status
                    if ($pathinfo === '/administrativo/tema/toogle-status') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\TemaController::toogleStatusAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_tema_toogle-status',);
                    }

                    if (0 === strpos($pathinfo, '/administrativo/tema/c')) {
                        // datasus_sisvs_expoepi_administrativo_tema_check-duplicity
                        if ($pathinfo === '/administrativo/tema/check-duplicity') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\TemaController::checkDuplicityAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_tema_check-duplicity',);
                        }

                        // datasus_sisvs_expoepi_administrativo_tema_combo_box
                        if ($pathinfo === '/administrativo/tema/combo-box') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\TemaController::comboBoxAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_tema_combo_box',);
                        }

                        // datasus_sisvs_expoepi_administrativo_tema_change_order
                        if ($pathinfo === '/administrativo/tema/change-order') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\TemaController::changeOrderAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_tema_change_order',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/administrativo/modalidade')) {
                    // datasus_sisvs_expoepi_administrativo_modalidade
                    if ($pathinfo === '/administrativo/modalidade') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::indexAction',  'label' => 'Modalidade',  'parent' => 'datasus_sisvs_expoepi_administrativo_evento',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade',);
                    }

                    // datasus_sisvs_expoepi_administrativo_modalidade_search
                    if ($pathinfo === '/administrativo/modalidade/search') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::searchAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_search',);
                    }

                    // datasus_sisvs_expoepi_administrativo_modalidade_create
                    if ($pathinfo === '/administrativo/modalidade/create') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::createAction',  'label' => 'Cadastrar Modalidade',  'parent' => 'datasus_sisvs_expoepi_administrativo_modalidade',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_create',);
                    }

                    // datasus_sisvs_expoepi_administrativo_modalidade_edit
                    if ($pathinfo === '/administrativo/modalidade/edit') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::editAction',  'label' => 'Alterar Modalidade',  'parent' => 'datasus_sisvs_expoepi_administrativo_modalidade',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_edit',);
                    }

                    // datasus_sisvs_expoepi_administrativo_modalidade_toogle-status
                    if ($pathinfo === '/administrativo/modalidade/toogle-status') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::toogleStatusAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_toogle-status',);
                    }

                    if (0 === strpos($pathinfo, '/administrativo/modalidade/view')) {
                        // datasus_sisvs_expoepi_administrativo_modalidade_view
                        if ($pathinfo === '/administrativo/modalidade/view') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::viewAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_view',);
                        }

                        if (0 === strpos($pathinfo, '/administrativo/modalidade/view-')) {
                            // datasus_sisvs_expoepi_administrativo_modalidade_view_criterio
                            if ($pathinfo === '/administrativo/modalidade/view-criterio') {
                                return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::viewCriterioAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_view_criterio',);
                            }

                            // datasus_sisvs_expoepi_administrativo_modalidade_view_apresentacao
                            if ($pathinfo === '/administrativo/modalidade/view-apresentacao') {
                                return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::viewApresentacaoAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_view_apresentacao',);
                            }

                            // datasus_sisvs_expoepi_administrativo_modalidade_view_instituicao
                            if ($pathinfo === '/administrativo/modalidade/view-instituicao') {
                                return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::viewInstituicaoAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_view_instituicao',);
                            }

                            // datasus_sisvs_expoepi_administrativo_modalidade_view_tipo-modalidade
                            if ($pathinfo === '/administrativo/modalidade/view-tipo-modalidade') {
                                return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::viewTipoModAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_view_tipo-modalidade',);
                            }

                            // datasus_sisvs_expoepi_administrativo_modalidade_view_area
                            if ($pathinfo === '/administrativo/modalidade/view-area') {
                                return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::viewAreaAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_view_area',);
                            }

                        }

                    }

                    // datasus_sisvs_expoepi_administrativo_modalidade_bind-criterio
                    if ($pathinfo === '/administrativo/modalidade/bind-criterio') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::bindCriterioAction',  'label' => 'Vincular Critério',  'parent' => 'datasus_sisvs_expoepi_administrativo_modalidade',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_bind-criterio',);
                    }

                    // datasus_sisvs_expoepi_administrativo_modalidade_save-bind-criterio
                    if ($pathinfo === '/administrativo/modalidade/save-bind-criterio') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::saveBindCriterioAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_save-bind-criterio',);
                    }

                    // datasus_sisvs_expoepi_administrativo_modalidade_bind-instituicao
                    if ($pathinfo === '/administrativo/modalidade/bind-instituicao') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::bindInstituicaoAction',  'label' => 'Vincular Tipo de Instituição',  'parent' => 'datasus_sisvs_expoepi_administrativo_modalidade',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_bind-instituicao',);
                    }

                    // datasus_sisvs_expoepi_administrativo_modalidade_save-bind
                    if ($pathinfo === '/administrativo/modalidade/save-bind-instituicao') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::saveBindInstituicaoAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_save-bind',);
                    }

                    // datasus_sisvs_expoepi_administrativo_modalidade_bind-apresentacao
                    if ($pathinfo === '/administrativo/modalidade/bind-apresentacao') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::bindApresentacaoAction',  'label' => 'Vincular Apresentação',  'parent' => 'datasus_sisvs_expoepi_administrativo_modalidade',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_bind-apresentacao',);
                    }

                    // datasus_sisvs_expoepi_administrativo_modalidade_save-bind-apresentacao
                    if ($pathinfo === '/administrativo/modalidade/save-bind-apresentacao') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::saveBindApresentacaoAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_save-bind-apresentacao',);
                    }

                    // datasus_sisvs_expoepi_administrativo_modalidade_bind-tipo-modalidade
                    if ($pathinfo === '/administrativo/modalidade/bind-tipo-modalidade') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::bindTipoModAction',  'label' => 'Vincular Tipo da Modalidade',  'parent' => 'datasus_sisvs_expoepi_administrativo_modalidade',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_bind-tipo-modalidade',);
                    }

                    // datasus_sisvs_expoepi_administrativo_modalidade_save-bind-tipo-modalidade
                    if ($pathinfo === '/administrativo/modalidade/save-bind-tipo-modalidade') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::saveBindTipoModalidadeAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_save-bind-tipo-modalidade',);
                    }

                    // datasus_sisvs_expoepi_administrativo_modalidade_combo_box
                    if ($pathinfo === '/administrativo/modalidade/combo-box') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\ModalidadeController::comboBoxAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_modalidade_combo_box',);
                    }

                }

                if (0 === strpos($pathinfo, '/administrativo/prazo')) {
                    // datasus_sisvs_expoepi_administrativo_prazo
                    if ($pathinfo === '/administrativo/prazo') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\PrazoController::indexAction',  'label' => 'Consultar Prazos',  'parent' => 'datasus_sisvs_expoepi_administrativo_prazo',  '_route' => 'datasus_sisvs_expoepi_administrativo_prazo',);
                    }

                    // datasus_sisvs_expoepi_administrativo_prazo_search
                    if ($pathinfo === '/administrativo/prazo/search') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\PrazoController::searchAction',  '_route' => 'datasus_sisvs_expoepi_administrativo_prazo_search',);
                    }

                    // datasus_sisvs_expoepi_administrativo_prazo_prorrogar_prazo
                    if ($pathinfo === '/administrativo/prazo/prorrogar-prazo') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\PrazoController::editAction',  'label' => 'Prorrogar Prazos',  'parent' => 'datasus_sisvs_expoepi_administrativo_prazo',  '_route' => 'datasus_sisvs_expoepi_administrativo_prazo_prorrogar_prazo',);
                    }

                }

                if (0 === strpos($pathinfo, '/administrativo/endereco')) {
                    // administrativo_endereco_search_cep
                    if ($pathinfo === '/administrativo/endereco/search-cep') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\DefaultController::searchCepAction',  '_route' => 'administrativo_endereco_search_cep',);
                    }

                    if (0 === strpos($pathinfo, '/administrativo/endereco/combo-')) {
                        // administrativo_endereco_combo_estado
                        if ($pathinfo === '/administrativo/endereco/combo-estado') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\DefaultController::comboEstadoAction',  '_route' => 'administrativo_endereco_combo_estado',);
                        }

                        // administrativo_endereco_combo_municipio
                        if ($pathinfo === '/administrativo/endereco/combo-municipio') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\DefaultController::comboMunicipioAction',  '_route' => 'administrativo_endereco_combo_municipio',);
                        }

                        // administrativo_endereco_combo_regiao_estado
                        if ($pathinfo === '/administrativo/endereco/combo-estado-regiao') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\DefaultController::comboRegiaoEstadoAction',  '_route' => 'administrativo_endereco_combo_regiao_estado',);
                        }

                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/formulario')) {
            // formulario_default
            if ($pathinfo === '/formulario/default') {
                return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Controller\\DefaultController::indexAction',  'label' => 'Formulário',  '_route' => 'formulario_default',);
            }

            if (0 === strpos($pathinfo, '/formulario/formulario-inscricao')) {
                // datasus_sisvs_expoepi_formulario_formulario_inscricao
                if ($pathinfo === '/formulario/formulario-inscricao') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Controller\\FormularioInscricaoController::indexAction',  'label' => 'Formulário de Inscrição',  'parent' => 'formulario_inscricao',  '_route' => 'datasus_sisvs_expoepi_formulario_formulario_inscricao',);
                }

                // datasus_sisvs_expoepi_formulario_formulario_inscricao_search
                if ($pathinfo === '/formulario/formulario-inscricao/search') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Controller\\FormularioInscricaoController::searchAction',  '_route' => 'datasus_sisvs_expoepi_formulario_formulario_inscricao_search',);
                }

                // datasus_sisvs_expoepi_formulario_formulario_inscricao_create
                if ($pathinfo === '/formulario/formulario-inscricao/create') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Controller\\FormularioInscricaoController::createAction',  'label' => 'Cadastrar Formulário de Inscrição',  'parent' => 'datasus_sisvs_expoepi_formulario_formulario_inscricao',  '_route' => 'datasus_sisvs_expoepi_formulario_formulario_inscricao_create',);
                }

                // datasus_sisvs_expoepi_formulario_formulario_inscricao_edit
                if ($pathinfo === '/formulario/formulario-inscricao/edit') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Controller\\FormularioInscricaoController::editAction',  'label' => 'Alterar Formulário de Inscrição',  'parent' => 'datasus_sisvs_expoepi_formulario_formulario_inscricao',  '_route' => 'datasus_sisvs_expoepi_formulario_formulario_inscricao_edit',);
                }

                if (0 === strpos($pathinfo, '/formulario/formulario-inscricao/view')) {
                    // datasus_sisvs_expoepi_formulario_formulario_inscricao_view
                    if ($pathinfo === '/formulario/formulario-inscricao/view') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Controller\\FormularioInscricaoController::viewAction',  'label' => 'Visualizar Formulário de Inscrição',  'parent' => 'datasus_sisvs_expoepi_formulario_formulario_inscricao',  '_route' => 'datasus_sisvs_expoepi_formulario_formulario_inscricao_view',);
                    }

                    // datasus_sisvs_expoepi_formulario_formulario_inscricao_view_pdf
                    if ($pathinfo === '/formulario/formulario-inscricao/view-pdf') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Controller\\FormularioInscricaoController::viewPdfAction',  '_route' => 'datasus_sisvs_expoepi_formulario_formulario_inscricao_view_pdf',);
                    }

                }

                // datasus_sisvs_expoepi_formulario_formulario_inscricao_combo_box
                if ($pathinfo === '/formulario/formulario-inscricao/combo-box') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Controller\\FormularioInscricaoController::comboBoxAction',  '_route' => 'datasus_sisvs_expoepi_formulario_formulario_inscricao_combo_box',);
                }

                if (0 === strpos($pathinfo, '/formulario/formulario-inscricao/ajax-get-')) {
                    // datasus_sisvs_expoepi_formulario_formulario_inscricao_ajax_get_no_tipo_modalidade
                    if ($pathinfo === '/formulario/formulario-inscricao/ajax-get-no-tipo-modalidade') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Controller\\FormularioInscricaoController::ajaxGetNoTipoModalidadeAction',  '_route' => 'datasus_sisvs_expoepi_formulario_formulario_inscricao_ajax_get_no_tipo_modalidade',);
                    }

                    // datasus_sisvs_expoepi_formulario_formulario_inscricao_ajax_get_evento_of_modalidade
                    if ($pathinfo === '/formulario/formulario-inscricao/ajax-get-evento-of-modalidade') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Controller\\FormularioInscricaoController::ajaxGeteventoOfModalidadeAction',  '_route' => 'datasus_sisvs_expoepi_formulario_formulario_inscricao_ajax_get_evento_of_modalidade',);
                    }

                }

                // datasus_sisvs_expoepi_formulario_formulario_inscricao_publish
                if ($pathinfo === '/formulario/formulario-inscricao/publish') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Controller\\FormularioInscricaoController::publishAction',  '_route' => 'datasus_sisvs_expoepi_formulario_formulario_inscricao_publish',);
                }

                // datasus_sisvs_expoepi_formulario_formulario_inscricao_active_inactive
                if ($pathinfo === '/formulario/formulario-inscricao/active-inactive') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Controller\\FormularioInscricaoController::activeInactiveAction',  '_route' => 'datasus_sisvs_expoepi_formulario_formulario_inscricao_active_inactive',);
                }

                // datasus_sisvs_expoepi_formulario_formulario_inscricao_get_apresentacao_modalidade
                if ($pathinfo === '/formulario/formulario-inscricao/get-apresentacao-modalidade') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\FormularioBundle\\Controller\\FormularioInscricaoController::getApresentacaoModalidadeAction',  '_route' => 'datasus_sisvs_expoepi_formulario_formulario_inscricao_get_apresentacao_modalidade',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/acompanhamento')) {
                // acompanhamento_default
                if ($pathinfo === '/acompanhamento/default') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AdministrativoBundle\\Controller\\DefaultController::indexAction',  'label' => 'Módulo Acompanhamento',  '_route' => 'acompanhamento_default',);
                }

                if (0 === strpos($pathinfo, '/acompanhamento/acompanhar-')) {
                    if (0 === strpos($pathinfo, '/acompanhamento/acompanhar-evento')) {
                        // acompanhar_evento
                        if ($pathinfo === '/acompanhamento/acompanhar-evento') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharEventoController::indexAction',  'label' => 'Acompanhar Inscrição do Evento',  'parent' => 'acompanhar_evento',  '_route' => 'acompanhar_evento',);
                        }

                        // acompanhar_inscricao_search
                        if ($pathinfo === '/acompanhamento/acompanhar-evento/search') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharEventoController::searchAction',  '_route' => 'acompanhar_inscricao_search',);
                        }

                        if (0 === strpos($pathinfo, '/acompanhamento/acompanhar-evento/view')) {
                            // acompanhar_evento_view
                            if ($pathinfo === '/acompanhamento/acompanhar-evento/view') {
                                return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharEventoController::viewAction',  'label' => 'Detalhar Inscrição',  'parent' => 'acompanhar_evento',  '_route' => 'acompanhar_evento_view',);
                            }

                            if (0 === strpos($pathinfo, '/acompanhamento/acompanhar-evento/view-')) {
                                // acompanhar_evento_view_inscricao_area
                                if ($pathinfo === '/acompanhamento/acompanhar-evento/view-inscricao-area') {
                                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharEventoController::viewInscricaoAreaAction',  '_route' => 'acompanhar_evento_view_inscricao_area',);
                                }

                                // acompanhar_evento_view_total_inscricao
                                if ($pathinfo === '/acompanhamento/acompanhar-evento/view-total-inscricao') {
                                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharEventoController::viewTotalInscricaoAction',  '_route' => 'acompanhar_evento_view_total_inscricao',);
                                }

                                // acompanhar_evento_view_downloads
                                if ($pathinfo === '/acompanhamento/acompanhar-evento/view-downloads') {
                                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharEventoController::viewDownloadsAction',  '_route' => 'acompanhar_evento_view_downloads',);
                                }

                            }

                        }

                        // acompanhar_evento_download
                        if ($pathinfo === '/acompanhamento/acompanhar-evento/download') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharEventoController::downloadAction',  '_route' => 'acompanhar_evento_download',);
                        }

                        if (0 === strpos($pathinfo, '/acompanhamento/acompanhar-evento/view-')) {
                            // acompanhar_evento_view_pdf
                            if ($pathinfo === '/acompanhamento/acompanhar-evento/view-pdf') {
                                return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharEventoController::viewPdfAction',  '_route' => 'acompanhar_evento_view_pdf',);
                            }

                            // acompanhar_evento_view_inscricao_categoria
                            if ($pathinfo === '/acompanhamento/acompanhar-evento/view-inscricao-categoria') {
                                return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharEventoController::viewInscricaoCategoriaAction',  '_route' => 'acompanhar_evento_view_inscricao_categoria',);
                            }

                            // acompanhar_evento_view_situacao_inscricao
                            if ($pathinfo === '/acompanhamento/acompanhar-evento/view-situacao-inscricao') {
                                return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharEventoController::viewSituacaoInscricaoAction',  '_route' => 'acompanhar_evento_view_situacao_inscricao',);
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/acompanhamento/acompanhar-duplicata')) {
                        // acompanhar_duplicata
                        if ($pathinfo === '/acompanhamento/acompanhar-duplicata') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharDuplicataController::indexAction',  'label' => 'Listar Possíveis Incrições Duplicadas / Inscrições Bloqueadas',  'parent' => 'acompanhar_duplicata',  '_route' => 'acompanhar_duplicata',);
                        }

                        if (0 === strpos($pathinfo, '/acompanhamento/acompanhar-duplicata/toogle')) {
                            // acompanhar_duplicata_toogle
                            if ($pathinfo === '/acompanhamento/acompanhar-duplicata/toogle') {
                                return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharDuplicataController::toogleAction',  '_route' => 'acompanhar_duplicata_toogle',);
                            }

                            // acompanhar_duplicata_toogle_block
                            if ($pathinfo === '/acompanhamento/acompanhar-duplicata/toogle-block') {
                                return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharDuplicataController::toogleBlockAction',  '_route' => 'acompanhar_duplicata_toogle_block',);
                            }

                        }

                        // acompanhar_duplicata_search
                        if ($pathinfo === '/acompanhamento/acompanhar-duplicata/search') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharDuplicataController::searchAction',  '_route' => 'acompanhar_duplicata_search',);
                        }

                        if (0 === strpos($pathinfo, '/acompanhamento/acompanhar-duplicata/view')) {
                            // acompanhar_duplicata_view
                            if ($pathinfo === '/acompanhamento/acompanhar-duplicata/view') {
                                return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharDuplicataController::viewAction',  'label' => 'Visualizar Inscrição',  'parent' => 'acompanhar_duplicata',  '_route' => 'acompanhar_duplicata_view',);
                            }

                            // acompanhar_duplicata_view_downloads
                            if ($pathinfo === '/acompanhamento/acompanhar-duplicata/view-downloads') {
                                return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharDuplicataController::viewDownloadsAction',  '_route' => 'acompanhar_duplicata_view_downloads',);
                            }

                        }

                        // acompanhar_duplicata_download
                        if ($pathinfo === '/acompanhamento/acompanhar-duplicata/download') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharDuplicataController::downloadAction',  '_route' => 'acompanhar_duplicata_download',);
                        }

                        // acompanhar_duplicata_view_pdf
                        if ($pathinfo === '/acompanhamento/acompanhar-duplicata/view-pdf') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharDuplicataController::viewPdfAction',  '_route' => 'acompanhar_duplicata_view_pdf',);
                        }

                        // acompanhar_evento_combo_box
                        if ($pathinfo === '/acompanhamento/acompanhar-duplicata/combo-box') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AcompanhamentoBundle\\Controller\\AcompanharDuplicataController::comboBoxAction',  '_route' => 'acompanhar_evento_combo_box',);
                        }

                    }

                }

            }

            if (0 === strpos($pathinfo, '/autor')) {
                // autor_default
                if ($pathinfo === '/autor/default') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Controller\\PainelController::acessarAction',  'label' => 'Painel do Autor',  '_route' => 'autor_default',);
                }

                if (0 === strpos($pathinfo, '/autor/acompanhar-inscricao')) {
                    // autor_acompanhar_inscricao
                    if ($pathinfo === '/autor/acompanhar-inscricao') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Controller\\AcompanharInscricaoController::indexAction',  'label' => 'Acompanhar Informações da Inscrição',  'parent' => 'autor_default',  '_route' => 'autor_acompanhar_inscricao',);
                    }

                    // autor_acompanhar_inscricao_search
                    if ($pathinfo === '/autor/acompanhar-inscricao/search') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Controller\\AcompanharInscricaoController::searchAction',  '_route' => 'autor_acompanhar_inscricao_search',);
                    }

                    // autor_acompanhar_inscricao_view
                    if ($pathinfo === '/autor/acompanhar-inscricao/view') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Controller\\AcompanharInscricaoController::viewAction',  '_route' => 'autor_acompanhar_inscricao_view',);
                    }

                }

                if (0 === strpos($pathinfo, '/autor/painel')) {
                    // autor_painel
                    if ($pathinfo === '/autor/painel') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Controller\\PainelController::indexAction',  'label' => 'Informações da Inscrição',  'parent' => 'autor_default',  '_route' => 'autor_painel',);
                    }

                    // autor_painel_acessar
                    if ($pathinfo === '/autor/painel/acessar') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Controller\\PainelController::acessarAction',  'label' => 'Informações da Inscrição',  'parent' => 'autor_default',  '_route' => 'autor_painel_acessar',);
                    }

                    if (0 === strpos($pathinfo, '/autor/painel/se')) {
                        // autor_painel_search
                        if ($pathinfo === '/autor/painel/search') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Controller\\PainelController::searchAction',  '_route' => 'autor_painel_search',);
                        }

                        // autor_painel_send
                        if ($pathinfo === '/autor/painel/send') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Controller\\PainelController::sendAction',  '_route' => 'autor_painel_send',);
                        }

                    }

                    // autor_painel_view_pdf
                    if ($pathinfo === '/autor/painel/view-pdf') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Controller\\PainelController::viewPdfAction',  '_route' => 'autor_painel_view_pdf',);
                    }

                    // autor_painel_create
                    if ($pathinfo === '/autor/painel/create') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Controller\\PainelController::createAction',  'label' => 'Cadastrar Inscrição',  'parent' => 'autor_default',  '_route' => 'autor_painel_create',);
                    }

                    // autor_painel_edit
                    if ($pathinfo === '/autor/painel/edit') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\AutorBundle\\Controller\\PainelController::editAction',  'label' => 'Alterar Inscrição',  'parent' => 'autor_default',  '_route' => 'autor_painel_edit',);
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/email')) {
            // email_default
            if ($pathinfo === '/email/default') {
                return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\EmailBundle\\Controller\\DefaultController::indexAction',  'label' => 'Módulo E-mail',  '_route' => 'email_default',);
            }

            if (0 === strpos($pathinfo, '/email/mala-direta')) {
                // datasus_sisvs_expoepi_email_mala_direta
                if ($pathinfo === '/email/mala-direta') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\EmailBundle\\Controller\\MalaDiretaController::indexAction',  'label' => 'Mala Direta',  'parent' => 'datasus_sisvs_expoepi_email_mala_direta',  '_route' => 'datasus_sisvs_expoepi_email_mala_direta',);
                }

                // datasus_sisvs_expoepi_email_mala_direta_search
                if ($pathinfo === '/email/mala-direta/search') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\EmailBundle\\Controller\\MalaDiretaController::searchAction',  '_route' => 'datasus_sisvs_expoepi_email_mala_direta_search',);
                }

                // datasus_sisvs_expoepi_email_mala_direta_combo_box
                if ($pathinfo === '/email/mala-direta/combo-box') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\EmailBundle\\Controller\\MalaDiretaController::comboBoxAction',  '_route' => 'datasus_sisvs_expoepi_email_mala_direta_combo_box',);
                }

                if (0 === strpos($pathinfo, '/email/mala-direta/view')) {
                    // datasus_sisvs_expoepi_email_mala_direta_view
                    if ($pathinfo === '/email/mala-direta/view') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\EmailBundle\\Controller\\MalaDiretaController::viewAction',  '_route' => 'datasus_sisvs_expoepi_email_mala_direta_view',);
                    }

                    // datasus_sisvs_expoepi_email_mala_direta_view_pdf
                    if ($pathinfo === '/email/mala-direta/view-pdf') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\EmailBundle\\Controller\\MalaDiretaController::viewPdfAction',  '_route' => 'datasus_sisvs_expoepi_email_mala_direta_view_pdf',);
                    }

                }

                // datasus_sisvs_expoepi_email_mala_direta_anexo
                if ($pathinfo === '/email/mala-direta/anexo') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\EmailBundle\\Controller\\MalaDiretaController::anexoAction',  '_route' => 'datasus_sisvs_expoepi_email_mala_direta_anexo',);
                }

                // datasus_sisvs_expoepi_email_mala_direta_write_mail
                if ($pathinfo === '/email/mala-direta/write-mail') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\EmailBundle\\Controller\\MalaDiretaController::writeMailAction',  '_route' => 'datasus_sisvs_expoepi_email_mala_direta_write_mail',);
                }

                // datasus_sisvs_expoepi_email_mala_direta_send
                if ($pathinfo === '/email/mala-direta/send') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\EmailBundle\\Controller\\MalaDiretaController::sendAction',  '_route' => 'datasus_sisvs_expoepi_email_mala_direta_send',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/relatorio')) {
            // relatorio_default
            if ($pathinfo === '/relatorio/default') {
                return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\RelatorioBundle\\Controller\\DefaultController::indexAction',  'label' => 'Relatório',  '_route' => 'relatorio_default',);
            }

            if (0 === strpos($pathinfo, '/relatorio/relatorio-inscricao')) {
                // datasus_sisvs_expoepi_relatorio_relatorio_inscricao
                if ($pathinfo === '/relatorio/relatorio-inscricao') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\RelatorioBundle\\Controller\\RelatorioInscricaoController::indexAction',  'label' => 'Relatório de Inscrição',  'parent' => 'relatorio_inscricao',  '_route' => 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao',);
                }

                // datasus_sisvs_expoepi_relatorio_relatorio_inscricao_search
                if ($pathinfo === '/relatorio/relatorio-inscricao/search') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\RelatorioBundle\\Controller\\RelatorioInscricaoController::searchAction',  '_route' => 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao_search',);
                }

                // datasus_sisvs_expoepi_relatorio_relatorio_inscricao_grafico
                if ($pathinfo === '/relatorio/relatorio-inscricao/grafico') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\RelatorioBundle\\Controller\\RelatorioInscricaoController::graficoAction',  'label' => 'Gerar Gráfico',  'parent' => 'relatorio_inscricao',  '_route' => 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao_grafico',);
                }

                // datasus_sisvs_expoepi_relatorio_relatorio_inscricao_create
                if ($pathinfo === '/relatorio/relatorio-inscricao/create') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\RelatorioBundle\\Controller\\RelatorioInscricaoController::createAction',  'label' => 'Relatório de Inscrição',  'parent' => 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao',  '_route' => 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao_create',);
                }

                if (0 === strpos($pathinfo, '/relatorio/relatorio-inscricao/view-')) {
                    // datasus_sisvs_expoepi_relatorio_relatorio_inscricao_view_pdf
                    if ($pathinfo === '/relatorio/relatorio-inscricao/view-pdf') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\RelatorioBundle\\Controller\\RelatorioInscricaoController::viewPdfAction',  'label' => 'Relatório de Inscrição',  'parent' => 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao',  '_route' => 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao_view_pdf',);
                    }

                    // datasus_sisvs_expoepi_relatorio_relatorio_inscricao_view_excel
                    if ($pathinfo === '/relatorio/relatorio-inscricao/view-excel') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\RelatorioBundle\\Controller\\RelatorioInscricaoController::viewExcelAction',  '_route' => 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao_view_excel',);
                    }

                }

                // datasus_sisvs_expoepi_relatorio_relatorio_inscricao_edit
                if ($pathinfo === '/relatorio/relatorio-inscricao/edit') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\RelatorioBundle\\Controller\\RelatorioInscricaoController::editAction',  'label' => 'Relatório de Inscrição',  'parent' => 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao',  '_route' => 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao_edit',);
                }

                if (0 === strpos($pathinfo, '/relatorio/relatorio-inscricao/geral')) {
                    // datasus_sisvs_expoepi_relatorio_relatorio_inscricao_geral
                    if ($pathinfo === '/relatorio/relatorio-inscricao/geral') {
                        return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\RelatorioBundle\\Controller\\RelatorioInscricaoController::geralAction',  'label' => 'Relatório de Inscrição Geral',  'parent' => 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao',  '_route' => 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao_geral',);
                    }

                    if (0 === strpos($pathinfo, '/relatorio/relatorio-inscricao/geral-')) {
                        // datasus_sisvs_expoepi_relatorio_relatorio_inscricao_geral_pdf
                        if ($pathinfo === '/relatorio/relatorio-inscricao/geral-pdf') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\RelatorioBundle\\Controller\\RelatorioInscricaoController::geralPdfAction',  '_route' => 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao_geral_pdf',);
                        }

                        // datasus_sisvs_expoepi_relatorio_relatorio_inscricao_geral_excel
                        if ($pathinfo === '/relatorio/relatorio-inscricao/geral-excel') {
                            return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\RelatorioBundle\\Controller\\RelatorioInscricaoController::geralExcelAction',  '_route' => 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao_geral_excel',);
                        }

                    }

                }

                // datasus_sisvs_expoepi_relatorio_relatorio_inscricao_ajax_get_event_year
                if ($pathinfo === '/relatorio/relatorio-inscricao/ajax-get-event-year') {
                    return array (  '_controller' => 'Datasus\\Sisvs\\ExpoEpi\\RelatorioBundle\\Controller\\RelatorioInscricaoController::ajaxGetEventYearAction',  '_route' => 'datasus_sisvs_expoepi_relatorio_relatorio_inscricao_ajax_get_event_year',);
                }

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
