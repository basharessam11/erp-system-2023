<?php


ob_start();
class connsql
{

	public $conn;
	public $error = [];
	public $res = '';
	public $res1 = '';
	public $res2 = '';
	public $res3 = '';
	public $res4 = '';
	public $res5 = '';
	public $res_avg = '';
	public $res_sum = '';
	public $res_min = '';
	public $check;
	public $check1;
	//connect database
	function __construct($server, $db_user, $db_password, $db_name)
	{
		$this->conn = new mysqli($server, $db_user, $db_password, $db_name);
		mysqli_set_charset($this->conn, 'utf8');
	}
	//end connect

	//select all
	public function selectall($name)
	{
		$sql = "SELECT * FROM $name ";
		$res = $this->conn->query($sql);
		$this->res = $res;
	}

	//end select all

	//select
	public function  select($name, $where)
	{
		$sql = "SELECT * FROM $name  $where";
		$res = $this->conn->query($sql);
		$this->res = $res;
	}
	public function  selectavg($avg, $name, $where)
	{
		$sql = "SELECT AVG($avg) FROM $name where $where";
		$res = $this->conn->query($sql);
		$this->res_avg = $res;
	}
	//end select
	//select
	public function  select1($name, $where)
	{
		$sql = "SELECT * FROM $name  $where";
		$res1 = $this->conn->query($sql);
		$this->res1 = $res1;
	}
	public function  select2($name, $where)
	{
		$sql = "SELECT * FROM $name  $where";
		$res2 = $this->conn->query($sql);
		$this->res2 = $res2;
	}

	public function  select3($name, $where)
	{
		$sql = "SELECT * FROM $name  $where";
		$res3 = $this->conn->query($sql);
		$this->res3 = $res3;
	}
	public function  select4($name, $where)
	{
		$sql = "SELECT * FROM $name  $where";
		$res4 = $this->conn->query($sql);
		$this->res4 = $res4;
	}
	public function  select5($name, $where)
	{
		$sql = "SELECT * FROM $name  $where";
		$res5 = $this->conn->query($sql);
		$this->res5 = $res5;
	}
	//end select


	public function  selectsum($sum, $name, $where)
	{
		$sql = "SELECT SUM($sum) FROM $name where $where";
		$res = $this->conn->query($sql);
		$this->res_sum = $res;
	}


	public function  selectmin($select, $select2, $name, $where)
	{
		$sql = "SELECT $select FROM $name  where $where MINUS SELECT $select2
FROM $name where $where";
		$res = $this->conn->query($sql);
		$this->res_min = $res;
	}

	//delete
	public function delete($name, $where)
	{
		$sql = "DELETE FROM $name where id=$where";
		$this->conn->query($sql);
	}
	//end delete

	//delete
	public function delete1($name, $where)
	{
		$sql = "DELETE FROM $name $where";
		$this->conn->query($sql);
	}
	//end delete



	//insert
	public function insert_img($name, $array, $img_name, $img_size, $img_tmp)
	{
		// //check name
		// $name0=$array["name"];
		// $this->select($name,'where name="'.$name0.'"');
		// foreach ($this->res as $key => $value) {
		// 	 $name1=$value['name'];
		// 	}
		// 	if (!empty($name1)) {
		// 		if ($name1==$name0) {
		// 		array_push($this->error, 'name=no');
		// 	}
		// 	}

		//end check name

		$new_name = [];
		$key = array_keys($array);
		$keys = implode(',', $key) . ',' . 'photo';
		$value = array_values($array);
		$values = implode("','", $value);

		//check exetention 

		foreach ($img_name as $key1 => $value) {

			$exe = explode('.', $value);
			$end = end($exe);

			$exe1 = ['jpg', 'png', 'jpeg', 'JPG', 'PNG', "JPEG"];
			if (!in_array($end, $exe1)) {
				array_push($this->error, 'img_exe=no');
			}
		}
		//end check exe

		//check size
		foreach ($img_size as $key1 => $value) {

			if ($value > 209715200) {

				array_push($this->error, 'img_size=no');
			}
		}
		//end check size

		//move
		if (empty($this->error)) {
			foreach ($img_name as $key1 => $value) {

				$name5 = rand(1, 10000) . time() . $value;
				move_uploaded_file($img_tmp[$key1], "../../photo/$name5");
				array_push($new_name, $name5);
			}
			$img_sql = implode(",", $new_name);
			$sql = "INSERT INTO $name ($keys) VALUES('$values','$img_sql')";
			$this->conn->query($sql);
		}
		//end move

	}
	//end insert and img

	//insert
	public function insert_file($name, $array, $img_name, $img_tmp, $src)
	{


		$new_name = [];
		$key = array_keys($array);
		$keys = implode(',', $key) . ',' . 'file';
		$value = array_values($array);
		$values = implode("','", $value);

		//check exetention 

		foreach ($img_name as $key1 => $value) {

			$exe = explode('.', $value);
			$end = end($exe);

			$exe1 = ['jpg', 'png', 'jpeg', 'JPG', 'PNG', "JPEG", "pdf", "PDF"];
			if (!in_array($end, $exe1)) {
				array_push($this->error, 'img_exe=no');
			}
		}
		//end check exe




		//move
		if (empty($this->error)) {
			foreach ($img_name as $key1 => $value) {

				$name5 = rand(1, 10000) . time() . $value;

				move_uploaded_file($img_tmp[$key1], "file/$name5");
				array_push($new_name, $name5);
			}
			$img_sql = implode(",", $new_name);
			$sql = "INSERT INTO $name ($keys) VALUES('$values','$img_sql')";
			$this->conn->query($sql);
		}
		//end move

	}
	//end insert and img


