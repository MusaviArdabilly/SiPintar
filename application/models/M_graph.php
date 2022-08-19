<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_graph extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    
    
    
    
//    BPS
    public function getKomoEksporBps($datenow){
            $sql = "SELECT uraian_hs as kategori, kode_hs, sum(nilai) as nilai FROM bps_10komoditi where ekspor_impor='EKSPOR' and substr(bulan_tahun, 1,4) ='$datenow' group by kode_hs order by nilai desc limit 10";
                    $result = $this->db->query($sql);
                    return $result->result();
        }
        public function getKomoImporBps($datenow){
            $sql = "SELECT uraian_hs as kategori, kode_hs, sum(nilai) as nilai FROM bps_10komoditi where ekspor_impor='IMPOR' and substr(bulan_tahun, 1,4) ='$datenow' group by kode_hs order by nilai desc limit 10";
                    
                    $result = $this->db->query($sql);
                    return $result->result();
        }
        
        public function getBulanKomoBPS($datenow){
        $sql = "SELECT  substr(bulan_tahun, 1,4) as tahun, MONTHNAME(bulan_tahun)as bln_akhir  from bps_10komoditi 
                where ekspor_impor='EKSPOR' and substr(bulan_tahun, 1,4) ='$datenow' order by bulan_tahun
                desc limit 1";
        $result = $this->db->query($sql);
        return $result->row();
        }
        
        public function getBulanKomoBPSI($datenow){
        $sql = "SELECT  substr(bulan_tahun, 1,4) as tahun, MONTHNAME(bulan_tahun)as bln_akhir  from bps_10komoditi 
                where ekspor_impor='EKSPOR' and substr(bulan_tahun, 1,4) ='$datenow' order by bulan_tahun
                desc limit 1";
        $result = $this->db->query($sql);
        return $result->row();
        }
        
        public function getNegEksporBps($datenow){
            $sql = "SELECT negara, sum(nilai) as nilai FROM bps_negara_tujuan_asal where exim='EKSPOR' and substr(bulan_tahun, 1,4) ='$datenow' group by negara order by nilai desc limit 10";
                    $result = $this->db->query($sql);
                    return $result->result();
        }
        public function getNegImporBps($datenow){
            $sql = "SELECT negara, sum(nilai) as nilai FROM bps_negara_tujuan_asal where exim='IMPOR' and substr(bulan_tahun, 1,4) ='$datenow' group by negara order by nilai desc limit 10";
                    
                    $result = $this->db->query($sql);
                    return $result->result();
        }
        
        public function getBulanBPS($datenow){
        $sql = "SELECT  substr(bulan_tahun, 1,4) as tahun, MONTHNAME(bulan_tahun)as bln_akhir  from bps_negara_tujuan_asal 
                where exim='EKSPOR' and substr(bulan_tahun, 1,4) ='$datenow' order by bulan_tahun
                desc limit 1";
        $result = $this->db->query($sql);
        return $result->row();
        }
        public function getBulanBPSI($datenow){
        $sql = "SELECT  substr(bulan_tahun, 1,4) as tahun, MONTHNAME(bulan_tahun)as bln_akhir  from bps_negara_tujuan_asal 
                where exim='IMPOR' and substr(bulan_tahun, 1,4) ='$datenow' order by bulan_tahun
                desc limit 1";
        $result = $this->db->query($sql);
        return $result->row();
        }
        
        
        
         public function getNeracaBps($datenow){
        $sql = "
                SELECT 
                D.nilai as nilai,
                D.ekspor_impor as kategori
                FROM 
                (SELECT SUM(a.nilai) as nilai,a.ekspor_impor from bps_exim_nonmigas_migas a where substr(a.bulan_tahun, 1,4) ='$datenow' and ekspor_impor='EKSPOR') D 


                UNION ALL

                SELECT 
                D.nilai as nilai,
                D.ekspor_impor as kategori
                FROM 
                (SELECT SUM(a.nilai) as nilai,a.ekspor_impor from bps_exim_nonmigas_migas a where substr(a.bulan_tahun, 1,4) ='$datenow' and ekspor_impor='IMPOR') D 
                ";
//            print($sql);
//            die();
            $result = $this->db->query($sql);
            return $result->result();
        }
        
        public function getBandingBps($datenow){
            $sql = "SELECT SUM(a.nilai) as nilai,a.ekspor_impor from bps_exim_nonmigas_migas a where substr(a.bulan_tahun, 1,4) ='$datenow' and ekspor_impor='EKSPOR'";
            $result = $this->db->query($sql);
            return $result->row();
        }
        public function getBandingBpsI($datenow){
            $sql = "SELECT SUM(a.nilai) as nilai,a.ekspor_impor from bps_exim_nonmigas_migas a where substr(a.bulan_tahun, 1,4) ='$datenow' and ekspor_impor='IMPOR'";
            $result = $this->db->query($sql);
            return $result->row();
        }
        public function getBulanBPSNeraca($datenow){
            $sql = "SELECT  substr(bulan_tahun, 1,4) as tahun, MONTHNAME(bulan_tahun)as bln_akhir  from bps_exim_nonmigas_migas where substr(bulan_tahun, 1,4) ='$datenow' order by bulan_tahun
                    desc limit 1";
            $result = $this->db->query($sql);
        return $result->row();
        }
        
        public function getTableEksporBPS($datenow){
        $sql = "SELECT uraian_hs, FORMAT(sum(nilai),2) AS nilai
                FROM  bps_10komoditi
                WHERE SUBSTR(bulan_tahun, 1,4) = '$datenow'
                AND ekspor_impor='EKSPOR'
                GROUP BY kode_hs
                ORDER BY sum(nilai) DESC LIMIT 10";
        $ok =  $this->db->query($sql);
        $arrdata = $ok->result_array();
        return $arrdata;
    
        }
        public function getTableImporBPS($datenow){
        $sql = "SELECT uraian_hs, FORMAT(sum(nilai),2) AS nilai
                FROM  bps_10komoditi
                WHERE SUBSTR(bulan_tahun, 1,4) = '$datenow'
                AND ekspor_impor='IMPOR'
                GROUP BY kode_hs
                ORDER BY sum(nilai) DESC LIMIT 10";
        $ok =  $this->db->query($sql);
        $arrdata = $ok->result_array();
        return $arrdata;
    
        }
        
        
        
