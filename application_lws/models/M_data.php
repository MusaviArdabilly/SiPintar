<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    function login($email, $password) {
        $this->db->where('user_email', $email);
        $this->db->where('user_pass', md5($password));
        $result = $this->db->get('user');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function getNamaEO() {
        $result = $this->db->get('mst_event_organiser');
        return $result->result();
    }
    public function getNamaPL() {
        $result = $this->db->get('mst_penyelenggara');
        return $result->result();
    }
     public function delete_renc_kerja($id){
        $this->db->where('id', $id);
        $this->db->delete('mst_rencana_kerja');
    }
     public function delete_umkm($id){
        $this->db->where('id', $id);
        $this->db->delete('mst_umkm');
    }
     public function delete_user($id){
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
    public function del_analisa($id){
        $this->db->where('id', $id);
        $this->db->delete('analisa');
    }
    public function delete_eo($id){
        $this->db->where('id', $id);
        $this->db->delete('mst_event_organiser');
    }
    public function delete_pl($id){
        $this->db->where('id', $id);
        $this->db->delete('mst_penyelenggara');
    }
     public function delete_agenda_ln($id){
        $this->db->where('id', $id);
        $this->db->where('dalam-luar-negri', 'LUAR NEGERI');
        $this->db->delete('agenda_ln_dn');
    }
     public function delete_agenda_dn($id){
        $this->db->where('id', $id);
        $this->db->where('dalam-luar-negri', 'DALAM NEGERI');
        $this->db->delete('agenda_ln_dn');
    }
    public function log_login($nama, $role,$email) {
        $this->db->insert('user_log', array('login' => date('Y-m-d H:i:s'), 
            'nama'      => $nama, 
            'user_role' => $role,
            'email'     => $email
                ));
        return $this->db->insert_id();
    }
     public function log_logout($id) {
        $this->db->where('id', $id);
        $this->db->update('user_log', array('logout' => date('Y-m-d H:i:s')));
    }
    
     public function get_data_ajax($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('analisa');
        return $result->row();
    }
    
     public function editAnalisa($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('analisa', $data);
    }
    
    //EKSPOR//
    public function getSektor($dbefore1,$dbefore2,$datenow,$datebefore,$md){
      $sql =  " 
          
                SELECT 
                C.sektor as sektor,
                A.nilainon as nilai1,
                B.nilainon as nilai2,
                C.nilainon as nilai3,
                D.nilainon as nilai4
                FROM(
                SELECT sum(nilai) as nilainon, sektor FROM bps_exim_nonmigas_migas 
                where kategori='NONMIGAS' and ekspor_impor='EKSPOR' and year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%' GROUP BY sektor
                ) A
                LEFT JOIN(
                SELECT sum(nilai) as nilainon, sektor FROM bps_exim_nonmigas_migas 
                where kategori='NONMIGAS' and ekspor_impor='EKSPOR' and year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%' GROUP BY sektor
                ) B on A.sektor = B.sektor
                LEFT JOIN(
                SELECT sum(nilai) as nilainon, sektor FROM bps_exim_nonmigas_migas 
                where kategori='NONMIGAS' and ekspor_impor='EKSPOR' and bulan_tahun between '$datebefore-01-01' and '$datebefore-$md' GROUP BY sektor
                ) C on B.sektor = C.sektor
                LEFT JOIN(
                SELECT sum(nilai) as nilainon, sektor FROM bps_exim_nonmigas_migas 
                where kategori='NONMIGAS' and ekspor_impor='EKSPOR' and  bulan_tahun between '$datenow-01-01' and '$datenow-$md' GROUP BY sektor
                ) D on C.sektor = D.sektor";
//           print($sql);
//           die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    
     public function getForecast(){
      $sql =  " 
            SELECT sum(nilai) as nilai,substr(tahun,1,4) as tahun, bulan FROM data_pusdatin 
            WHERE substr(tahun,1,4)='2019' 
            and kd_ekspor_impor='EKSPOR'
            GROUP BY bulan
                 ORDER BY substr(tahun,1,7)";
//           print($sql);
//           die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function getForecastI(){
      $sql =  " 
            SELECT sum(nilai) as nilai,substr(tahun,1,4) as tahun, bulan FROM data_pusdatin 
            WHERE substr(tahun,1,4)='2019' 
             and kd_ekspor_impor='IMPOR'
            GROUP BY bulan
                 ORDER BY substr(tahun,1,7)";
           
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function getForecastTH($firstmonth,$datenow){
      $sql =  " 
            SELECT sum(nilai) as nilai,substr(tahun,1,4) as tahun, bulan FROM data_pusdatin 
            WHERE substr(tahun,1,7) BETWEEN '$firstmonth' AND '$datenow'
            and kd_ekspor_impor='EKSPOR'
            GROUP BY bulan
                 ORDER BY substr(tahun,1,7)";
//           print($sql);
//           die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function getForecastTHsum($firstmonth,$datenow){
      $sql =  " 
            SELECT sum(nilai) as nilai,substr(tahun,1,4) as tahun, bulan FROM data_pusdatin 
            WHERE substr(tahun,1,7) BETWEEN '$firstmonth' AND '$datenow'
            and kd_ekspor_impor='EKSPOR'";
//           print($sql);
//           die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function getForecastITH($firstmonth,$datenow){
      $sql =  " 
            SELECT sum(nilai) as nilai,substr(tahun,1,4) as tahun, bulan FROM data_pusdatin 
            WHERE substr(tahun,1,7) BETWEEN '$firstmonth' AND '$datenow'
            and kd_ekspor_impor='IMPOR'
            GROUP BY bulan
                 ORDER BY substr(tahun,1,7)";
//           print($sql);
//           die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function getForecastITHsum($firstmonth,$datenow){
      $sql =  " 
            SELECT sum(nilai) as nilai,substr(tahun,1,4) as tahun, bulan FROM data_pusdatin 
            WHERE substr(tahun,1,7) BETWEEN '$firstmonth' AND '$datenow'
            and kd_ekspor_impor='IMPOR'";
//           print($sql);
//           die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    public function getmonthBps(){
        $sql = "select year(bulan_tahun) as tahun ,DATE_FORMAT(bulan_tahun,'%m') as bulan ,DAY(bulan_tahun)as hari from bps_exim_nonmigas_migas where ekspor_impor='EKSPOR' order by bulan_tahun desc limit 1";
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function getmonthJudulBps(){
        $sql = "select bulan_tahun as tahun from bps_exim_nonmigas_migas where ekspor_impor='EKSPOR' order by bulan_tahun desc limit 1";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function getmonthJudulBpsI(){
        $sql = "select bulan_tahun as tahun from bps_exim_nonmigas_migas where ekspor_impor='IMPOR' order by bulan_tahun desc limit 1";
        $result = $this->db->query($sql);
        return $result->row();
    }
    
    public function getmonthBpsI(){
        $sql = "select year(bulan_tahun) as tahun ,DATE_FORMAT(bulan_tahun,'%m') as bulan ,DAY(bulan_tahun)as hari from bps_exim_nonmigas_migas where ekspor_impor='IMPOR' order by bulan_tahun desc limit 1";
        $result = $this->db->query($sql);
        return $result->result();
    }


    
    public function getKinerja($dbefore1,$dbefore2,$datenow,$datebefore,$md){
       
        $sql = "
                SELECT 
                C.kategori,
                A.migas as nilai1,
                B.migas as nilai2,
                C.migas as nilai3,
                D.migas as nilai4
                FROM 
                (SELECT sum(nilai) as migas  ,kategori 
                    FROM bps_exim_nonmigas_migas  
                        WHERE year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%' AND kategori='MIGAS' and ekspor_impor='EKSPOR') A

                INNER JOIN 
                (SELECT sum(nilai) as migas  ,kategori 
                    FROM bps_exim_nonmigas_migas  
                        WHERE year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%' AND kategori='MIGAS' and ekspor_impor='EKSPOR') B 

                INNER JOIN 
                (SELECT sum(nilai) as migas ,kategori 
                    FROM bps_exim_nonmigas_migas  
                        WHERE bulan_tahun between '$datebefore-01-01' and '$datebefore-$md' AND kategori='MIGAS' and ekspor_impor='EKSPOR') C 

                INNER JOIN 
                (SELECT sum(nilai) as migas  ,kategori 
                    FROM bps_exim_nonmigas_migas  
                        WHERE bulan_tahun between '$datenow-01-01' and '$datenow-$md' AND kategori='MIGAS' and ekspor_impor='EKSPOR') D 

                UNION ALL

                SELECT 
                C.kategori,
                A.nonmigas as nilai1,
                B.nonmigas as nilai2,
                C.nonmigas as nilai3,
                D.nonmigas as nilai4
                FROM 
                (SELECT sum(nilai) as nonmigas  ,kategori
                    FROM bps_exim_nonmigas_migas  
                        WHERE year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%' AND kategori='NONMIGAS' and ekspor_impor='EKSPOR') A

                INNER JOIN 
                (SELECT sum(nilai) as nonmigas  ,kategori
                    FROM bps_exim_nonmigas_migas  
                        WHERE year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%' AND kategori='NONMIGAS' and ekspor_impor='EKSPOR') B 

                INNER JOIN 
                (SELECT sum(nilai) as nonmigas  ,kategori
                    FROM bps_exim_nonmigas_migas  
                        WHERE bulan_tahun between '$datebefore-01-01' and '$datebefore-$md' AND kategori='NONMIGAS' and ekspor_impor='EKSPOR') C 

                INNER JOIN 
                (SELECT sum(nilai) as nonmigas  ,kategori
                    FROM bps_exim_nonmigas_migas  
                        WHERE bulan_tahun between '$datenow-01-01' and '$datenow-$md' AND kategori='NONMIGAS' and ekspor_impor='EKSPOR') D 
                ";
//        print($sql);
//        die();
        $result = $this->db->query($sql);
        return $result->result();
        
    }
    // END EKSPOR//
    
    //IMPOR//
    public function getSektorI($dbefore1,$dbefore2,$datenow,$datebefore,$md){
      $sql =  " 
                SELECT 
                C.sektor as sektor,
                A.nilainon as nilai1,
                B.nilainon as nilai2,
                C.nilainon as nilai3,
                D.nilainon as nilai4
                FROM(
                SELECT sum(nilai) as nilainon, sektor FROM bps_exim_nonmigas_migas 
                where kategori='NONMIGAS' and ekspor_impor='IMPOR' and  year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%' GROUP BY sektor
                ) A
                LEFT JOIN(
                SELECT sum(nilai) as nilainon, sektor FROM bps_exim_nonmigas_migas 
                where kategori='NONMIGAS' and ekspor_impor='IMPOR' and  year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%' GROUP BY sektor
                ) B on A.sektor = B.sektor
                LEFT JOIN(
                SELECT sum(nilai) as nilainon, sektor FROM bps_exim_nonmigas_migas 
                where kategori='NONMIGAS' and ekspor_impor='IMPOR' and bulan_tahun between '$datebefore-01-01' and '$datebefore-$md' GROUP BY sektor
                ) C on B.sektor = C.sektor
                LEFT JOIN(
                SELECT sum(nilai) as nilainon, sektor FROM bps_exim_nonmigas_migas 
                where kategori='NONMIGAS' and ekspor_impor='IMPOR' and  bulan_tahun between '$datenow-01-01' and '$datenow-$md' GROUP BY sektor
                ) D on C.sektor = D.sektor";
//           print($sql);
//           die();
        $result = $this->db->query($sql);
        return $result->result();
    }
  public function getKinerjaI($dbefore1,$dbefore2,$datenow,$datebefore,$md){
       
        $sql = "
                SELECT 
                C.kategori,
                A.migas as nilai1,
                B.migas as nilai2,
                C.migas as nilai3,
                D.migas as nilai4
                FROM 
                (SELECT sum(nilai) as migas  ,kategori 
                    FROM bps_exim_nonmigas_migas  
                        WHERE year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%' AND kategori='MIGAS' and ekspor_impor='IMPOR') A

                INNER JOIN 
                (SELECT sum(nilai) as migas  ,kategori 
                    FROM bps_exim_nonmigas_migas  
                        WHERE year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%' AND kategori='MIGAS' and ekspor_impor='IMPOR') B 

                INNER JOIN 
                (SELECT sum(nilai) as migas ,kategori 
                    FROM bps_exim_nonmigas_migas  
                        WHERE bulan_tahun between '$datebefore-01-01' and '$datebefore-$md' AND kategori='MIGAS' and ekspor_impor='IMPOR') C 

                INNER JOIN 
                (SELECT sum(nilai) as migas  ,kategori 
                    FROM bps_exim_nonmigas_migas  
                        WHERE bulan_tahun between '$datenow-01-01' and '$datenow-$md' AND kategori='MIGAS' and ekspor_impor='IMPOR') D 

                UNION ALL

                SELECT 
                C.kategori,
                A.nonmigas as nilai1,
                B.nonmigas as nilai2,
                C.nonmigas as nilai3,
                D.nonmigas as nilai4
                FROM 
                (SELECT sum(nilai) as nonmigas  ,kategori
                    FROM bps_exim_nonmigas_migas  
                        WHERE year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%' AND kategori='NONMIGAS' and ekspor_impor='IMPOR') A

                INNER JOIN 
                (SELECT sum(nilai) as nonmigas  ,kategori
                    FROM bps_exim_nonmigas_migas  
                        WHERE year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%' AND kategori='NONMIGAS' and ekspor_impor='IMPOR') B 

                INNER JOIN 
                (SELECT sum(nilai) as nonmigas  ,kategori
                    FROM bps_exim_nonmigas_migas  
                        WHERE bulan_tahun between '$datebefore-01-01' and '$datebefore-$md' AND kategori='NONMIGAS' and ekspor_impor='IMPOR') C 

                INNER JOIN 
                (SELECT sum(nilai) as nonmigas  ,kategori
                    FROM bps_exim_nonmigas_migas  
                        WHERE bulan_tahun between '$datenow-01-01' and '$datenow-$md' AND kategori='NONMIGAS' and ekspor_impor='IMPOR') D 
                ";
//        print($sql);
//        die();
        $result = $this->db->query($sql);
        return $result->result();
        
    }
    
    
    
    //=========================================DATA PUSDATIN=========================================//
    
    public function getNeraca(){
        $sql = " SELECT A.nilaiI,A.tahun,B.nilaiE FROM(
                    SELECT sum(nilai) as nilaiI, tahun from data_pusdatin where kd_ekspor_impor='IMPOR' and substr(kode_hs,1,2) != '27'
                    ) A 
                    LEFT JOIN (SELECT sum(nilai) as nilaiE, tahun from data_pusdatin where kd_ekspor_impor='EKSPOR' and substr(kode_hs,1,2) != '27'
                    ) B on A.tahun = B.tahun
                    ";
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function getAnalisa(){
        $this->db->where('data','ANALISA PUSDATIN');
        $result = $this->db->get('analisa');
        return $result->result();
    }
    
    public function getNeracaNegara($negara){
        $sql = " SELECT A.nilaiI,substr(A.tahun,1 ,4) as tahun,B.nilaiE,
                 sum(B.nilaiE)- sum(A.nilaiI) as sur 
                 FROM(
                        SELECT sum(nilai)as nilaiI, substr(tahun,1 ,4) as tahun from data_pusdatin where kd_ekspor_impor='IMPOR' and negara='$negara' and substr(kode_hs,1,2) != '27'  group by substr(tahun,1 ,4) ORDER BY tahun desc
                    ) A 
                    LEFT JOIN (
                        SELECT sum(nilai) as nilaiE, substr(tahun,1 ,4) as tahun from data_pusdatin where kd_ekspor_impor='EKSPOR' and negara='$negara' and substr(kode_hs,1,2) != '27' group by substr(tahun,1 ,4) ORDER BY tahun desc
                    ) B on A.tahun = B.tahun 
                    GROUP BY substr(A.tahun,1 ,4)
                    ";
//        print($sql);
//        die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    public function getHubKomoEkspor($negara){
        $sql = "SELECT b.KD_HS2DIGIT as hs,b.URAIAN as uraian,format(sum(a.nilai),2,'de_DE') as nilai,a.berat from data_pusdatin  a 
                left join mst_komoditas	b on substr(a.kode_hs,1,2) = b.KD_HS2DIGIT
                where negara='$negara'
                and substr(a.kode_hs,1,2) != '27'
                and kd_ekspor_impor='EKSPOR'
                 group by substr(kode_hs,1,2) 
                order by sum(a.nilai) desc
                limit 10";
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    public function getTahunPusdatin(){
        $sql = "SELECT SUBSTR(tahun,1,4) as tahun FROM data_pusdatin order by SUBSTR(tahun,1,4) desc limit 1 ";
        $result = $this->db->query($sql);
      return $result->result();
    }
    
    
     public function getNerEkspor($negara,$datenow){
        $sql = "SELECT 
                substr(A.tahun,1,4) as tahun, 
                format(sum(A.nilai),2,'de_DE') as nilai, 
                format(B.nilaiE,2,'de_DE') as nilaiE, 
                format(B.nilaiE /A.nilai*100,2,'de_DE') as share
                FROM( 
                SELECT SUM(nilai) as nilai, tahun FROM data_pusdatin 
                where kd_ekspor_impor='EKSPOR' and substr(kode_hs,1,2) != '27' group by substr(tahun,1,4) ) A 
                INNER JOIN( 
                SELECT sum(nilai) as nilaiE, tahun FROM data_pusdatin 
                where kd_ekspor_impor='EKSPOR' and substr(kode_hs,1,2) != '27' AND  negara='$negara'
                group by substr(tahun,1,4) )B 
                ON substr(A.tahun,1,4) = substr(B.tahun,1,4)
                GROUP BY A.tahun";
            

//SELECT  substr(A.tahun,1,7) as tahun, format(A.nilai,2) as nilai, B.nilaiE as nilaiE, format(B.nilaiE /A.nilai*100,2) as share
//                    FROM(
//                    SELECT SUM(nilai) as nilai, tahun FROM data_pusdatin where kd_ekspor_impor='EKSPOR' AND substr(tahun,1,4) = '$datenow' group by substr(tahun,1,7)
//                    ) A
//                    INNER JOIN(
//                    SELECT sum(nilai) as nilaiE, tahun  FROM data_pusdatin where kd_ekspor_impor='EKSPOR' AND substr(tahun,1,4) = '$datenow' and negara='$negara' group by substr(tahun,1,7)
//                    )B ON substr(A.tahun,1,7) = substr(B.tahun,1,7)";
//        echo $sql;
//        die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    public function getNerImpor($negara,$datenow){
        $sql = "SELECT  substr(A.tahun,1,4) as tahun, 
            format(sum(A.nilai),2,'de_DE') as nilai, 
            format(B.nilaiI,2,'de_DE') as nilaiI,
            format(B.nilaiI /A.nilai*100,2,'de_DE') as share
                    FROM(
                    SELECT SUM(nilai) as nilai, tahun FROM data_pusdatin where kd_ekspor_impor='IMPOR' and substr(kode_hs,1,2) != '27' group by substr(tahun,1,4) 
                    ) A
                    INNER JOIN(
                    SELECT sum(nilai) as nilaiI, tahun  FROM data_pusdatin where kd_ekspor_impor='IMPOR' and substr(kode_hs,1,2) != '27' AND negara='$negara' group by substr(tahun,1,4) 
                    )B ON substr(A.tahun,1,4) = substr(B.tahun,1,4) GROUP BY A.tahun";
//        echo $sql;die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function getHubKomoImpor($negara){
        $sql = "SELECT b.KD_HS2DIGIT as hs,b.URAIAN as uraian,format(sum(a.nilai),2,'de_DE') as nilai,a.berat from data_pusdatin a 
                left join mst_komoditas	b on substr(a.kode_hs,1,2) = b.KD_HS2DIGIT
                where negara='$negara'
                    and substr(a.kode_hs,1,2) != '27'
                and  kd_ekspor_impor='IMPOR'
                 group by substr(kode_hs,1,2) 
                order by sum(a.nilai) desc
                limit 10";
//        print($sql);
//        die();
        $result = $this->db->query($sql);
        return $result->result();
    }  
    //=========================================END DATA PUSDATIN=========================================//
    
    
    //========================================= DATA PEPI=========================================//
    
    public function getNeracaPepi(){
        $sql = "SELECT format(A.NILAI_USD,2) as nilaiE, A.tahun, format(B.NILAI_USD,2) as nilaiI, A.NILAI_USD - B.NILAI_USD as sur
                    FROM
                    (SELECT *FROM V_NILAI_PEPI ORDER BY TAHUN DESC) A
                    LEFT JOIN 
                    (SELECT *FROM V_NILAI_PEPI_IMPOR ORDER BY TAHUN DESC ) B ON A.tahun = B.tahun
                    ";
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    
    public function getAnalisaPepi(){
        $this->db->where('data','ANALISA PROVJATIM');
        $result = $this->db->get('analisa');
        return $result->result();
    }
    
     public function getNeracaNegaraPepi($negara){
        $sql = " SELECT format(B.nilaiI,2,'de_DE') as nilaiI,A.tahun,format(A.nilaiE,2,'de_DE') as nilaiE,sum(A.nilaiE)- sum(B.nilaiI) as sur FROM(
                         SELECT SUM(a.fob*a.converter) as nilaiE, substr(a.peb_tgl,1 ,4) as tahun
                        FROM tr_peb_hdr a 
                         inner join tr_peb_dtl c on a.AJU_NO = c.AJU_NO 
                         inner join mst_negara b on a.neg_tujuan = b.kode_negara
                        where
                        b.nama_negara='$negara'
			and substr(c.HS_NO,1,2) != '27'
                        group by substr(a.peb_tgl,1 ,4)
                        order by substr(a.peb_tgl,1 ,4) desc
                    ) A 
                LEFT JOIN (
                    SELECT SUM(a.ncif*a.converter) as nilaiI, substr(a.pib_tgl,1 ,4) as tahun
                    FROM tr_pib_hdr a 
                     inner join tr_pib_dtl c on a.AJU_NO = c.AJU_NO 
                     inner join mst_negara b on a.negara_asal = b.kode_negara
                    where
                    b.nama_negara='$negara'
			and substr(c.HS_NO,1,2) != '27'
                    group by substr(a.pib_tgl,1 ,4)
                    order by substr(a.pib_tgl,1 ,4) desc 
                    ) B on A.tahun = B.tahun 
                    GROUP BY A.tahun
                    ";
//        print($sql);
//        die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    public function getNerEksporPepi($negara){
        $sql = "
                SELECT  A.tahun, 
                format(A.nilai,2,'de_DE') as nilai, 
                format(B.nilaiE,2,'de_DE') as nilaiE, 
                format(B.nilaiE /A.nilai*100,2,'de_DE') as share
                FROM(
                SELECT SUM(a.fob*a.converter) as nilai, substr(a.peb_tgl,1 ,4) as tahun
                FROM tr_peb_hdr a 
                inner join tr_peb_dtl c on a.AJU_NO = c.AJU_NO 
                inner join mst_negara b on a.neg_tujuan = b.kode_negara
                 where
                    substr(c.HS_NO,1,2) != '27'
                group by substr(a.peb_tgl,1 ,4) )A 
                INNER JOIN (
                SELECT SUM(a.fob*a.converter) as nilaiE, substr(a.peb_tgl,1 ,4)as tahun
                FROM tr_peb_hdr a 
                inner join tr_peb_dtl c on a.AJU_NO = c.AJU_NO 
                inner join mst_negara b on a.neg_tujuan = b.kode_negara
                where
                b.nama_negara='$negara'
                    and substr(c.HS_NO,1,2) != '27'
                group by substr(a.peb_tgl,1 ,4) ) B ON A.tahun = B.tahun
                group by A.tahun";
//        print($sql);
//        die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    public function getNerImporPepi($negara){
        $sql = " SELECT  A.tahun, 
            format(A.nilai,2,'de_DE') as nilai, 
            format(B.nilaiI,2,'de_DE') as nilaiI, 
            format(B.nilaiI /A.nilai*100,2,'de_DE') as share
                FROM(
                SELECT SUM(a.ncif*a.converter) as nilai, substr(a.pib_tgl,1 ,4) as tahun
                FROM tr_pib_hdr a 
                inner join tr_pib_dtl c on a.AJU_NO = c.AJU_NO 
                inner join mst_negara b on a.negara_asal = b.kode_negara
                where
                    substr(c.HS_NO,1,2) != '27'
                group by substr(a.pib_tgl,1 ,4) )A 
                INNER JOIN (
                SELECT SUM(a.ncif*a.converter) as nilaiI, substr(a.pib_tgl,1 ,4)as tahun
                FROM tr_pib_hdr a 
                inner join tr_pib_dtl c on a.AJU_NO = c.AJU_NO 
                inner join mst_negara b on a.negara_asal = b.kode_negara
                where
                b.nama_negara='$negara'
                    and substr(c.HS_NO,1,2) != '27'
                group by substr(a.pib_tgl,1 ,4) ) B ON A.tahun = B.tahun
                group by A.tahun";
//        print($sql);
//        die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    public function getHubKomoEksporPepi($negara){
        $sql = "SELECT  
                V.KD_HS2DIGIT AS hs, 
                V.KOMODITAS AS uraian, 
                format(SUM(V.JML_USD),2,'de_DE') AS nilai
                FROM  tmp_kmdekspor_by_negara V
                INNER JOIN mst_negara X on V.NEGARA = X.kode_negara
                WHERE X.nama_negara='$negara'
                AND V.KD_HS2DIGIT!='27'
                AND SUBSTR(V.TGL,1,4) = '2019'
                GROUP BY V.KD_HS2DIGIT
                 ORDER BY SUM(V.JML_USD) DESC
                LIMIT 10";
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    public function getHubKomoImporPepi($negara){
        $sql = "
                SELECT  V.KD_HS2DIGIT AS hs, V.KOMODITAS AS uraian, format(SUM(V.JML_USD),2,'de_DE') AS nilai
                FROM  tmp_kmdimpor_by_negara V
                INNER JOIN mst_negara X on V.NEGARA = X.kode_negara
                WHERE X.nama_negara='$negara'
                AND V.KD_HS2DIGIT!='27'
                AND SUBSTR(V.TGL,1,4) = '2019'
                 GROUP BY V.KD_HS2DIGIT
                 ORDER BY SUM(V.JML_USD) DESC
                LIMIT 10";
        $result = $this->db->query($sql);
        return $result->result();
    }  
    
    //=========================================END DATA PEPI=========================================//
    //
    //   
    //=========================================DATA BPS=========================================//
    public function getNeracaBps(){
        $sql = " 
                SELECT A.nilaiE, A.tahun, B.nilaiI
                FROM(
                SELECT sum(nilai) as nilaiE,substr(bulan_tahun,1,4) as tahun
                FROM bps_negara_tujuan_asal
                where substr(bulan_tahun,1,4) = '2019' and exim='EKSPOR') A
                LEFT JOIN(
                SELECT sum(nilai) as nilaiI,substr(bulan_tahun,1,4) as tahun
                FROM bps_negara_tujuan_asal
                where substr(bulan_tahun,1,4) = '2019' and exim='IMPOR' ) B on A.tahun = B.tahun
                    ";
//        print($sql);
//        die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    public function getAnalisaBps(){
        $this->db->where('data','ANALISA BPS');
        $result = $this->db->get('analisa');
        return $result->result();
    }
    
    
    
    
    
    
    public function getNeracaNegaraBps($negara){
        $sql = " SELECT A.nilaiE, A.tahun, B.nilaiI,sum(A.nilaiE)- sum(B.nilaiI) as sur 
                    FROM(
                    SELECT sum(nilai) as nilaiE,substr(bulan_tahun,1,4) as tahun
                    FROM bps_negara_tujuan_asal
                    where exim='EKSPOR' AND negara='$negara'
                    GROUP BY substr(bulan_tahun,1,4)
                    ) A
                    LEFT JOIN(
                    SELECT sum(nilai) as nilaiI,substr(bulan_tahun,1,4) as tahun
                    FROM bps_negara_tujuan_asal
                    where exim='IMPOR' AND negara='$negara' 
                    GROUP BY substr(bulan_tahun,1,4)
                    ) B on A.tahun = B.tahun
                    GROUP BY A.tahun
                    
                    ";
//        print($sql);
//        die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function getNerEksporBps($negara){
        $sql = "SELECT  A.tahun, 
            format(A.nilai,2,'de_DE') as nilai, 
            format(B.nilaiE,2,'de_DE') as nilaiE, 
            format(B.nilaiE /A.nilai*100,2,'de_DE') as share
                    FROM(
                    SELECT SUM(nilai) as nilai, substr(bulan_tahun,1,4) as tahun FROM bps_negara_tujuan_asal where exim='EKSPOR' group by substr(bulan_tahun,1,4)
                    ) A
                    INNER JOIN(
                    SELECT sum(nilai) as nilaiE, substr(bulan_tahun,1,4) as tahun  FROM bps_negara_tujuan_asal where exim='EKSPOR' and negara='$negara' group by substr(bulan_tahun,1,4)
                    )B ON A.tahun = B.tahun";
//        print $sql;
//        die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    public function getNerImporBps($negara){
        $sql = "SELECT  A.tahun, 
            format(A.nilai,2,'de_DE') as nilai, 
            format(B.nilaiI,2,'de_DE') as nilaiI,
            format(B.nilaiI /A.nilai*100,2,'de_DE') as share
                    FROM(
                    SELECT SUM(nilai) as nilai, substr(bulan_tahun,1,4) as tahun FROM bps_negara_tujuan_asal where exim='IMPOR' group by substr(bulan_tahun,1,4) 
                    ) A
                    INNER JOIN(
                    SELECT sum(nilai) as nilaiI,substr(bulan_tahun,1,4) as  tahun  FROM bps_negara_tujuan_asal where exim='IMPOR' and negara='$negara' group by substr(bulan_tahun,1,4)
                    )B ON A.tahun = B.tahun";
//        print ($sql);die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    
    
    //=========================================END DATA BPS=========================================//
    
    
    //END IMPOR//
     public function getNegaraE($dbefore1,$dbefore2,$datenow,$datebefore,$md){
        $sql = "
                SELECT A.negara, A.nilai as nilai1,B.nilai as nilai2 ,C.nilai as nilai3, D.nilai as nilai4
                FROM(
                SELECT sum(nilai) as nilai ,negara
                FROM bps_negara_tujuan_asal
                WHERE EXIM='EKSPOR'
                AND year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%'
                    GROUP BY negara
                ) A
                INNER JOIN
                (
                SELECT sum(nilai) as nilai ,negara
                FROM bps_negara_tujuan_asal
                WHERE EXIM='EKSPOR'
                AND year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%'
                    GROUP BY negara
                ) B ON A.negara = B.negara
                INNER JOIN
                (
                SELECT sum(nilai) as nilai ,negara
                FROM bps_negara_tujuan_asal
                WHERE EXIM='EKSPOR'
                AND bulan_tahun between '$datebefore-01-01' and '$datebefore-$md'
                    GROUP BY negara
                ) C ON B.negara = C.negara
                INNER JOIN
                (
                SELECT sum(nilai) as nilai ,negara
                FROM bps_negara_tujuan_asal
                WHERE EXIM='EKSPOR'
                AND bulan_tahun between '$datenow-01-01' and '$datenow-$md'
                GROUP BY negara
                ) D ON C.negara = D.negara
                ORDER BY A.nilai desc
                LIMIT 10
               ";
//       PRINT($sql);
//       die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function getNegaraETotal($dbefore1,$dbefore2,$datenow,$datebefore,$md){
        $sql = "
                SELECT A.negara, A.nilai as nilai1, B.nilai as nilai2 , C.nilai as nilai3 , D.nilai as nilai4 FROM( 
                SELECT sum(nilai) as nilai ,negara FROM bps_negara_tujuan_asal WHERE EXIM='EKSPOR' AND year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%' ) A 
                INNER JOIN ( 
                SELECT sum(nilai) as nilai ,negara FROM bps_negara_tujuan_asal WHERE EXIM='EKSPOR' AND year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%' ) B 
                INNER JOIN ( SELECT sum(nilai) as nilai ,negara FROM bps_negara_tujuan_asal WHERE EXIM='EKSPOR' AND bulan_tahun between '$datebefore-01-01' and '$datebefore-$md' ) C 
                INNER JOIN ( SELECT sum(nilai) as nilai ,negara FROM bps_negara_tujuan_asal WHERE EXIM='EKSPOR' AND bulan_tahun between '$datenow-01-01' and '$datenow-$md' ) D  ";
//       PRINT($sql);
//       die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function getNegaraETotallain($dbefore1,$dbefore2,$datenow,$datebefore,$md){
        $sql = "
                SELECT A.negara, A.nilai as nilai1, B.nilai as nilai2 , C.nilai as nilai3 , D.nilai as nilai4 FROM( 
                SELECT sum(nilai) as nilai ,negara FROM bps_negara_tujuan_asal WHERE EXIM='EKSPOR' AND year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%' ) A 
                INNER JOIN ( 
                SELECT sum(nilai) as nilai ,negara FROM bps_negara_tujuan_asal WHERE EXIM='EKSPOR' AND year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%' ) B 
                INNER JOIN ( SELECT sum(nilai) as nilai ,negara FROM bps_negara_tujuan_asal WHERE EXIM='EKSPOR' AND bulan_tahun between '$datebefore-01-01' and '$datebefore-$md' ) C 
                INNER JOIN ( SELECT sum(nilai) as nilai ,negara FROM bps_negara_tujuan_asal WHERE EXIM='EKSPOR' AND bulan_tahun between '$datenow-01-01' and '$datenow-$md' ) D  ";
//       PRINT($sql);
//       die();
        $result = $this->db->query($sql);
           return $result->row();
    }
     public function getNegaraI($dbefore1,$dbefore2,$datenow,$datebefore,$md){
        $sql = "SELECT A.negara, A.nilai as nilai1, B.nilai as nilai2 , C.nilai as nilai3 , D.nilai as nilai4
                FROM(
                SELECT sum(nilai) as nilai ,negara
                FROM bps_negara_tujuan_asal
                WHERE EXIM='IMPOR'
                AND year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%'
                    GROUP BY negara
                ) A
                INNER JOIN
                (
                SELECT sum(nilai) as nilai ,negara
                FROM bps_negara_tujuan_asal
                WHERE EXIM='IMPOR'
                AND year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%'
                    GROUP BY negara
                ) B ON A.negara = B.negara
                INNER JOIN
                (
                SELECT sum(nilai) as nilai ,negara
                FROM bps_negara_tujuan_asal
                WHERE EXIM='IMPOR'
                AND bulan_tahun between '$datebefore-01-01' and '$datebefore-$md'
                    GROUP BY negara
                ) C ON B.negara = C.negara
                INNER JOIN
                (
                SELECT sum(nilai) as nilai ,negara
                FROM bps_negara_tujuan_asal
                WHERE EXIM='IMPOR'
                AND bulan_tahun between '$datenow-01-01' and '$datenow-$md'
                GROUP BY negara
                ) D ON C.negara = D.negara
                ORDER BY A.nilai desc
                LIMIT 10 ";
       
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function getNegaraITotal($dbefore1,$dbefore2,$datenow,$datebefore,$md){
        $sql = "
                SELECT A.negara, A.nilai as nilai1, B.nilai as nilai2 , C.nilai as nilai3 , D.nilai as nilai4 FROM( 
                SELECT sum(nilai) as nilai ,negara FROM bps_negara_tujuan_asal WHERE EXIM='IMPOR' AND year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%' ) A 
                INNER JOIN ( 
                SELECT sum(nilai) as nilai ,negara FROM bps_negara_tujuan_asal WHERE EXIM='IMPOR' AND year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%' ) B 
                INNER JOIN ( SELECT sum(nilai) as nilai ,negara FROM bps_negara_tujuan_asal WHERE EXIM='IMPOR' AND bulan_tahun between '$datebefore-01-01' and '$datebefore-$md' ) C 
                INNER JOIN ( SELECT sum(nilai) as nilai ,negara FROM bps_negara_tujuan_asal WHERE EXIM='IMPOR' AND bulan_tahun between '$datenow-01-01' and '$datenow-$md' ) D  ";
//       PRINT($sql);
//       die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function getNegaraITotallain($dbefore1,$dbefore2,$datenow,$datebefore,$md){
        $sql = "
                SELECT A.negara, A.nilai as nilai1, B.nilai as nilai2 , C.nilai as nilai3 , D.nilai as nilai4 FROM( 
                SELECT sum(nilai) as nilai ,negara FROM bps_negara_tujuan_asal WHERE EXIM='IMPOR' AND year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%' ) A 
                INNER JOIN ( 
                SELECT sum(nilai) as nilai ,negara FROM bps_negara_tujuan_asal WHERE EXIM='IMPOR' AND year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%' ) B 
                INNER JOIN ( SELECT sum(nilai) as nilai ,negara FROM bps_negara_tujuan_asal WHERE EXIM='IMPOR' AND bulan_tahun between '$datebefore-01-01' and '$datebefore-$md' ) C 
                INNER JOIN ( SELECT sum(nilai) as nilai ,negara FROM bps_negara_tujuan_asal WHERE EXIM='IMPOR' AND bulan_tahun between '$datenow-01-01' and '$datenow-$md' ) D  ";
//       PRINT($sql);
//       die();
        $result = $this->db->query($sql);
           return $result->row();
    }
    public function getKomoditi($dbefore1,$dbefore2,$datenow,$datebefore,$md){
        
        $sql = "SELECT A.kode_hs,A.uraian_hs, A.nilai as nilai1 , B.nilai as nilai2 , C.nilai as nilai3 , D.nilai as nilai4
                FROM( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs FROM bps_10komoditi where year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%' and ekspor_impor = 'EKSPOR' group by kode_hs order by id) A 
                INNER JOIN (
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs FROM bps_10komoditi where year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%' and ekspor_impor = 'EKSPOR' group by kode_hs order by id) B 
                ON A.kode_hs = B.kode_hs
                INNER JOIN (
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs FROM bps_10komoditi where bulan_tahun between '$datebefore-01-01' and '$datebefore-$md' and ekspor_impor = 'EKSPOR' group by kode_hs order by id) C
                ON B.kode_hs = C.kode_hs
                INNER JOIN (
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs FROM bps_10komoditi where bulan_tahun between '$datenow-01-01' and '$datenow-$md' and ekspor_impor = 'EKSPOR' group by kode_hs order by id) D
                ON C.kode_hs = D.kode_hs
                ORDER BY A.nilai desc
                limit 10
                ";
//       print($sql);
//       die();
        $result = $this->db->query($sql);
        return $result->result();
    }
   
    public function getKomoditiTotalLain($dbefore1,$dbefore2,$datenow,$datebefore,$md) {
         $sql = "
                SELECT A.nilai as nilai1 , B.nilai as nilai2 , C.nilai as nilai3 , D.nilai as nilai4 
                FROM( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs,ekspor_impor FROM bps_10komoditi where year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%' and ekspor_impor = 'EKSPOR' ) A 
                INNER JOIN ( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs,ekspor_impor FROM bps_10komoditi where year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%' and ekspor_impor = 'EKSPOR' ) B ON A.ekspor_impor = B.ekspor_impor 
                INNER JOIN ( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs,ekspor_impor FROM bps_10komoditi where bulan_tahun between '$datebefore-01-01' and '$datebefore-$md' and ekspor_impor = 'EKSPOR' ) C ON B.ekspor_impor = C.ekspor_impor 
                INNER JOIN ( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs,ekspor_impor FROM bps_10komoditi where bulan_tahun between '$datenow-01-01' and '$datenow-$md' and ekspor_impor = 'EKSPOR' ) D ON C.ekspor_impor = D.ekspor_impor ";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function getKomoditiTotal($dbefore1,$dbefore2,$datenow,$datebefore,$md){
        $sql = "
                SELECT A.nilai as nilai1 , B.nilai as nilai2 , C.nilai as nilai3 , D.nilai as nilai4 
                FROM( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs,ekspor_impor FROM bps_10komoditi where year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%' and ekspor_impor = 'EKSPOR' ) A 
                INNER JOIN ( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs,ekspor_impor FROM bps_10komoditi where year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%' and ekspor_impor = 'EKSPOR' ) B ON A.ekspor_impor = B.ekspor_impor 
                INNER JOIN ( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs,ekspor_impor FROM bps_10komoditi where bulan_tahun between '$datebefore-01-01' and '$datebefore-$md' and ekspor_impor = 'EKSPOR' ) C ON B.ekspor_impor = C.ekspor_impor 
                INNER JOIN ( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs,ekspor_impor FROM bps_10komoditi where bulan_tahun between '$datenow-01-01' and '$datenow-$md' and ekspor_impor = 'EKSPOR' ) D ON C.ekspor_impor = D.ekspor_impor ";
//        print($sql);
//        die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function getKomoditiI($dbefore1,$dbefore2,$datenow,$datebefore,$md){
        $sql = "SELECT A.kode_hs,A.uraian_hs, A.nilai as nilai1 , B.nilai as nilai2 , C.nilai as nilai3 ,  D.nilai as nilai4
                FROM( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs FROM bps_10komoditi where year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%' and ekspor_impor = 'IMPOR' group by kode_hs order by id) A 
                INNER JOIN (
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs FROM bps_10komoditi where year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%' and ekspor_impor = 'IMPOR' group by kode_hs order by id) B 
                ON A.kode_hs = B.kode_hs
                INNER JOIN (
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs FROM bps_10komoditi where bulan_tahun between '$datebefore-01-01' and '$datebefore-$md' and ekspor_impor = 'IMPOR' group by kode_hs order by id) C
                ON B.kode_hs = C.kode_hs
                INNER JOIN (
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs FROM bps_10komoditi where bulan_tahun between '$datenow-01-01' and '$datenow-$md' and ekspor_impor = 'IMPOR' group by kode_hs order by id) D
                ON C.kode_hs = D.kode_hs
                ORDER BY A.nilai desc
                limit 10";
//        print($sql);
//        die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function getKomoditiITotalLain($dbefore1,$dbefore2,$datenow,$datebefore,$md) {
         $sql = "
                SELECT A.nilai as nilai1 , B.nilai as nilai2 , C.nilai as nilai3 , D.nilai as nilai4 
                FROM( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs,ekspor_impor FROM bps_10komoditi where year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%' and ekspor_impor = 'IMPOR' ) A 
                INNER JOIN ( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs,ekspor_impor FROM bps_10komoditi where year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%' and ekspor_impor = 'IMPOR' ) B ON A.ekspor_impor = B.ekspor_impor 
                INNER JOIN ( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs,ekspor_impor FROM bps_10komoditi where bulan_tahun between '$datebefore-01-01' and '$datebefore-$md' and ekspor_impor = 'IMPOR' ) C ON B.ekspor_impor = C.ekspor_impor 
                INNER JOIN ( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs,ekspor_impor FROM bps_10komoditi where bulan_tahun between '$datenow-01-01' and '$datenow-$md' and ekspor_impor = 'IMPOR' ) D ON C.ekspor_impor = D.ekspor_impor ";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function getKomoditiITotal($dbefore1,$dbefore2,$datenow,$datebefore,$md){
        $sql = "
                SELECT A.nilai as nilai1 , B.nilai as nilai2 , C.nilai as nilai3 , D.nilai as nilai4 
                FROM( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs,ekspor_impor FROM bps_10komoditi where year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore2%' and ekspor_impor = 'IMPOR' ) A 
                INNER JOIN ( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs,ekspor_impor FROM bps_10komoditi where year(bulan_tahun) = '$datenow' and month(bulan_tahun) = '$dbefore1%' and ekspor_impor = 'IMPOR' ) B ON A.ekspor_impor = B.ekspor_impor 
                INNER JOIN ( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs,ekspor_impor FROM bps_10komoditi where bulan_tahun between '$datebefore-01-01' and '$datebefore-$md' and ekspor_impor = 'IMPOR' ) C ON B.ekspor_impor = C.ekspor_impor 
                INNER JOIN ( 
                SELECT sum(nilai) as nilai ,kode_hs, uraian_hs,ekspor_impor FROM bps_10komoditi where bulan_tahun between '$datenow-01-01' and '$datenow-$md' and ekspor_impor = 'IMPOR' ) D ON C.ekspor_impor = D.ekspor_impor ";
//        print($sql);
//        die();
        $result = $this->db->query($sql);
        return $result->result();
    }
    
     public function getRencKerja(){
         $result = $this->db->get('mst_rencana_kerja');
        return $result->result();
    }
    public function getUmkm(){
         $result = $this->db->get('mst_umkm');
        return $result->result();
    }
    public function getKota(){
        $result = $this->db->get('mst_kabupaten_lengkap');
        return $result->result();
    }
    function get_kecamatan($id_kab) {
        $this->db->where('id_kab', $id_kab);
        $result = $this->db->get('mst_kecamatan_lengkap');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    public function getEO(){
         $result = $this->db->get('mst_event_organiser');
        return $result->result();
    }
    public function getPL(){
         $result = $this->db->get('mst_penyelenggara');
        return $result->result();
    }
     public function getUser(){
         $result = $this->db->get('user');
        return $result->result();
    }
    
     public function getAgenda(){
        $result = $this->db->get('agenda_ln_dn');
        return $result->result();
    }
    public function getEksMigas(){
        $result = $this->db->get('t_ekspor_migas');
        return $result->result();
    }
    public function getEksNonMigas(){
        $result = $this->db->get('t_ekspor_sektor');
        return $result->result();
    }
    public function getImpMigas(){
        $result = $this->db->get('t_impor_migas');
        return $result->result();
    }
    public function getImpNonMigas(){
        $result = $this->db->get('t_impor_sektor');
        return $result->result();
    }
    public function editRencKerja($id){
        $this->db->where('id',$id);
         $result = $this->db->get('mst_rencana_kerja');
        return $result->row();
    }
    public function editUmkm($id){
        $this->db->where('id',$id);
         $result = $this->db->get('mst_umkm');
        return $result->row();
    }
    public function editUser($id){
        $this->db->where('id',$id);
         $result = $this->db->get('user');
        return $result->row();
    }
    public function editEO($id){
        $this->db->where('id',$id);
         $result = $this->db->get('mst_event_organiser');
        return $result->row();
    }
    public function editPL($id){
        $this->db->where('id',$id);
         $result = $this->db->get('mst_penyelenggara');
        return $result->row();
    }
     public function editAgenda($id){
        $this->db->where('dalam-luar-negri','DALAM NEGERI');
        $this->db->where('id',$id);
//        print($id);
//        die();
         $result = $this->db->get('agenda_ln_dn');
        return $result->row();
    }
    public function editAgendaLN($id){
        $this->db->where('dalam-luar-negri','LUAR NEGERI');
        $this->db->where('id',$id);
        $result = $this->db->get('agenda_ln_dn');
        return $result->row();
    }
    public function getAgendaNull(){
        $this->db->where('dalam-luar-negri','DALAM NEGERI');
        $this->db->where('nilai is null');
        $this->db->where('tgl_selesai > CURDATE()');
        $this->db->order_by('tgl_mulai','ASC');
        $result = $this->db->get('agenda_ln_dn');
        return $result->result();
    }
    public function getAgendaNullsdh(){
        $this->db->where('dalam-luar-negri','DALAM NEGERI');
        $this->db->where('nilai is null');
        $this->db->where('tgl_selesai <= CURDATE()');
        $this->db->order_by('tgl_mulai','ASC');
        $result = $this->db->get('agenda_ln_dn');
        return $result->result();
    }
    public function getAgendaNulldetail(){
        $sql = "SELECT * from agenda_umkm_ln_dn";
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    public function getAgendaNullLN(){
        $this->db->where('dalam-luar-negri','LUAR NEGERI');
        $this->db->where('nilai is null');
        $this->db->where('tgl_selesai > CURDATE()');
        $this->db->order_by('tgl_mulai','ASC');
         $result = $this->db->get('agenda_ln_dn');
        return $result->result();
    }
    public function getAgendaNullLNsdh(){
        $this->db->where('dalam-luar-negri','LUAR NEGERI');
        $this->db->where('nilai is null');
        $this->db->where('tgl_selesai <= CURDATE()');
        $this->db->order_by('tgl_mulai','ASC');
         $result = $this->db->get('agenda_ln_dn');
        return $result->result();
    }
    public function getAgendaNotNull(){
        $this->db->where('nilai is not null');
         $result = $this->db->get('agenda_ln_dn');
        return $result->result();
    }
    public function updateAgenda($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('agenda_ln_dn',$data);
       return $result;
    }
     public function updateUser($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('user',$data);
       return $result;
    }
    public function updateUmkm($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('mst_umkm',$data);
       return $result;
    }
    public function updateEO($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('mst_event_organiser',$data);
       return $result;
    }
    public function updatePL($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('mst_penyelenggara',$data);
       return $result;
    }
     public function updateRencKerja($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('mst_rencana_kerja',$data);
       return $result;
    }
    public function updateAgendaLN($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('agenda_ln_dn',$data);
       return $result;
    }
    
    public function getHS(){
        $result = $this->db->get('mst_komoditas');
        return $result->result();
    }
    
    public function getNegara(){
        $result = $this->db->get('mst_negara');
        return $result->result();
    }
    
    public function getNegaraBps(){
        $sql = "SELECT distinct(negara) as nama_negara FROM bps_negara_tujuan_asal";
        
        $result = $this->db->query($sql);
        return $result->result();   
    }
    
    //NEW
    public function uploadExcelPusdatin($data) {
        $this->db->insert('data_pusdatin', $data);
        $this->db->insert_id();
        return true;
    }
    
    public function uploadExcelBpsMigas($data) {
        $this->db->insert('bps_exim_nonmigas_migas', $data);
        $this->db->insert_id();
        return true;
    }
    
    public function uploadExcelBpsKomoditi($data) {
        $this->db->insert('bps_10komoditi', $data);
        $this->db->insert_id();
        return true;
    }
    public function uploadExcelBpsNasional($data) {
        $this->db->insert('bps_data_nasional', $data);
        $this->db->insert_id();
        return true;
    }
    public function uploadExcelBpsNegara($data) {
        $this->db->insert('bps_negara_tujuan_asal', $data);
        $this->db->insert_id();
        return true;
    }
    
    //END NEW
    
    
    
    public function uploadExcelKomoditas($data) {
        $this->db->insert('t_ekspor_komoditi', $data);
        $this->db->insert_id();
        return true;
    }
    public function uploadExcelKomoditasI($data) {
        $this->db->insert('t_impor_komoditi', $data);
        $this->db->insert_id();
        return true;
    }
    
    public function uploadExcelNegara($data) {
        $this->db->insert('t_ekspor_negara', $data);
        $this->db->insert_id();
        return true;
    }
    public function uploadExcelNegaraDtl($data) {
        $this->db->insert('t_ekspor_negara_dtl', $data);
        $this->db->insert_id();
        return true;
    }
    
    
    public function uploadExcelNegaraI($data) {
        $this->db->insert('t_impor_negara', $data);
        $this->db->insert_id();
        return true;
    }
    
    
    
    public function uploadExcelImpor($data) {
        $this->db->insert('t_impor_sektor_pusdatin', $data);
        $this->db->insert_id();
        return true;
    }
    
    public function getKomoditas() {
        
        $this->db->select('KD_HS2DIGIT, URAIAN AS DESCR');
        $result = $this->db->get('mst_komoditas');
        return $result->result();
    }
    
    public function getDeschs($hs){
        $this->db->select('KD_HS2DIGIT, URAIAN AS DESCR');
        $this->db->where('KD_HS2DIGIT', $hs);
        $this->db->limit(1);
        $result = $this->db->get('mst_komoditas');
        return $result->row();
     }
}
