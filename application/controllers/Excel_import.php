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
						$dob = "";
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

					date_default_timezone_set('Asia/Kolkata');
					$date = date("Y-m-d H:i:s");






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
								'reg_date' => $dob,
								'dob' => $dob,
								'child_name' => $child_name,
								'child_name_m' => $chold_name_m,
								'mother_name' => $mother_name,
								'mother_name_m' => $mother_name_m,
								'father_name' => $father_name,
								'father_name_m' => $father_name_m,
								'user_id' => $user,
								'add_date' => $date,
								'modify_date' => $date,
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

	function import_death()
	{
		$data = array();
		$count = 0;
		if (isset($_FILES["file"]["name"])) {
			$path = $_FILES["file"]["tmp_name"];

			$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;
			$cacheSettings = array(' memoryCacheSize ' => '8MB');
			PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);

			$objReader = PHPExcel_IOFactory::createReader('Excel2007');
			$object = $objReader->load($path);
			//$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {


					$dod	 =  "";
					$dod1 = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					if ($dod1 == "" || $dod1 == "data not found" || $dod1 == null) {
						$dod = "";
					} else {
						$split = explode(" ", $dod1);
						$dod = date("Y-m-d", strtotime($split[1]));
					}



					//	$dob	 = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($object->setActiveSheetIndex(0)->getCellByColumnAndRow(2, $row)->getValue()));
					$reg_no = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$deceased_name_m = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$deceased_name = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$deceased_mother_name = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$deceased_mother_name_m = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					date_default_timezone_set('Asia/Kolkata');
					$date = date("Y-m-d H:i:s");






					if ($reg_no == "" || $reg_no == "data not found" || $reg_no == null) {
					} else {

						$cnt =   $this->Excel_import_model->chk_reg_no2($reg_no);


						if ($cnt > 0) {
						} else {
							if ($deceased_name == "" || $deceased_name == "data not found" || $deceased_name == null) {
								$deceased_name = "";
							}
							if ($deceased_name_m == "" || $deceased_name_m == "data not found" || $deceased_name_m == null) {
								$deceased_name_m = "";
							}
							if ($deceased_mother_name == "" || $deceased_mother_name == "data not found" || $deceased_mother_name == null) {
								$deceased_mother_name = "";
							}
							if ($deceased_mother_name_m == "" || $deceased_mother_name_m == "data not found" || $deceased_mother_name_m == null) {
								$deceased_mother_name_m = "";
							}

							$user = $this->session->userid;
							$count = $count + 1;

							$data[] = array(
								'reg_no' => $reg_no,
								'reg_date' => $dod,
								'dod' => $dod,
								'deceased_name_m' => $deceased_name_m,
								'deceased_name' => $deceased_name,
								'deceased_mother_name' => $deceased_mother_name,
								'deceased_mother_name_m' => $deceased_mother_name_m,
								'user_id' => $user,
								'add_date' => $date,
								'modify_date' => $date,
							);
						}
					}
				}
			}
			//$res =   $this->Excel_import_model->insert($data);
			if (!empty($data)) {
				$res =   $this->Excel_import_model->insert_death($data);
			}

			//print_r($data);

			echo $count . ' Records Imported successfully';
		}
	}
}
