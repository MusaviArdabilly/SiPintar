<?php

//ini_set('max_execution_time', 12000);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// $servername = "sipintar-jatimprov.com";
// $username = "ereporti_sipintar";
// $password = "databasegue157?";
$servername = "localhost";
$username = "ereporti_sipintar";
$password = "databasegue157?";

// Create connection
$conn       = mysqli_connect($servername, $username, $password);
$selected   = mysqli_select_db($conn, "ereporti_new_sipintar");
$connection = ssh2_connect('103.29.187.202', 22);
ssh2_auth_password($connection, 'jatim', 'fTp-4.j4TiM');

$sftp = ssh2_sftp($connection);

$sftp_fd = intval($sftp);

$file_list = opendir("ssh2.sftp://$sftp_fd/home/jatim/PEB");

$file_list2 = opendir("ssh2.sftp://$sftp_fd/home/jatim/PIB");


$files = array();

while (false != ($file = readdir($file_list))){
    // echo "$entry\n";
     if(substr($file, -4)==".csv")
    {
        $files[]=$file;
    }
}

closedir($file_list);

foreach ($files as $file)
{
    echo "Copying file: $file\n";
    if (!$remote = fopen("ssh2.sftp://$sftp_fd/home/jatim/PEB/", 'rb'))
    {
        echo "Failed to open remote file: $file\n";
        continue;
    }
 
    if (!$local = fopen($_SERVER['DOCUMENT_ROOT'] . '/scheduler/DATA/' . $file, 'wb'))
    {
        echo "Failed to create local file: $file \n ";
        continue;
    }

      if(!ssh2_scp_recv($connection, "/home/jatim/PEB/$file", "/var/www/html/scheduler/DATA/$file")){
        echo "Failed to download file: $file \n ";
        continue;
    }

    fclose($local);
    fclose($remote);

}

$files2 = array();
while (false != ($file2 = readdir($file_list2))){
    // echo "$entry\n";
     if(substr($file2, -4)==".csv")
    {
        $files2[]=$file2;
    }
}

