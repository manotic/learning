<?php
// This is a simple view class that prepares and renders the HTML.
// It directly includes the template file.

declare(strict_types=1);

namespace App\View;

class HomeView
{
    public function render(array $data): string
    {
        // Start output buffering to capture the HTML content from the template.
        ob_start();

        // Pass data to the template.
        extract($data);

        // Include the actual HTML template file.
        require __DIR__ . '/../../resource/template/home.php';

        // Get the captured HTML content and clean the buffer.
        return ob_get_clean();
    }
}