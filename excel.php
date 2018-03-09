<?php
include_once("confg/class.php");

if (isset($_POST['expExc'])) {
    TextExcel();
}

function TextExcel(){

    $output = "";

    $db = new MSSQL();
    
    $result  = $db->systemUtility("exec sp_getAmmast");
    
    $output .= "<table>
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
    ";

    while($row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_NUMERIC)) {
        $output .= "
            <tr>
                <td>".$row[0]."</td>
                <td>".$row[1]."</td>
                <td>".$row[2]."</td>
            </tr>
        ";
    }

    $output .= "</table>";

    header("Content-Type: application/xlsx");    
    header("Content-Disposition: attachment; filename=download.xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");
    echo $output;

}

?>