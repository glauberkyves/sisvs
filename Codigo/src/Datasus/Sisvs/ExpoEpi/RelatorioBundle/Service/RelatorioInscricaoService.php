<?php

namespace Datasus\Sisvs\ExpoEpi\RelatorioBundle\Service;

use Datasus\Sisvs\Base\BaseBundle\Service\CrudService;
use Symfony\Component\HttpFoundation\Request;

class RelatorioInscricaoService extends CrudService
{

    protected $entity = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Entity\InscricaoEntity';
    protected $entityType = 'Datasus\Sisvs\ExpoEpi\AutorBundle\Form\InscricaoEntityType';

    public function getDataRelatorioInscricao(Request $request)
    {
        $this->dataGrid = $this->getRepository()->getDataRelatorioInscricao($request);

        return $this->getResultGrid($request);
    }

    public function generateImage($patch = false)
    {
        $tmp_dir  = sys_get_temp_dir();
        $filename = uniqid(md5(microtime())) . '.png';
        $path     = $tmp_dir . DIRECTORY_SEPARATOR . $filename;

        if (!file_exists($path)) {
            $blog = base64_decode(str_replace('data:image/png;base64,', '', $this->getRequest()->get('blobImg')));
            file_put_contents($path, $blog);
        }

        if ($patch) {
            return $path;
        }

        return $filename;
    }

    public function getTitleChart()
    {
        switch ($this->getRequest()->get('query')) {
            case 'inscricoes-por-evento':
                return 'Inscrições por Evento';
                break;
            case 'inscricoes-por-modalidade':
                return 'Inscrições por Modalidade';
                break;
            case 'inscricoes-por-area':
                return 'Inscrições por Área';
                break;
            case 'inscricoes-por-tema':
                return 'Inscrições por Tema / Categoria';
                break;
            case 'inscricoes-por-instituicao':
                return 'Inscrições por Instituição';
                break;
            case 'inscricoes-por-situacao':
                return 'Inscrições por Situação';
                break;
            case 'inscricoes-por-municipio':
                return 'Inscrições por Município';
                break;
            case 'inscricoes-por-estado':
                return 'Inscrições por Estado';
                break;
            case 'inscricoes-por-regiao':
                return 'Inscrições por Região';
                break;
            case 'inscricoes-por-sexo':
                return 'Inscrições por Sexo';
                break;
            case 'inscricoes-por-duplicata':
                return 'Possíveis Inscrições Duplicadas';
                break;
        }
    }

    public function getDataChart()
    {
        $request = $this->getRequest();

        switch ($request->get('query')) {
            case 'inscricoes-por-evento':
                return $this->getRepository()->getTotalPorEvento($request);
                break;
            case 'inscricoes-por-modalidade':
                return $this->getRepository()->getTotalPorModalidade($request);
                break;
            case 'inscricoes-por-area':
                return $this->getRepository()->getTotalPorArea($request);
                break;
            case 'inscricoes-por-tema':
                return $this->getRepository()->getTotalPorTema($request);
                break;
            case 'inscricoes-por-instituicao':
                return $this->getRepository()->getTotalPorInstituicao($request);
                break;
            case 'inscricoes-por-situacao':
                return $this->getRepository()->getTotalSituacaoInscricao($request);
                break;
            case 'inscricoes-por-tipo-instituicao':
                return $this->getRepository()->getTotalTipoInstituicao($request);
                break;
            case 'inscricoes-por-municipio':
                return $this->getRepository()->getTotalPorMunicipio($request);
                break;
            case 'inscricoes-por-estado':
                return $this->getRepository()->getTotalPorEstado($request);
                break;
            case 'inscricoes-por-regiao':
                return $this->getRepository()->getTotalPorRegiao($request);
                break;
            case 'inscricoes-por-sexo':
                return $this->getRepository()->getTotalPorSexo($request);
                break;
            case 'inscricoes-por-duplicata':
                $result = array_unique($this->getRepository()->getTotalDeDuplicatas($request),1);
                return $result;
                break;
        }
    }

    public function mountJson()
    {
        $json = '';

        switch ($this->getRequest()->get('tipoGrafico')) {
            case 'pie':
                $json = "['Descrição', 'Total'], ";

                foreach ((array)$this->getDataChart() as $value) {
                    if ($value['total'] > 0) {
                        $json .= "['{$value['title']}', {$value['total']}], \n";
                    }
                }

                break;

            case 'bar':
            case 'column':
                $json = "['Descrição', 'Total', { role: 'style' }, { role: 'annotation' } ],";

                foreach ((array)$this->getDataChart() as $value) {
                    if ($value['total'] > 0) {
                        $porcentagem = number_format(($value['total'] / $this->getTotalChart()) * 100, 1);

                        $json .= "['{$value['title']}', {$value['total']}, '" . $this->randColor() . "'";
                        $json .= ", '{$value['total']} / {$porcentagem}%'], \n";
                    }
                }

                break;
        }

        return substr($json, 0, strlen($json) - 3);
    }

