<?php
    function tgl_standard($tgl){
      $tanggal = substr($tgl,0,2);
      $bulan = substr($tgl,3,2);
      $tahun = substr($tgl,6,9);
      return $tahun.'-'.$bulan.'-'.$tanggal;       
    }
    function tahun($tgl){
      $tanggal = substr($tgl,0,2);
      $bulan = substr($tgl,3,2);
      $tahun = substr($tgl,6,9);
      return $tahun;       
    }
?>