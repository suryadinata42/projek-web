<?php
function dateID($tanggal)
{
    if (empty($tanggal) || $tanggal == '0000-00-00') {
        return '-';
    }
    $bulan = array(
    1 => 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agst',
    'Sep', 'Okt', 'Nov', 'Des'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