	//insert
	public function insert($name, $array)
	{

		$k = array_keys($array);
		$key = implode(',', $k);
		$v = array_values($array);
		$value = implode("','", $v);

		$sql = "INSERT INTO $name ($key) VALUES('$value')";
		$this->conn->query($sql);
	}
	//end insert

	public function check($name, $array)
	{
		//check name
		$val = [];
		foreach ($array as $key => $value) {
			$keys = $key . "= '" . $value . "'";
			array_push($val, $keys);
		}

		$value = implode(" and ", $val);
		$this->select($name, "where $value");
		$this->check = $this->res->num_rows;


		// end check name
	}

	public function check1($name, $array)
	{
		//check name
		$val = [];
		foreach ($array as $key => $value) {
			$keys = $key . "= '" . $value . "'";
			array_push($val, $keys);
		}

		$value = implode("or ", $val);
		$this->select($name, "where $value");
		$this->check1 = $this->res->num_rows;


		// end check name
	}
	//update _img
	public function update_img($name, $id, $array, $img_last, $img_name, $img_size, $img_tmp)
	{

		$name0 = $array["name"];

		$this->select($name, ' where id !=' . $id . ' and name="' . $name0 . '"');
		foreach ($this->res as $key => $value) {
			$name1 = $value['name'];
			if ($name1 == $name0) {
				$this->error = ['name=no'];
			}
		}

		$val = [];

		foreach ($array as $key => $value) {

			$keys = $key . '="' . $value . '"';
			array_push($val, $keys);
		}
		$a = implode(',', $val);
		if (empty($img_name[0])) {
			$img = "'" . $img_last . "'";
			$sql = "UPDATE $name SET $a,photo=$img WHERE id=$id";
			$this->conn->query($sql);
		} else {
			//check name



			//end check name

			$new_name = [];
			$key = array_keys($array);
			$keys = implode(',', $key) . ',' . 'photo';
			$value = array_values($array);
			$values = implode("','", $value);

			//check exetention 

			foreach ($img_name as $key1 => $value) {

				$exe = explode('.', $value);
				$end = end($exe);
				$exe1 = ['jpg', 'png', 'jpeg', 'JPG', 'PNG', "JPEG"];

				if (!in_array($end, $exe1)) {
					$this->error = ['img_exe=no'];
				}
			}
			//end check exe

			//check size
			foreach ($img_size as $key1 => $value) {
				if ($value > 2097152000) {
					$this->error = ['img_size=no'];
				}
			}
			//end check size

			//move
			if (empty($this->error)) {
				if (!empty($img_last)) {
					$img2 = explode(",", $img_last);
					foreach ($img2 as $key2 => $value2) {

						unlink("../../photo/$value2");
					}
				}

				foreach ($img_name as $key1 => $value) {

					$name1 = rand(1, 10000) . time() . $value;
					move_uploaded_file($img_tmp[$key1], "../../photo/$name1");
					array_push($new_name, $name1);
				}
				$img = '"' . implode(",", $new_name) . '"';
				$sql = "UPDATE $name SET $a, photo=$img WHERE id=$id";;
				$this->conn->query($sql);
			}
			//end move

		}
	}
	//end update img

	//update

	public function update($name, $id, $array)
	{



		$val = [];
		foreach ($array as $key => $value) {

			$keys = $key . '="' . $value . '"';
			array_push($val, $keys);
		}
		$a = implode(', ', $val);
		if (empty($error)) {
			$sql = "UPDATE $name SET $a WHERE id=$id";
			$this->conn->query($sql);
		}
	}
	///////

	public function update1($name, $id, $array)
	{



		$val = [];
		foreach ($array as $key => $value) {

			$keys = $key . '="' . $value . '"';
			array_push($val, $keys);
		}
		$a = implode(', ', $val);
		if (empty($error)) {
			$sql = "UPDATE $name SET $a WHERE $id";
			$this->conn->query($sql);
		}
	}
}


$sql = new connsql('localhost', 'root', '', 'erp_new');

ob_end_flush();

// $sql->check('booking',['time'=>'5:35 pm','date'=>'11/20/2021']);



// $sql->selectavg($avg,$name,$where);
// $sql->selectall('products');
// $sql->select('name','where');
// $sql->delete('name','where');
// $sql->update($name,$id,$array)
// $sql->insert_img('brand',['name'=>'bshar' ,'color'=>'123'], array('bashar.jpg','ahmed.jpg','mohamed.jpg') , array('2097152','2000','333') , array('jebf','uhfnf','qsh'));

// $sql->insert('brand',['name'=>'basar','age'=>'20']);

//$sql->update_img('brand',5,['name'=>'bashagr','besho'=>'hhh' ,'color'=>'123'],'uvyuuycuycuy','' , array('2097152','2000','333') , array('jebf','uhfnf','qsh'));

//$sql->update('brand',5,['name'=>'bashagr','besho'=>'hhh' ,'color'=>'123']);
