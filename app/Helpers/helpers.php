<?php

if (!function_exists('formatRupiah')) {
    /**
     * Format angka ke dalam format Rupiah.
     *
     * @param int|float $angka
     * @return string
     */
    function formatRupiah($angka)
    {
        $number_string = number_format($angka, 0, ',', '.');
        return 'Rp ' . $number_string;
    }
}

if (!function_exists('someOtherHelperFunction')) {
    /**
     * Contoh fungsi helper lainnya.
     *
     * @param string $input
     * @return string
     */
    function someOtherHelperFunction($input)
    {
        // Tambahkan logika sesuai kebutuhan Anda
        return strtoupper($input);
    }
}