    public function getTotalChart()
    {
        $total = 0;

        foreach ((array)$this->getDataChart() as $value) {
            $total += $value['total'];
        }

        return $total;
    }

    private function randColor()
    {
        $rand  = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
        $color = '#' . $rand[rand(0, 15)]
            . $rand[rand(0, 15)]
            . $rand[rand(0, 15)]
            . $rand[rand(0, 15)]
            . $rand[rand(0, 15)]
            . $rand[rand(0, 15)];

        return $color;
    }

    public function getDataExcelGrafico(\PHPExcel $template)
    {
        $objDrawing = new \PHPExcel_Worksheet_Drawing();
        $objDrawing->setPath($this->generateImage(true));
        $objDrawing->setCoordinates('A11');
        $objDrawing->setWorksheet($template->getActiveSheet());
        $objDrawing->setWidth(900);
    }

    public function getDataExcel(\PHPExcel $template, $config)
    {
        $this->mountColumns($template, $config);
        $this->mountValuesColumns($template, $config);

        for ($col = 'A'; $col !== 'Z'; $col++) {
            $template
                ->getActiveSheet()
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }


        $styleArray = array(
            'fill'    => array(
                'type'  => \PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'F0F0F0')
            ),
            'font'    => array(
                'bold' => true
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_MEDIUM
                )
            ));

        $columns = $template->getActiveSheet()->getCellCollection();
        $column  = substr(end($columns), 0, 1);

        $template
            ->getActiveSheet()
            ->getStyle("A8:{$column}8")
            ->applyFromArray($styleArray)
            ->getActiveSheet()
            ->setCellValue('A7', 'Relatório de Inscrição')
            ->mergeCells("A7:{$column}7")
            ->getStyle("A7:{$column}7")
            ->applyFromArray($styleArray)
            ->getActiveSheet()
            ->getStyle("A7:{$column}7")
            ->getAlignment()
            ->setHorizontal('center')
            ->setVertical('center');
    }

    public function mountColumns(\PHPExcel $template, $config)
    {
        $template
            ->getActiveSheet()
            ->setCellValue("A8", 'Evento')
            ->setCellValue("B8", 'Ano')
            ->setCellValue("C8", 'Modalidade');

        $alpha = 'd';
        foreach ($config['columns'] as $key => $value) {
            if ($value && $this->getNameColumn($key)) {
                $template
                    ->getActiveSheet()
                    ->setCellValue("{$alpha}8", $this->getNameColumn($key));

                $alpha++;
            }
        }

        $alphaQtd    = $alpha++;
        $alphaPercen = $alpha++;

        $template
            ->getActiveSheet()
            ->setCellValue("{$alphaQtd}8", 'Quantidade')
            ->setCellValue("{$alphaPercen}8", 'Percentual');
    }

    public function mountValuesColumns(\PHPExcel $template, $config)
    {
        $index      = 9;
        $arrColumns = array(
            'noEvento', 'anEvento', 'noModalidade', 'noArea', 'noTema',
            'noRegiao', 'noUf', 'coSexo', 'dsSituacao', 'noTipoInstituicao', 'noInstituicao',
            'duplicata', 'quantidade', 'porcentagem',
        );

        foreach ($config['data'] as $values) {
            $alpha = 'a';

            foreach ($values['cell'] as $key => $value) {
                if ($value && in_array($key, $arrColumns)) {
                    if ($key == 'coSexo') {
                        $value = $value == 'M' ? 'Masculino' : 'Feminino';
                    }

                    if ($key == 'duplicata' && !isset($config['columns']['InInforDuplicadas'])) {
                        continue;
                    }

                    $template
                        ->getActiveSheet()
                        ->setCellValue("{$alpha}{$index}", $value);

                    $alpha++;
                }
            }

            $index++;
        }
    }

    public function getNameColumn($key)
    {
        $name = '';

        switch ($key) {
            case 'coSeqArea':
                $name = 'Área';
                break;
            case 'coSeqTema':
                $name = 'Tema / Categoria';
                break;
            case 'coRegiao':
                $name = 'Região';
                break;
            case 'coUfIbge':
                $name = 'Estado';
                break;
            case 'coMunicipioIbge':
                $name = 'Município';
                break;
            case 'coSexo':
                $name = 'Sexo';
                break;
            case 'coSituacao':
                $name = 'Situação';
                break;
            case 'inInstituicao':
                $name = 'Instituição';
                break;
            case 'coSeqInstituicao':
                $name = 'Tipo de Instituição';
                break;
            case 'InInforDuplicadas':
                $name = 'Duplicadatas';
                break;
        }

        return $name;
    }

    public function setHeaderExcel(\PHPExcel $template)
    {
        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_MEDIUM
                )
            )
        );

        $template
            ->getActiveSheet()
            ->getStyle('A7:N7')
            ->applyFromArray($styleArray);

        $template
            ->getActiveSheet()
            ->mergeCells('A7:N7')
            ->setCellValue('A7', $this->getRequest()->get('titulo'))
            ->getStyle('A7')
            ->getAlignment()
            ->setWrapText(true)
            ->setVertical('center')
            ->setHorizontal('center');

        $evento = trim($this->getRequest()->get('evento'));
        $template
            ->getActiveSheet()
            ->mergeCells('A8:N8')
            ->mergeCells('A9:N9')
            ->setCellValue('A8', "Evento: {$evento}")
            ->setCellValue('A9', "Número de Inscrições: {$this->getRequest()->get('total')}");
    }

    public function moutRelatorioExcel(\PHPExcel $template, $container)
    {
        $template
            ->getActiveSheet()
            ->setCellValue('A7', 'Relatório de Inscrição')
            ->mergeCells('A7:N7');

        $styleArray = array(
            'fill'    => array(
                'type'  => \PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'F0F0F0')
            ),
            'font'    => array(
                'bold' => true
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_MEDIUM
                )
            ));

        $template
            ->getActiveSheet()
            ->getStyle("A7:N7")
            ->applyFromArray($styleArray)
            ->getActiveSheet()
            ->getStyle("A7:N7")
            ->getAlignment()
            ->setHorizontal('center')
            ->setVertical('center');

        $params = $container->getParams();

        $template
            ->getActiveSheet()
            ->setCellValue('A9', 'Evento')
            ->setCellValue('A10', $params['arrEvento'][0]['title'])
            ->setCellValue('I9', 'Ano')
            ->setCellValue('I10', $params['anEvento'])
            ->setCellValue('A12', 'Modalidade')
            ->setCellValue('J8', 'Quantidade de Inscrições')
            ->setCellValue('M8', 'Percentual')
            ->mergeCells('J8:L8')
            ->mergeCells('M8:N8')
            ->mergeCells('A12:N12');

        $template
            ->getActiveSheet()
            ->getStyle("A12:N12")
            ->applyFromArray($styleArray);

        $template
            ->getActiveSheet()
            ->setCellValue("J10", $params['total'])
            ->mergeCells("J10:L10");

        $template
            ->getActiveSheet()
            ->getStyle("J10:L10")
            ->getAlignment()
            ->setHorizontal('center')
            ->setVertical('center');

        $indexMod = 12;
        foreach ($params['arrModalidade'] as $modalidade) {
            if ($modalidade['total']) {
                $indexMod++;
                $template
                    ->getActiveSheet()
                    ->setCellValue("A{$indexMod}", $modalidade['title'])
                    ->mergeCells("A{$indexMod}:I{$indexMod}");

                $template
                    ->getActiveSheet()
                    ->setCellValue("J{$indexMod}", $modalidade['total'])
                    ->mergeCells("J{$indexMod}:L{$indexMod}");

                $template
                    ->getActiveSheet()
                    ->setCellValue("M{$indexMod}", substr(($modalidade['total'] / $params['total']) * 100, 0, 5) . '%')
                    ->mergeCells("M{$indexMod}:N{$indexMod}");

                $template
                    ->getActiveSheet()
                    ->getStyle("J{$indexMod}:N{$indexMod}")
                    ->getAlignment()
                    ->setHorizontal('center')
                    ->setVertical('center');

                foreach ($params['arrArea'][$modalidade['coSeqModalidade']] as $area) {
                    if ($area['total']) {
                        $indexMod++;
                        $template
                            ->getActiveSheet()
                            ->setCellValue("B{$indexMod}", $area['title'])
                            ->mergeCells("B{$indexMod}:I{$indexMod}");

                        $template
                            ->getActiveSheet()
                            ->setCellValue("J{$indexMod}", $area['total'])
                            ->mergeCells("J{$indexMod}:L{$indexMod}");

                        $template
                            ->getActiveSheet()
                            ->setCellValue("M{$indexMod}", substr(($area['total'] / $params['total']) * 100, 0, 5) . '%')
                            ->mergeCells("M{$indexMod}:N{$indexMod}");

                        $template
                            ->getActiveSheet()
                            ->getStyle("J{$indexMod}:N{$indexMod}")
                            ->getAlignment()
                            ->setHorizontal('center')
                            ->setVertical('center');

                        foreach ($params['arrTema'][$area['coSeqArea']] as $tema) {
                            if ($tema['total']) {
                                $indexMod++;
                                $template
                                    ->getActiveSheet()
                                    ->setCellValue("C{$indexMod}", $tema['title'])
                                    ->mergeCells("C{$indexMod}:I{$indexMod}");

                                $template
                                    ->getActiveSheet()
                                    ->setCellValue("J{$indexMod}", $tema['total'])
                                    ->mergeCells("J{$indexMod}:L{$indexMod}");

                                $template
                                    ->getActiveSheet()
                                    ->setCellValue("M{$indexMod}", substr(($tema['total'] / $params['total']) * 100, 0, 5) . '%')
                                    ->mergeCells("M{$indexMod}:N{$indexMod}");

                                $template
                                    ->getActiveSheet()
                                    ->getStyle("J{$indexMod}:N{$indexMod}")
                                    ->getAlignment()
                                    ->setHorizontal('center')
                                    ->setVertical('center');
                            }
                        }
                    }
                }

                $indexMod++;
                $template
                    ->getActiveSheet()
                    ->setCellValue("A{$indexMod}", '')
                    ->mergeCells("A{$indexMod}:N{$indexMod}");
            }
        }

        $indexMod++;
        $indexMod++;

        $arrAutor = array('arrSituacao' => 'Situação');
        foreach ($arrAutor as $key => $value) {

            $template
                ->getActiveSheet()
                ->setCellValue("A{$indexMod}", $value)
                ->mergeCells("A{$indexMod}:N{$indexMod}");

            $template
                ->getActiveSheet()
                ->getStyle("A{$indexMod}:N{$indexMod}")
                ->applyFromArray($styleArray);

            foreach ($params[$key] as $valueArr) {
                if ($valueArr['total']) {
                    $indexMod++;
                    if($valueArr['coSituacao'] == 3){
                    $template
                            ->getActiveSheet()
                            ->setCellValue("A{$indexMod}",'Possíveis Duplicadas')
                            ->mergeCells("A{$indexMod}:I{$indexMod}");
                    }else{
                        $template
                            ->getActiveSheet()
                            ->setCellValue("A{$indexMod}", $valueArr['title'])
                            ->mergeCells("A{$indexMod}:I{$indexMod}");
                    }

                    $template
                        ->getActiveSheet()
                        ->setCellValue("J{$indexMod}", $valueArr['total'])
                        ->mergeCells("J{$indexMod}:L{$indexMod}");

                    $template
                        ->getActiveSheet()
                        ->setCellValue("M{$indexMod}", substr(($valueArr['total'] / $params['total']) * 100, 0, 5) . '%')
                        ->mergeCells("M{$indexMod}:N{$indexMod}");

                    $template
                        ->getActiveSheet()
                        ->getStyle("J{$indexMod}:N{$indexMod}")
                        ->getAlignment()
                        ->setHorizontal('center')
                        ->setVertical('center');
                }
            }

            $indexMod++;
            $indexMod++;
        }

        $arrAutor = array('arrDuplicadas' => 'Possíveis Duplicadas');
        foreach ($arrAutor as $key => $value) {

            $template
                ->getActiveSheet()
                ->setCellValue("A{$indexMod}", $value)
                ->mergeCells("A{$indexMod}:N{$indexMod}");

            $template
                ->getActiveSheet()
                ->getStyle("A{$indexMod}:N{$indexMod}")
                ->applyFromArray($styleArray);

            foreach ($params[$key] as $valueArr) {
                if ($valueArr['total']) {
                    $indexMod++;
                        $template
                            ->getActiveSheet()
                            ->setCellValue("A{$indexMod}", $valueArr['title'])
                            ->mergeCells("A{$indexMod}:I{$indexMod}");
                    $template
                        ->getActiveSheet()
                        ->setCellValue("J{$indexMod}", $valueArr['total'])
                        ->mergeCells("J{$indexMod}:L{$indexMod}");

                    $template
                        ->getActiveSheet()
                        ->setCellValue("M{$indexMod}", substr(($valueArr['total'] / $params['total']) * 100, 0, 5) . '%')
                        ->mergeCells("M{$indexMod}:N{$indexMod}");

                    $template
                        ->getActiveSheet()
                        ->getStyle("J{$indexMod}:N{$indexMod}")
                        ->getAlignment()
                        ->setHorizontal('center')
                        ->setVertical('center');
                }
            }

            $indexMod++;
            $indexMod++;
        }

        $template
            ->getActiveSheet()
            ->setCellValue("A{$indexMod}", 'Dados da Instituição')
            ->mergeCells("A{$indexMod}:N{$indexMod}");

        $template
            ->getActiveSheet()
            ->getStyle("A{$indexMod}:N{$indexMod}")
            ->applyFromArray($styleArray);

        $indexMod++;
        $arrAutor = array(
            'estadoInstituicao' => 'Estado', 'municipioInstituicao' => 'Município',
            'regiaoInstituicao' => 'Região', 'tipoInstituicao' => 'Tipo de Instituição'
        );
        foreach ($arrAutor as $key => $value) {
            $template
                ->getActiveSheet()
                ->setCellValue("A{$indexMod}", $value)
                ->mergeCells("A{$indexMod}:N{$indexMod}");

            $template
                ->getActiveSheet()
                ->getStyle("A{$indexMod}:N{$indexMod}")
                ->applyFromArray($styleArray);

            foreach ($params[$key] as $valueArr) {
                if ($valueArr['total']) {
                    $indexMod++;
                    $template
                        ->getActiveSheet()
                        ->setCellValue("A{$indexMod}", $valueArr['title'])
                        ->mergeCells("A{$indexMod}:I{$indexMod}");

                    $template
                        ->getActiveSheet()
                        ->setCellValue("J{$indexMod}", $valueArr['total'])
                        ->mergeCells("J{$indexMod}:L{$indexMod}");

                    $template
                        ->getActiveSheet()
                        ->setCellValue("M{$indexMod}", substr(($valueArr['total'] / $params['total']) * 100, 0, 5) . '%')
                        ->mergeCells("M{$indexMod}:N{$indexMod}");

                    $template
                        ->getActiveSheet()
                        ->getStyle("J{$indexMod}:N{$indexMod}")
                        ->getAlignment()
                        ->setHorizontal('center')
                        ->setVertical('center');
                }
            }

            $indexMod++;
            $indexMod++;
        }

        $template
            ->getActiveSheet()
            ->setCellValue("A{$indexMod}", 'Dados do Autor')
            ->mergeCells("A{$indexMod}:N{$indexMod}");

        $template
            ->getActiveSheet()
            ->getStyle("A{$indexMod}:N{$indexMod}")
            ->applyFromArray($styleArray);

        $indexMod++;
        $arrAutor = array(
            'arrSexo'       => 'Sexo', 'estadoUsuario' => 'Estado', 'municipioUsuario' => 'Município',
            'regiaoUsuario' => 'Região',
        );
        foreach ($arrAutor as $key => $value) {
            $template
                ->getActiveSheet()
                ->setCellValue("A{$indexMod}", $value)
                ->mergeCells("A{$indexMod}:N{$indexMod}");

            $template
                ->getActiveSheet()
                ->getStyle("A{$indexMod}:N{$indexMod}")
                ->applyFromArray($styleArray);

            foreach ($params[$key] as $valueArr) {
                if ($valueArr['total']) {
                    $indexMod++;
                    $template
                        ->getActiveSheet()
                        ->setCellValue("A{$indexMod}", $valueArr['title'])
                        ->mergeCells("A{$indexMod}:I{$indexMod}");

                    $template
                        ->getActiveSheet()
                        ->setCellValue("J{$indexMod}", $valueArr['total'])
                        ->mergeCells("J{$indexMod}:L{$indexMod}");

                    $template
                        ->getActiveSheet()
                        ->setCellValue("M{$indexMod}", substr(($valueArr['total'] / $params['total']) * 100, 0, 5) . '%')
                        ->mergeCells("M{$indexMod}:N{$indexMod}");

                    $template
                        ->getActiveSheet()
                        ->getStyle("J{$indexMod}:N{$indexMod}")
                        ->getAlignment()
                        ->setHorizontal('center')
                        ->setVertical('center');
                }
            }

            $indexMod++;
            $indexMod++;
        }
    }
}
