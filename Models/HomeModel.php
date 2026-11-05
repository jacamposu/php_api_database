<?php 
/**
* ----------------------------------------------------------
* Model HomeModel
* @author Jose Antonio Campos Urquijo
* ----------------------------------------------------------
*/

class HomeModel extends ApiDatabase
{
	public function __construct($config, $headers)
	{
		parent::__construct($config, $headers);
	}

	

	// public function getUseDatId($idUser)
	// {
	// 	$sql = "SELECT UseDatId FROM userdata WHERE UseDatUser = :user";
	// 	$data = [':user' => $idUser];
	// 	return $this->Value($sql, $data);
	// }

	// public function getUseDatCellphone($idUser)
	// {
	// 	$sql = "SELECT UseDatCellphone FROM userdata WHERE UseDatUser = :user";
	// 	$data = [':user' => $idUser];
	// 	return $this->Value($sql, $data);
	// }

	// public function getQuestionId($idUser)
	// {
	// 	$sql = "SELECT count(QuestionId) FROM userquestion WHERE UserId = :user";
	// 	$data = [':user' => $idUser];
	// 	return $this->Value($sql, $data);
	// }

	// public function getUsePhoto($idUser)
	// {
	// 	$sql = "SELECT UsePhoto FROM users WHERE UseId = :user";
	// 	$data = [':user' => $idUser];
	// 	return $this->Value($sql, $data);
	// }
}

?>