<?php
// This is the actual HTML template.
// As requested, it uses basic PHP for templating and includes Tailwind CSS classes.

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <!-- Use Tailwind CSS via CDN for development. -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      /* Optional: You can add custom styles here if needed. */
      @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');
      body {
        font-family: 'Inter', sans-serif;
      }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-lg max-w-lg w-full text-center">
        <h1 class="text-3xl font-bold text-gray-800 mb-4"><?= htmlspecialchars($page_title) ?></h1>
        <p class="text-gray-600 mb-6"><?= htmlspecialchars($message) ?></p>
        <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4">
            <a href="#" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105">
                Get Started
            </a>
            <a href="#" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105">
                Learn More
            </a>
        </div>
    </div>
</body>
</html>