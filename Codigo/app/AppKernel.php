<?php

use Datasus\Core\BaseBundle\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{

//    /**
//     * Alterando o diretório de log
//     * @return type
//     */
//    public function getLogDir()
//    {
//        return $this->rootDir . '/../data/logs';
//    }
//
//    /**
//     *
//     * Alterando o diretório de cache
//     * @return
//     */
//    public function getCacheDir()
//    {
//        return $this->rootDir . '/../data/cache/' . $this->environment;
//    }

    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Spraed\PDFGeneratorBundle\SpraedPDFGeneratorBundle(),
            new Xi\Bundle\BreadcrumbsBundle\XiBreadcrumbsBundle(),
            new Liuggio\ExcelBundle\LiuggioExcelBundle(),

            new Datasus\Core\BaseBundle\DatasusCoreBaseBundle(),
            new Datasus\Sisvs\ExpoEpi\AdministrativoBundle\DatasusSisvsExpoEpiAdministrativoBundle(),
            new Datasus\Sisvs\Base\BaseBundle\DatasusSisvsBaseBaseBundle(),
            new Datasus\Sisvs\ExpoEpi\AutorBundle\DatasusSisvsExpoEpiAutorBundle(),
            new Datasus\Sisvs\Base\SecurityBundle\DatasusSisvsBaseSecurityBundle(),
            new Datasus\Sisvs\ExpoEpi\FormularioBundle\DatasusSisvsExpoEpiFormularioBundle(),
            new Datasus\Sisvs\ExpoEpi\AcompanhamentoBundle\DatasusSisvsExpoEpiAcompanhamentoBundle(),
            new Datasus\Sisvs\ExpoEpi\EmailBundle\DatasusSisvsExpoEpiEmailBundle(),
            new Datasus\Sisvs\ExpoEpi\RelatorioBundle\DatasusSisvsExpoEpiRelatorioBundle()
        );

        if (in_array($this->getEnvironment(), array('dev'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config.yml');
    }
}
