<?php

/**
 * Formats and forces the download of the CSV file.
 * @param $headersCSV
 * @param $contentCSV
 * @param $fileName
 * @return void
 */
function downloadCSV($headersCSV, $contentCSV, $fileName)
{
    $array = [];

    foreach ($contentCSV as $line) {
        $data = [];
        foreach ($headersCSV as $key => $value) {
            $data[mb_strtoupper($value)] = $line[$key];
        }

        $array[] = $data;
    }

    // Filename
    $now     = date('dmYHms');
    $filename = $fileName . ' ' . $now . '.csv';

    // Force CSV Download
    headersToForceDownload($filename);
    echo createCSV($array);
    exit;
}

/**
 * Configure Headers to force CSV file download.
 * @param $filename
 * @return void
 */
function headersToForceDownload($filename) {
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Type: application/csv");
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}

/**
 * Generates CSV file based on Array.
 * @param array $array
 * @return false|string|null
 */
function createCSV(array &$array)
{
    if (count($array) == 0) {
        return null;
    }

    ob_start();

    $file = fopen("php://output", 'w');

    fwrite($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

    fputcsv($file, array_keys(reset($array)), ";");

    foreach ($array as $row) {
        $row = preg_replace('/(?<=^|;)"(.+)"(?=;)/','$1',$row);
        fputcsv($file, $row, ";");
    }

    fclose($file);

    return ob_get_clean();
}
