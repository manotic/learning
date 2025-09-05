<?php

declare(strict_types=1);

namespace App\Controller;

use App\View\TestView;
use App\Model\TestModel;

class TestController
{
    public function index(): string
    {
        
        // 1. Model: Fetch or prepare data for the view.
        // In a real application, this would interact with a database.
        $model = new TestModel();
        $data = $model->getData();
        // 2. View: Render the data into an HTML response.
        $view = new TestView();
        return $view->render($data);
    }
}