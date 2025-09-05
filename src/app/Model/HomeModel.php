<?php
// This is a sample model that represents the application's data layer.

declare(strict_types=1);

namespace App\Model;

class HomeModel
{
    public function getData(): array
    {
        // In a real application, this would fetch data from a database,
        // an API, or a file. For this example, we'll return a simple array.
        return [
            'page_title' => 'Welcome to My App',
            'message' => 'This is a custom-built PHP application using Symfony Routing and an MVC design pattern.',
        ];
    }
}
