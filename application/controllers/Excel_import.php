<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Excel_import extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Excel_import_model');
		//$this->load->database(); 
		$this->load->library('excel');
		set_time_limit(0);
		// header('Access-Control-Allow-Origin: *');
		//    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	}



	function import()
	{
		if (isset($_FILES["file"]["name"])) {
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {
					//     $id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					//$date1 = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					// $date = date("Y-m-d", strtotime($worksheet->getCellByColumnAndRow(1, $row)->getValue()));
					$date	 = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($object->setActiveSheetIndex(0)->getCellByColumnAndRow(1, $row)->getValue()));
					$cnn_no = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$consumer_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$address = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$type = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$tab_size = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$status = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$area_name = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$city = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					//    $op_bal = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					//   $bill_amt = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					//  $rcpt_amt = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					//   $bal_amt = $worksheet->getCellByColumnAndRow(12, $row)->getValue();



					$data[] = array(
						// 'id'  => $id,
						'date'  => $date,
						'cnn_no'  => $cnn_no,
						'consumer_name'  => $consumer_name,
						'consumer_address'  => $address,
						'conn_type'  => $type,
						'tab_size'  => $tab_size,
						'status'  => $status,
						'area_name'  => $area_name,
						'city'  => $city,
						// 'op_bal'  => $op_bal,
						// 'bill_amt'  => $bill_amt,
						//  'rcpt_amt'  => $rcpt_amt,
						//   'bal_amt'  => $bal_amt,

					);
				}
			}
			$res =   $this->Excel_import_model->insert($data);
			// $res=   $this->Excel_import_model->insert($data);
			// print_r($res);

			echo 'Data Imported successfully';
		}
	}




	function import_update()
	{
		if (isset($_FILES["file"]["name"])) {
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);

			$id = "";
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {
					//$id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					//$date1 = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					// $date = date("Y-m-d", strtotime($worksheet->getCellByColumnAndRow(1, $row)->getValue()));

					// $date	 = date('Y-m-d',PHPExcel_Shared_Date::ExcelToPHP($object->setActiveSheetIndex(0)->getCellByColumnAndRow(1,$row)->getValue()));
					// $cnn_no = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					// $consumer_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					// $address = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					// $type = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					// $tab_size = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					// $status = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					// $area_name = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					// $city = $worksheet->getCellByColumnAndRow(7, $row)->getValue();

					$cnn_no = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$op_bal = 0;
					$bill_amt = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$rcpt_amt = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$bal_amt = $worksheet->getCellByColumnAndRow(4, $row)->getValue();


					$id = $cnn_no;
					$data = array(
						// 'id'  => $id,

						'op_bal'  => $op_bal,
						'bill_amt'  => $bill_amt,
						'rcpt_amt'  => $rcpt_amt,
						'bal_amt'  => $bal_amt,

					);
				}
			}
			$this->Excel_import_model->updatedata($data, $id);
			// $res=   $this->Excel_import_model->insert($data);
			// print_r($res);

			echo 'Data Updated successfully';
		}
	}

	function import_birth()
	{
		$data = array();
		$count = 0;
		if (isset($_FILES["file"]["name"])) {
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {


					$dob	 =  "";
					$dob1 = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					if ($dob1 == "" || $dob1 == "data not found" || $dob1 == null) {
						$dob1 = "";
					} else {
						$split = explode(" ", $dob1);
						$dob = date("Y-m-d", strtotime($split[1]));
					}



					//	$dob	 = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($object->setActiveSheetIndex(0)->getCellByColumnAndRow(2, $row)->getValue()));
					$reg_no = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$child_name = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$chold_name_m = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$mother_name = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$mother_name_m = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$father_name = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$father_name_m = $worksheet->getCellByColumnAndRow(8, $row)->getValue();







					if ($reg_no == "" || $reg_no == "data not found" || $reg_no == null) {
					} else {

						$cnt =   $this->Excel_import_model->chk_reg_no($reg_no);


						if ($cnt > 0) {
						} else {
							if ($child_name == "" || $child_name == "data not found" || $child_name == null) {
								$child_name = "";
							}
							if ($chold_name_m == "" || $chold_name_m == "data not found" || $chold_name_m == null) {
								$chold_name_m = "";
							}
							if ($mother_name == "" || $mother_name == "data not found" || $mother_name == null) {
								$mother_name = "";
							}
							if ($mother_name_m == "" || $mother_name_m == "data not found" || $mother_name_m == null) {
								$mother_name_m = "";
							}
							if ($father_name == "" || $father_name == "data not found" || $father_name == null) {
								$father_name = "";
							}
							if ($father_name_m == "" || $father_name_m == "data not found" || $father_name_m == null) {
								$father_name_m = "";
							}
							$user = $this->session->userid;
							$applicant_name = $father_name;
							$count = $count + 1;
							$data[] = array(
								'applicant_name' => $applicant_name,
								'reg_no' => $reg_no,
								'reg_no2' => $reg_no,
								'dob' => $dob,
								'child_name' => $child_name,
								'child_name_m' => $chold_name_m,
								'mother_name' => $mother_name,
								'mother_name_m' => $mother_name_m,
								'father_name' => $father_name,
								'father_name_m' => $father_name_m,
								'user_id' => $user,
							);
						}
					}
				}
			}
			//$res =   $this->Excel_import_model->insert($data);
			if (!empty($data)) {
				$res =   $this->Excel_import_model->insert($data);
			}

			//print_r($data);

			echo $count . ' Records Imported successfully';
		}
	}
}
