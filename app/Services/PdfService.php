<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class PdfService {

    public function count_page_number(?UploadedFile $file) 
    {
        $pdftext = file_get_contents($file);

        $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);

        return $num;
    }
}