<?php

namespace App\Jobs;

use App\Models\Book;
use App\Services\PdfService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ProcessBook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     * 
     * @param string $path path of the file
     * @param array $data the data that was sent from the client
     *
     * @return void
     */
    public function __construct(private string $path, private array $data)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PdfService $pdfService)
    {
        // Retrieve the file that was uploaded
        $contents = Storage::get($this->path);
        
        // Store the data into the database
        Book::create([
            'title' => $this->data['title'],
            'description' => $this->data['description'],
            'price' => $this->data['price'],
            'pageNumber' => $pdfService->count_page_number($contents),
            'filePath' => str_replace('public', 'storage', $this->path),  // replace 'public' with 'storage'
            'category' => $this->data['category'],
            'language' => $this->data['language']
        ]);
    }
}
