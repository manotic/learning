<?php
declare(strict_types=1);

namespace App\Model;

class TestModel
{
    public function getData(): array
    {
        $filePath = __DIR__ ."/../../sample.csv";

        if (!file_exists($filePath)) {
            echo "File is not found at: " . $filePath;
        } else {
            $file = fopen($filePath, "r");
            $data = [];
            while (($line = fgetcsv($file)) !== false) {
                $data[] = $line;
            }
            fclose($file);
        } 

        // In a real application, this would fetch data from a database,
        // an API, or a file. For this example, we'll return a simple array.
        return [
            'page_title' => 'Welcome to test page',
            'message' => 'This is a custom-built PHP application using Symfony Routing and an MVC design pattern.',
            'data' => $data,
        ];
    }
}