<?php
// This is a simple controller that handles requests to the home page.

declare(strict_types=1);

namespace App\Controller;

use PDO;
use App\View\Homeview;
use App\Model\HomeModel;

class HomeController
{
    public function index(): string
    {
        // try {
        //     $db = new PDO("mysql:host=db;dbname=my_db", "root", "rootfasf");
        // } catch (\PDOException $e) {
        //     throw new \PDOException($e->getMessage(),  $e->getCode());
        // }

        // var_dump($db);

        // 1. Model: Fetch or prepare data for the view.
        // In a real application, this would interact with a database.
        $model = new HomeModel();
        $data = $model->getData();
        // 2. View: Render the data into an HTML response.
        $view = new HomeView();
        return $view->render($data);
    }
}