//        PROV JATIM AKA PEPI
        public function getNeracaPepi($datenow){
        $sql = "
                SELECT 
                D.nilai as nilai,
                'EKSPOR' as kategori
                FROM 
                (SELECT NILAI_USD as nilai FROM V_NILAI_PEPI WHERE TAHUN='$datenow') D 

                UNION ALL

                SELECT 
                D.nilai as nilai,
                'IMPOR' as kategori
                FROM 
                (SELECT NILAI_USD as nilai FROM V_NILAI_PEPI_IMPOR WHERE TAHUN='$datenow') D 

                ";
//            print($sql);
//            die();
            $result = $this->db->query($sql);
            return $result->result();
        }
        public function getBandingPepi($datenow){
        $sql = "SELECT NILAI_USD as nilai FROM V_NILAI_PEPI WHERE TAHUN='$datenow'";
//            print($sql);
//            die();
            $result = $this->db->query($sql);
            return $result->row();
        }
        public function getBandingPepiI($datenow){
        $sql = "SELECT NILAI_USD as nilaiI FROM V_NILAI_PEPI_IMPOR WHERE TAHUN='$datenow'";
//            print($sql);
//            die();
            $result = $this->db->query($sql);
            return $result->row();
        }
          
        
        public function getNegEksporPepi($datenow){
            
            $sql = "SELECT SUM(a.FOB*a.CONVERTER) AS nilai, b.nama_negara as negara 
                    FROM TR_PEB_HDR a inner join mst_negara b on a.NEG_TUJUAN = b.kode_negara
                    where substr(a.peb_tgl,1,4) = '$datenow'
                    group by a.NEG_TUJUAN
                    order by SUM(a.FOB*a.CONVERTER) desc
                    limit 10";
            
            $result = $this->db->query($sql);
            return $result->result();
        }
        
        public function getNegImporPepi($datenow){
            
            $sql = "SELECT SUM(a.NCIF*a.CONVERTER) AS nilai, b.nama_negara as negara 
                    FROM TR_PIB_HDR a inner join mst_negara b on a.NEGARA_ASAL = b.kode_negara
                    where substr(a.pib_tgl,1,4) = '$datenow'
                    group by a.NEGARA_ASAL
                    order by SUM(a.NCIF*a.CONVERTER) desc
                    limit 10";
            
            $result = $this->db->query($sql);
            return $result->result();
        }
        public function getKomoEksporPepi($datenow){
            $sql = "SELECT substr(hs_no,1,8) as kode_hs, sum(fob*converter) as nilai , sum(fob*ndpbm) as nilai_rp
                    FROM TR_PEB_HDR a inner join TR_PEB_DTL b on a.aju_no = b.aju_no
                    where substr(a.peb_tgl,1,4) = '$datenow'
                    group by substr(hs_no,1,8) order by sum(fob*converter) desc limit 10";
            // print($sql);
            // die();
            $result = $this->db->query($sql);
            return $result->result();
        }
        
        public function getKomoImporPepi($datenow){
            $sql = "SELECT substr(hs_no,1,8) as kode_hs, sum(ncif*converter) as nilai , sum(ncif*ndpbm) as nilai_rp
                    FROM TR_PIB_HDR a inner join TR_PIB_DTL b on a.aju_no = b.aju_no
                    where substr(a.pib_tgl,1,4) = '$datenow'
                    group by substr(hs_no,1,8) order by sum(ncif*converter) desc limit 10";
            $result = $this->db->query($sql);
            return $result->result();
        }
        
        public function getMonthPepi($datenow){
            $sql = "SELECT YEAR(peb_tgl) as tahun, MONTHNAME(peb_tgl) as bln_akhir FROM TR_PEB_HDR where substr(peb_tgl,1,4) = '$datenow' ORDER BY peb_tgl desc limit 1";
            $result = $this->db->query($sql);
            return $result->row();
        }
        public function getMonthPepiI($datenow){
            $sql = "SELECT YEAR(pib_tgl) as tahun, MONTHNAME(pib_tgl) as bln_akhir FROM TR_PIB_HDR where substr(pib_tgl,1,4) = '$datenow' ORDER BY pib_tgl desc limit 1";
            $result = $this->db->query($sql);
            return $result->row();
        }
        
        
        public function getTableEksporPepi($datenow){
        $sql = "SELECT FORMAT(SUM(JML_USD),2) AS nilai, komoditas
                FROM tmp_kmdekspor_by_negara
                WHERE SUBSTR(tgl, 1,4) = '$datenow'
                GROUP BY komoditas
                ORDER BY SUM(JML_USD) DESC LIMIT 10";
        $ok =  $this->db->query($sql);
        $arrdata = $ok->result_array();
        return $arrdata;
    
        }
        public function getTableImporPepi($datenow){
        $sql = "SELECT FORMAT(SUM(JML_USD),2) AS nilai, komoditas
                FROM tmp_kmdimpor_by_negara
                WHERE SUBSTR(tgl, 1,4) = '$datenow'
                GROUP BY komoditas
                ORDER BY SUM(JML_USD) DESC LIMIT 10";
        $ok =  $this->db->query($sql);
        $arrdata = $ok->result_array();
        return $arrdata;
    
        }
 // ====================================SKA===========================================
    
    public function getNegEksporSKA($datenow) {
        $sql = "SELECT a.negara_tujuan as negara, format(SUM(a.fob_usd),2) as nilai
                    FROM t_ska a
                    GROUP BY a.negara_tujuan
                    ORDER BY SUM(a.fob_usd)
                    DESC LIMIT 10";
        $result = $this->db->query($sql);
        return $result->result();
    }
										
	
    
    	public function getKomoEksporSKA($datenow) {
        $sql = "SELECT b.kd_hs2digit as kode_hs, b.uraian as kategori, format(sum(a.fob_usd),2) as nilai
												FROM t_ska a 
												INNER JOIN mst_komoditas b on substr(a.nohs,1,2) = b.kd_hs2digit
												GROUP BY b.kd_hs2digit
												ORDER BY sum(a.fob_usd)
												DESC LIMIT 10";
        $result = $this->db->query($sql);
        return $result->result();
    }