closedir($file_list2);
foreach ($files2 as $file)
{
    echo "Copying file: $file\n";
    if (!$remote = fopen("ssh2.sftp://$sftp_fd/home/jatim/PIB/", 'rb'))
    {
        echo "Failed to open remote file: $file\n";
        continue;
    }
 
    if (!$local = fopen($_SERVER['DOCUMENT_ROOT'] . '/scheduler/DATA/' . $file, 'wb'))
    {
        echo "Failed to create local file: $file \n ";
        continue;
    }

      if(!ssh2_scp_recv($connection, "/home/jatim/PIB/$file", "/var/www/html/scheduler/DATA/$file")){
        echo "Failed to download file: $file \n ";
        continue;
    }
 
    fclose($local);
    fclose($remote);

}
$tgl_array = array();
foreach (glob('DATA/*.csv') as $file) {
    $ok = false;
    $name = explode('/', $file);
    $filename = $name[count($name) - 1];

    $log = fopen("LOG/" . $filename . ".log", "w");

    $csvData = file_get_contents($file);
    $filenameex = explode('_', str_replace('.csv', '', $filename));
    $table = "";
    $lines = explode(PHP_EOL, $csvData);
    foreach ($lines as $line) {
        $dt = str_replace("'", "\'", $line);
        $data = explode('||', $dt);
        $j = "";
        $sql = "";
        $q = "";
        $tabless = "";
        $table = "";

        if ($filenameex[0] == "PEB" && $filenameex[2] == "HDR") {
            $tabless = "TR_PEB_HDR A WHERE";
            $table = "TR_PEB_HDR";
            $q = " SELECT COUNT(*) AS COUNTS FROM $tabless A.NETTO='$data[14]' AND A.BRUTO='$data[13]' AND A.FOB='$data[11]' GROUP BY `A`.`NETTO`,`A`.`BRUTO`,`A`.`FOB`  LIMIT 2 ";
            $k = " DELETE FROM  TR_PEB_DTL WHERE AJU_NO = '$data[1]'";
            $sql = "INSERT INTO $table VALUES('$data[0]','$data[1]','$data[2]',STR_TO_DATE('$data[3]','%Y%m%d'),'$data[4]',
                '$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','','$data[13]','$data[14]','$data[11]','')";
        } elseif ($filenameex[0] == "PEB" && $filenameex[2] == "DTL") {
            //$tabless = " (`TR_PIB_HDR` `A` join `TR_PIB_DTL` `B` on(((`A`.`AJU_NO` = `B`.`AJU_NO`) and (`A`.`KPBC` = `B`.`KPBC`)))) where (substr(`B`.`HS_NO`,1,2) <> '27') AND ";
            $table = "TR_PEB_DTL";
            $sql = "INSERT INTO $table VALUES('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]')";
        } elseif ($filenameex[0] == "PIB" && $filenameex[2] == "HDR") {
            $tabless = "TR_PIB_HDR A WHERE";
            $table = "TR_PIB_HDR";
            $q = " SELECT COUNT(*) AS COUNTS FROM $tabless A.NETTO='$data[15]' AND A.BRUTO='$data[14]' AND A.NCIF='$data[11]'  GROUP BY `A`.`NETTO`,`A`.`BRUTO`,`A`.`NCIF`  LIMIT 2 ";
            $k = "DELETE FROM TR_PIB_DTL WHERE AJU_NO = '$data[1]'";
            $sql = "INSERT INTO $table VALUES('$data[0]','$data[1]','$data[2]',STR_TO_DATE('$data[3]','%Y%m%d'),'$data[4]',
        '$data[5]','$data[6]','$data[16]','$data[17]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]','$data[14]','$data[15]','$data[11]','');";
        } elseif ($filenameex[0] == "PIB" && $filenameex[2] == "DTL") {
            //$tabless = " (`TR_PEB_HDR` `A` join `TR_PEB_DTL` `B` on(((`A`.`AJU_NO` = `B`.`AJU_NO`) and (`A`.`KPBC` = `B`.`KPBC`)))) where (substr(`B`.`HS_NO`,1,2) <> '27') AND  ";
            $tabless = "TR_PIB_HDR A WHERE";
            $table = "TR_PIB_DTL";
            $sql = "INSERT INTO $table VALUES('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]')";
        }

        if ($filenameex[1] == 'HDR') {
            $cekalready = mysqli_query($conn, $q);
            $row = mysqli_fetch_assoc($cekalready);
            if ($row["COUNTS"] == "0" or $row["COUNTS"] == null) {
                if ($data[1] != "" && $sql != "") {
                    if (mysqli_query($conn, $sql)) {
                        echo "clear<br>";
                        mysqli_query($conn, $j);
                        $tgl = substr($filenameex[1], 0, 4) . "-" . substr($filenameex[1], 4, 2) . "-" . substr($filenameex[1], 6, 2);
                        $yesterday = date('Y-m-d', strtotime("$tgl - 1 days"));
                        $function4 = mysqli_query($conn, "CALL CONVERTER('$tgl')");
                        $function1 = mysqli_query($conn, "CALL SYNC_TMP('$tgl')");
                        $function2 = mysqli_query($conn, "CALL SYNC_TMP_E('$tgl')");
                        $function3 = mysqli_query($conn, "CALL SYNC_TMP_I('$tgl')");
                    } else {
                        echo "gagal : $sql<br>";
                        fwrite($log, $sql . " \n");
                    }
                }
            } else {
                mysqli_query($conn, $k);
                echo "gagal : $q<br>";
                fwrite($log, $q . " \n");
            }
        } else {
            if ($data[1] != "" && $sql != "") {
                if (mysqli_query($conn, $sql)) {
                    echo "clear<br>";
                } else {
                    echo "gagal : $sql<br>";
                    fwrite($log, $sql . " \n");
                }
            }
        }
    }
    if (copy($file, "DATA/DONE/$filename")) {
        unlink($file);
    }

    $tgl = substr($filenameex[1], 0, 4) . "-" . substr($filenameex[1], 4, 2) . "-" . substr($filenameex[1], 6, 2);
    array_push($tgl_array, $tgl);
//    $yesterday = date('Y-m-d', strtotime("$tgl - 1 days"));
//    print_r($yesterday);
    fclose($log);
}
$unik_tgl = array_unique($tgl_array);

foreach ($unik_tgl as $value) {
    $function4 = mysqli_query($conn, "CALL CONVERTER('$value')");
    $function1 = mysqli_query($conn, "CALL SYNC_TMP('$value')");
    $function2 = mysqli_query($conn, "CALL SYNC_TMP_E('$value')");
    $function3 = mysqli_query($conn, "CALL SYNC_TMP_I('$value')");
}

mysqli_close($conn);
?>
