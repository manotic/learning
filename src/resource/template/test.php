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


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <?php
                foreach ($data[0] as $header) {
                    echo "<th class=\"px-6 py-3\">$header</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $netIncome = 0;
            $expenses = 0;
            for ($i = 1; $i < count($data); $i++) {
                echo "<tr class=\"bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600\">";
                    foreach ($data[$i] as $key => $cell) {
                        echo "<td class=\"px-6 py-4\">$cell</td>";
                        if ($key === 3) {
                            $cell = str_replace(['$'], '', $cell);
                            if (intval($cell) > 0 ) {
                                $netIncome += intval($cell);
                            } else {
                                $expenses += intval($cell);
                            }
                        }
                    }
                echo "</tr>";
            }
                    $netTotal = $netIncome + $expenses;
            echo "<tr class=\"bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600\">";
                echo "<td class=\"px-6 py-4 font-bold\" colspan=\"3\">Net Income</td>";
                echo "<td class=\"px-6 py-4 font-bold\">$" . number_format($netIncome, 2) . "</td>";
            echo "</tr>";
            echo "<tr class=\"bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600\">";
                echo "<td class=\"px-6 py-4 font-bold\" colspan=\"3\">Expenses</td>";
                echo "<td class=\"px-6 py-4 font-bold\">$" . number_format($expenses, 2) . "</td>";
                echo "</tr>";
                
            echo "<tr class=\"bg-white border-b dark:bg-orange-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600\">";
                echo "<td class=\"px-6 py-4 font-bold\" colspan=\"3\">Net total</td>";
                echo "<td class=\"px-6 py-4 font-bold\">$" . number_format($netTotal, 2) . "</td>";
                echo "</tr>";

            ?>
        </tbody>
    </table>
</div>

</body>
</html>