//        SELECT format(sum(fob_usd),2) as nilai FROM t_dab GROUP BY no_dab order by sum(fob_usd) desc limit 10 


    public function getFormSKA($datenow) {
        $sql = "SELECT a.jenis_form as form, format(sum(a.fob_usd),2) as nilai
								 FROM t_ska a
								 GROUP BY a.jenis_form
								 ORDER BY sum(a.fob_usd)
								 DESC LIMIT 10";
        $result = $this->db->query($sql);
        return $result->result();
    }

    public function getjumlahForm($datenow) {
        $sql = "SELECT a.jenis_form as code,COUNT(a.jenis_form) as jumlah
								 FROM t_ska a
								 GROUP BY a.jenis_form
								 ORDER BY COUNT(a.jenis_form)
								 DESC LIMIT 10";
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    
//    ====================================END SKA===========================================
//    ====================================DAB===========================================
     public function getFormDAB($datenow) {
        $sql = "SELECT a.jenis_dab as form, format(sum(a.fob_usd),2) as nilai
								 FROM t_dab a
								 GROUP BY a.jenis_dab
								 ORDER BY sum(a.fob_usd)
								 DESC LIMIT 10"; 
        $result = $this->db->query($sql);
        return $result->result();
    }
    
     public function getjumlahFormDAB($datenow) {
        $sql = "SELECT a.jenis_dab as code,COUNT(a.jenis_dab) as jumlah
								 FROM t_dab a
								 GROUP BY a.jenis_dab
								 ORDER BY COUNT(a.jenis_dab)
								 DESC LIMIT 10";
        $result = $this->db->query($sql);
        return $result->result();
    }
//    ====================================END DAB===========================================
//    PUSDATIN
        public function getKomoEksporPusdatin($datenow){
            $sql = "SELECT diskripsi_hs as kategori,kode_hs, sum(nilai) as nilai FROM data_pusdatin where kd_ekspor_impor='EKSPOR' and substr(tahun ,1,4) ='$datenow' group by kode_hs order by nilai desc limit 10";
                    
                    $result = $this->db->query($sql);
                    return $result->result();
        }
        public function getKomoImporPusdatin($datenow){
            $sql = "SELECT diskripsi_hs as kategori,kode_hs, sum(nilai) as nilai FROM data_pusdatin where kd_ekspor_impor='IMPOR' and substr(tahun ,1,4) ='$datenow' group by kode_hs order by nilai desc limit 10";
                    
                    $result = $this->db->query($sql);
                    return $result->result();
        }
        public function getNegEksporPusdatin($datenow){
            $sql = "SELECT negara, sum(nilai) as nilai FROM data_pusdatin where kd_ekspor_impor='EKSPOR' and substr(tahun ,1,4) ='$datenow' group by negara order by nilai desc limit 10";
                    
                    $result = $this->db->query($sql);
                    return $result->result();
        }
        
        public function getNegImporPusdatin($datenow){
            $sql = "SELECT negara, sum(nilai) as nilai FROM data_pusdatin where kd_ekspor_impor='IMPOR' and substr(tahun ,1,4) ='$datenow' group by negara order by nilai desc limit 10";
                    
                    $result = $this->db->query($sql);
                    return $result->result();
        }
        public function getNeracaPusdatin($datenow){
        $sql = "
                SELECT 
                D.nilai as nilai,
                D.tahun,
                D.kategori
                FROM 
                (SELECT SUM(a.nilai) as nilai,a.tahun,a.kd_ekspor_impor as kategori from data_pusdatin a where substr(tahun ,1,4)='$datenow' and kd_ekspor_impor='EKSPOR') D 

                UNION ALL

                SELECT 
                D.nilai as nilai,
                D.tahun,
                D.kategori
                FROM 
                (SELECT SUM(a.nilai) as nilai,a.tahun,a.kd_ekspor_impor as kategori from data_pusdatin a where substr(tahun ,1,4)='$datenow' and kd_ekspor_impor='IMPOR') D 
                ";
//            print($sql);
//            die();
            $result = $this->db->query($sql);
            return $result->result();

        } 
        public function getBandingPusdatin($datenow){
        $sql = "SELECT SUM(a.nilai) as nilai,a.tahun,a.kd_ekspor_impor as kategori from data_pusdatin a where substr(tahun ,1,4)='$datenow' and kd_ekspor_impor='EKSPOR'";
//            print($sql);
//            die();
            $result = $this->db->query($sql);
            return $result->row();

        }
        public function getBandingPusdatinI($datenow){
        $sql = "SELECT SUM(a.nilai) as nilai,a.tahun,a.kd_ekspor_impor as kategori from data_pusdatin a where substr(tahun ,1,4)='$datenow' and kd_ekspor_impor='IMPOR'";
//            print($sql);
//            die();
            $result = $this->db->query($sql);
            return $result->row();

        }
        public function getBulanNeracaPusdatin($datenow){
        $sql = "SELECT YEAR(tahun) as tahun,MONTHNAME(tahun)as bln_akhir from data_pusdatin  
                where substr(tahun, 1,4) ='$datenow' order by tahun
                desc limit 1";
        $result = $this->db->query($sql);
        return $result->row();
        }
        
        
    public function getTableEksporPusda($datenow){
        $sql = "SELECT 
                diskripsi_hs, FORMAT(sum(nilai),2) AS nilai
                FROM 
                data_pusdatin
                WHERE SUBSTR(tahun, 1,4) = '$datenow'
                AND kd_ekspor_impor='EKSPOR'
                GROUP BY FORMAT(kode_hs,1,2)
                ORDER BY sum(nilai) DESC LIMIT 10
                ";
        $ok =  $this->db->query($sql);
        $arrdata = $ok->result_array();
        return $arrdata;
    
        }
        public function getTableImporPusda($datenow){
        $sql = "SELECT 
                diskripsi_hs, FORMAT(sum(nilai),2) AS nilai
                FROM 
                data_pusdatin
                WHERE SUBSTR(tahun, 1,4) = '$datenow'
                AND kd_ekspor_impor='IMPOR'
                GROUP BY FORMAT(kode_hs,1,2)
                ORDER BY sum(nilai) DESC LIMIT 10
                ";
        $ok =  $this->db->query($sql);
        $arrdata = $ok->result_array();
        return $arrdata;
    
        }
//        end data pusdatin
        
        
        
     public function getPieAM($datenow){
//        $date2 = $datenow-1 ;
        $sql = "
                SELECT 
                D.kategori,
                D.nilai as thn$datenow
                FROM 
                (SELECT id, ekspor_impor as kategori,sum(nilai) as nilai ,substr(bulan_tahun, 1,4) as bulan
                FROM bps_exim_nonmigas_migas
                WHERE substr(bulan_tahun, 1,4) = '$datenow' 
                    AND ekspor_impor='EKSPOR') D 

                UNION ALL

                SELECT 
                D.kategori,
                D.nilai as thn$datenow
                FROM 
                (SELECT id,ekspor_impor as  kategori,sum(nilai) as nilai ,substr(bulan_tahun, 1,4) as bulan
                FROM bps_exim_nonmigas_migas
                WHERE substr(bulan_tahun, 1,4) = '$datenow'
                    AND ekspor_impor='IMPOR') D 
                ";
//        print($sql);
//        die();
        $result = $this->db->query($sql);
        return $result->result();
        
    }
    public function getBarAM($datenow){
    $sql = "SELECT sum(nilai) as nilainon, sektor 
                FROM bps_exim_nonmigas_migas 
                    WHERE kategori='NONMIGAS' AND ekspor_impor='EKSPOR' AND substr(bulan_tahun, 1,4) = '$datenow' "
            . "         GROUP BY sektor order by sum(nilai) desc";
    $result = $this->db->query($sql);
    return $result->result();
    }
    public function getPieAMI($datenow){
//        $date2 = $datenow-1 ;
        $sql = "
                SELECT 
                D.kategori,
                D.nilai as thn$datenow
                FROM 
                (SELECT id, ekspor_impor as kategori,sum(nilai) as nilai ,substr(bulan_tahun, 1,4) as bulan
                FROM bps_exim_nonmigas_migas
                WHERE substr(bulan_tahun, 1,4) = '$datenow' 
                    AND ekspor_impor='EKSPOR') D 

                UNION ALL

                SELECT 
                D.kategori,
                D.nilai as thn$datenow
                FROM 
                (SELECT id,ekspor_impor as  kategori,sum(nilai) as nilai ,substr(bulan_tahun, 1,4) as bulan
                FROM bps_exim_nonmigas_migas
                WHERE substr(bulan_tahun, 1,4) = '$datenow'
                    AND ekspor_impor='IMPOR') D 
                ";
//        print($sql);
//        die();
        $result = $this->db->query($sql);
        return $result->result();
        
    }
    public function getBarAMI($datenow){
    $sql = "SELECT sum(nilai) as nilainon, sektor 
                FROM bps_exim_nonmigas_migas 
                    WHERE kategori='NONMIGAS' AND ekspor_impor='IMPOR' AND substr(bulan_tahun, 1,4) = '$datenow' "
            . "         GROUP BY sektor order by sum(nilai) desc";
    $result = $this->db->query($sql);
    return $result->result();
    }
     
    public function getBarKinerja($datenow){
      $sql =  " 
            SELECT 
            A.sektor,
            A.nilai as thn2016,
            B.nilai as thn2017,
            C.nilai as thn2018,
            D.nilai as thn2015
            FROM 
            (SELECT id, sektor, sum(nilai) as nilai ,substr(bulan, 1,4) as bulan
            FROM t_ekspor_sektor
            WHERE substr(bulan, 4,7) = '2016'
            group by sektor 
            ORDER BY sum(nilai) desc ) A

            LEFT JOIN (SELECT id, sektor, sum(nilai) as nilai ,substr(bulan, 1,4) as bulan
            FROM t_ekspor_sektor
            WHERE substr(bulan, 4,7) = '2017'
            group by sektor 
            ORDER BY sum(nilai) desc ) B on A.sektor = B.sektor

            LEFT JOIN (SELECT id, sektor, sum(nilai) as nilai ,substr(bulan, 1,4) as bulan
            FROM t_ekspor_sektor
            WHERE substr(bulan, 4,7) = '2018'
            group by sektor 
            ORDER BY sum(nilai) desc ) C on A.sektor = C.sektor

            LEFT JOIN (SELECT id, sektor, sum(nilai) as nilai ,substr(bulan, 1,4) as bulan
            FROM t_ekspor_sektor
            WHERE substr(bulan, 4,7) = '2015'
            group by sektor 
            ORDER BY sum(nilai) desc ) D on A.sektor = D.sektor";
           
        $result = $this->db->query($sql);
        return $result->result();
    }
     
    public function getPieKinerjaImpor(){
        $sql = "
                SELECT 
                D.kategori,
                D.nilai as thn2018
                FROM 
                (SELECT id, kategori,sum(nilai) as nilai ,substr(bulan, 4,7) as bulan
                FROM t_impor_migas
                WHERE substr(bulan, 4,7) = '2018') D 

                UNION ALL

                SELECT 
                D.kategori,
                D.nilai as thn2018
                FROM 
                (SELECT id, kategori,sum(nilai) as nilai ,substr(bulan, 4,7) as bulan
                FROM t_impor_sektor
                WHERE substr(bulan, 4,7) = '2018') D 
                ";
        $result = $this->db->query($sql);
        return $result->result();
        
    }
    
     public function getBarKinerjaImpor(){
      $sql =  " 
            SELECT 
            A.sektor,
            A.nilai as thn2016,
            B.nilai as thn2017,
            C.nilai as thn2018,
            D.nilai as thn2015
            FROM 
            (SELECT id, sektor, sum(nilai) as nilai ,substr(bulan, 1,4) as bulan
            FROM t_impor_sektor
            WHERE substr(bulan, 4,7) = '2016'
            group by sektor 
            ORDER BY sum(nilai) desc ) A

            LEFT JOIN (SELECT id, sektor, sum(nilai) as nilai ,substr(bulan, 1,4) as bulan
            FROM t_impor_sektor
            WHERE substr(bulan, 4,7) = '2017'
            group by sektor 
            ORDER BY sum(nilai) desc ) B on A.sektor = B.sektor

            LEFT JOIN (SELECT id, sektor, sum(nilai) as nilai ,substr(bulan, 1,4) as bulan
            FROM t_impor_sektor
            WHERE substr(bulan, 4,7) = '2018'
            group by sektor 
            ORDER BY sum(nilai) desc ) C on A.sektor = C.sektor

            LEFT JOIN (SELECT id, sektor, sum(nilai) as nilai ,substr(bulan, 1,4) as bulan
            FROM t_impor_sektor
            WHERE substr(bulan, 4,7) = '2015'
            group by sektor 
            ORDER BY sum(nilai) desc ) D on A.sektor = D.sektor";
           
        $result = $this->db->query($sql);
        return $result->result();
    }
    
     public function get_data_cdgraph() {
         $sql ="select sum(nilai) as nilai from t_ekspor_sektor_pusdatin where tahun = '2019'
                UNION ALL
                select sum(nilai) as nilai from t_impor_sektor_pusdatin where tahun = '2019'";
        $result = $this->db->query($sql);
        return $result->result();
    }
}
