<?php
  if(isset($_GET['file']) && !empty($_GET['file'])){
    $file = basename($_GET['file']);
    $file = "{$file}.pdf";
    $path = "./Assets/{$file}";
    if(file_exists($path)){
      header("Content-Disposition: attachment; filename=" . urlencode($file));
      header("Content-Type: application/octet-stream");
      header("Content-Type: application/download");
      header("Content-Description: File Transfer");
      header("Content-Length: " . filesize($path));

      // Read the file and output it
      readfile($path);

      // Exit script after file download
      exit;
    }
    // echo $file;
  }else{
    echo "Invalid file request";
  }