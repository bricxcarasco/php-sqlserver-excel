<?php
include 'init.php';

class MSSQL {
	
	public function getData($select) {
		global $conn;
		$query = sqlsrv_query($conn, $select);

	$array=array();
    while( $row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_NUMERIC) ) {
          $row = array_map('utf8_encode', $row);
          array_push($array,$row);
      }
	sqlsrv_close($conn);
	return $array;
	}

	public function systemUtility($select) {
		global $conn;
		$query = sqlsrv_query($conn, $select);
		return $query;
	}

	public function executeQuery($query, $params) {
		global $conn;
		if ($conn === false) {
			die(print_r(sqlsrv_errors(), true));
			return false;
		}

		$stmt = sqlsrv_query($conn, $query, $params);
		if ($stmt === false) {
			die(print_r(sqlsrv_errors(), true));
			return false;
		} else {
			return true;
		}
		sqlsrv_close($conn);
	}
}

?>
