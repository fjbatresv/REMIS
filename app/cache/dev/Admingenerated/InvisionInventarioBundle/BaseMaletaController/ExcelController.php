<?php

namespace Admingenerated\InvisionInventarioBundle\BaseMaletaController;

use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;

/**
 * @author Bob van de Vijver
 */
class ExcelController extends ListController
{
    /**
     * Generates the Excel object and send a streamed response
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function excelAction()
    {
      // Create the PHPExcel object with some standard values
      try {
        $phpexcel = $this->get('phpexcel');
      } catch (ServiceNotFoundException $e){
        throw new \Exception('You will need to enable the PHPExcel bundle for this function to work.', null, $e);
      }
      $phpExcelObject = $phpexcel->createPHPExcelObject();
      $this->createExcelObject($phpExcelObject);
      $sheet = $phpExcelObject->setActiveSheetIndex(0);

      // Create the first bold row in the Excel spreadsheet
      $this->createExcelHeader($sheet);

      // Print the data
      $this->createExcelData($sheet);

      // Create the Writer, Response and add header
      $writer = $phpexcel->createWriter($phpExcelObject, 'Excel2007');
      $response = $phpexcel->createStreamedResponse($writer);
      $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8');
      $response->headers->set('Content-Disposition', 'attachment;filename=admin_export_maletas_de_los_usuarios.xlsx');

      return $response;
    }

    /**
     * Override this method to add your own creator, title and more to the Excel spreadsheet
     */
    protected function createExcelObject(\PHPExcel $phpExcelObject){
      $phpExcelObject->getProperties()->setCreator("AdminGeneratorBundle")
        ->setTitle('AdminGenerator Excel Export')
        ->setSubject("AdminGenerator Excel Export")
        ->setDescription("AdminGenerator Excel export");
    }

    /**
     * Fill the Excel speadsheet with the headers
     */
    protected function createExcelheader(\PhpExcel_Worksheet $sheet){
                    $sheet->setCellValueByColumnAndRow(0, 1, "Id", true);
        $columnLetter = \PHPExcel_Cell::stringFromColumnIndex(0);
        $sheet->getStyle($columnLetter . '1')->getFont()->setBold(true);
        $sheet->getColumnDimension($columnLetter)->setAutoSize(true);
                      $sheet->setCellValueByColumnAndRow(1, 1, "Cantidad", true);
        $columnLetter = \PHPExcel_Cell::stringFromColumnIndex(1);
        $sheet->getStyle($columnLetter . '1')->getFont()->setBold(true);
        $sheet->getColumnDimension($columnLetter)->setAutoSize(true);
                      $sheet->setCellValueByColumnAndRow(2, 1, "Usuario id", true);
        $columnLetter = \PHPExcel_Cell::stringFromColumnIndex(2);
        $sheet->getStyle($columnLetter . '1')->getFont()->setBold(true);
        $sheet->getColumnDimension($columnLetter)->setAutoSize(true);
                  }

    /**
     * Fills the Excel spreadsheet with data
     */
    protected function createExcelData(\PhpExcel_Worksheet $sheet){
      $row = 2;
      $results = $this->getResults();
      foreach($results as $rowData){
                
          // Retrieve relations
          $getter = 'id';
          $data = $rowData;
          while (($pos = strpos($getter, '.')) > 0){
            $tempGetter = 'get' . ucfirst(substr($getter, 0, $pos));
            $getter = substr($getter, $pos + 1);
            $data = $data->$tempGetter();
          }
          $getter = 'get' . ucfirst($getter);
          $data = $data->$getter();

          // Convert DateTime object to given format
          if ($data instanceof \DateTime){
            $data = $data->format('Y-m-d H:i:s');
          }
          $sheet->setCellValueByColumnAndRow(0, $row, $data);
                  
          // Retrieve relations
          $getter = 'cantidad';
          $data = $rowData;
          while (($pos = strpos($getter, '.')) > 0){
            $tempGetter = 'get' . ucfirst(substr($getter, 0, $pos));
            $getter = substr($getter, $pos + 1);
            $data = $data->$tempGetter();
          }
          $getter = 'get' . ucfirst($getter);
          $data = $data->$getter();

          // Convert DateTime object to given format
          if ($data instanceof \DateTime){
            $data = $data->format('Y-m-d H:i:s');
          }
          $sheet->setCellValueByColumnAndRow(1, $row, $data);
                  
          // Retrieve relations
          $getter = 'usuarioId';
          $data = $rowData;
          while (($pos = strpos($getter, '.')) > 0){
            $tempGetter = 'get' . ucfirst(substr($getter, 0, $pos));
            $getter = substr($getter, $pos + 1);
            $data = $data->$tempGetter();
          }
          $getter = 'get' . ucfirst($getter);
          $data = $data->$getter();

          // Convert DateTime object to given format
          if ($data instanceof \DateTime){
            $data = $data->format('Y-m-d H:i:s');
          }
          $sheet->setCellValueByColumnAndRow(2, $row, $data);
                          $row++;
      }
    }

      protected function getResults(){
    return $this->getQuery()->find();
  }
}