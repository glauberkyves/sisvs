<?php

namespace Datasus\Sisvs\ExpoEpi\AdministrativoBundle\Controller;

use Datasus\Sisvs\Base\BaseBundle\Controller\CrudController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class EventoController extends CrudController
{

    protected $service = 'datasus_sisvs_expoepi_administrativo.evento';
    protected $baseRoute = 'datasus_sisvs_expoepi_administrativo_evento';

    public function getAllConfigGrid($data)
    {
        foreach ($data->rows as $key => $value) {
            $editRoute = $this->generateUrl($this->baseRoute . '_edit', array('id' => $value['id']));
            $download  = $this->generateUrl($this->baseRoute . '_download', array('id' => $value['id']));

            $routeMod     = 'datasus_sisvs_expoepi_administrativo_modalidade';
            $rtModalidade = $this->generateUrl($routeMod, array('coEvento' => $value['id']));
            $statusIcon = $value['cell']['stAtivo'] == 'S' ? 'active' : 'inactive';
            $titulo = $value['cell']['stAtivo'] == 'S' ? 'Inativar' : 'Ativar';


            $html = $this->extension('html');
            $html->url(array(
                'onclick' => "utils.toogleStatus({$value['id']}, '{$statusIcon}')",
                'title'   => $titulo
            ), $statusIcon);

            if ('active' == $statusIcon) {
                $html->url(array(
                    'href'  => $editRoute,
                    'title' => 'Alterar'
                ), 'edit')
                    ->url(array(
                        'href' => $rtModalidade
                    ), 'bind')
                    ->startGroup('view')
                    ->url(array(
                        'value'   => 'Visualizar Modalidade com Evento',
                        'onclick' => "utils.view({$value['id']})"
                    ))
                    ->url(array(
                        'value' => 'Visualizar edital',
                        'href'  => $download
                    ))
                    ->endGroup();
            }

            $data->rows[$key]['cell']['acao'] = $html->render();
        }
    }

    public function editAction(Request $request)
    {
        if ($this->getRequest()->headers->get('CONTENT_LENGTH') > ((int)ini_get('post_max_size') * 1024000)
            && $this->getRequest()->isMethod('POST')
        ) {
            $referer = $this->getRequest()->headers->get('referer');
            $this->getService()->registerError('O tamanho do upload é superio a 10Mb');

            return new RedirectResponse($referer);
        }

		    $id           = $request->get('id');
		    $this->entity = $this->getService()->find($id);

		    $this->form = $this->getFormEntity();
		    $this->form->handleRequest($request);
		    if ($request->isMethod('POST')) {
				    $this->entity->setDsEvento($request->request->get('datasus_sisvs_expoepi_administrativobundle_eventoentity')['dsEvento']);
				    $this->entity = $this->form->getData();
				    $valid        = $this->validateEntity($this->entity);
				    if ($this->form->isValid() && $valid) {
						    return $this->saveEntity($this->entity, $request);
				    }
		    }

		    $this->params['entity'] = $this->entity;
		    $this->params['form']   = $this->form->createView();

		    return $this->renderAction();

    }

    public function createAction(Request $request)
    {
        if ($this->getRequest()->headers->get('CONTENT_LENGTH') > ((int)ini_get('post_max_size') * 1024000)
            && $this->getRequest()->isMethod('POST')
        ) {
            $referer = $this->getRequest()->headers->get('referer');
            $this->getService()->registerError('O tamanho do upload é superio a 10Mb');

            return new RedirectResponse($referer);
        }

        return parent::createAction($request);
    }

    protected function getFile(Request $request)
    {
        $id           = $request->get('id');
        $this->entity = $this->getService()->find($id);

        if (!$this->entity) {
            $this->addMessage('Entidade não localizada.', 'error');

            return $this->redirect($this->generateUrl($this->baseRoute));
        }

        $filename = $this->entity->getNoEdital();
        $content  = stream_get_contents($this->entity->getDsEdital());

        $config = array(
            'filename' => $filename,
            'content'  => $content,
        );

        return $config;
    }

    protected function renderAction($view = null)
    {
        $this->params['imLogotipo'] = false;

        if (is_resource($this->entity->getImLogotipo())) {
            ob_start();
            echo base64_encode(stream_get_contents($this->params['entity']->getImLogotipo()));
            $img = ob_get_contents();
            ob_end_clean();

            $this->params['imLogotipo'] = $img;
        }

        return parent::renderAction();
    }
}