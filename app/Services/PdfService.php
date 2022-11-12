<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class PdfService {

    /**
     * Count the number of pages inside a PDF file
     * 
     * @param string $fileContents The content of the pdf file after being read
     * 
     * @return int
     */
    public function count_page_number($fileContents) 
    {
        $num = preg_match_all("/\/Page\W/", $fileContents, $dummy);

        return $num;
    }
}