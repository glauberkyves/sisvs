<?php
/**
 * Created by PhpStorm.
 * User: Glauber
 * Date: 06/12/13
 * Time: 10:59
 */

namespace Datasus\Sisvs\Base\BaseBundle\Twig;

class HeaderPdfExtension extends \Twig_Extension
{
    protected $service = null;

    public function __construct($container)
    {
        $this->service = $container->get('datasus_sisvs_expoepi_administrativo.evento');
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('headerPdf', array($this, 'headerPdf')),
        );
    }

    public function headerPdf($ano = null)
    {
        if (null === $ano) {
            $ano = date('Y');
        }

        $entity = $this->service->findOneByAnEvento($ano);

        if ($entity && is_resource($entity->getImLogotipo())) {
            $tmp_dir  = sys_get_temp_dir();
            $filename = $entity->getNoLogotipo();
            $path     = $tmp_dir . DIRECTORY_SEPARATOR . $filename;

            if (!file_exists($path)) {
                $img = stream_get_contents($entity->getImLogotipo());
                file_put_contents($path, $img);
            }
        }else{
            $entity = $this->service->getEntity();
        }

        return array(
            'noEvento'   => $entity->getNoEvento(),
            'dsEvento'   => $entity->getDsEvento(),
            'noLogotipo' => $entity->getNoLogotipo()
        );
    }

    public function getName()
    {
        return 'header_pdf_extension';
    }
}