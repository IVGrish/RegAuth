<?php
session_start();

if (!isset($_SESSION['name'])) {
    header('Location: index.php');
}
echo "<head>
        <title>RegAuth</title>
      </head>";

echo "<h1 style='display: flex;
                 justify-content: center; 
                 margin-top: 10vh'
         >Hello, {$_SESSION['name']}</h1>";

echo "<a style='margin-top: 15px;
                color: #7c9ab7;
                font-weight: bold;
                text-decoration: none;
                display: flex;
                justify-content: center;
                font-size: 18px;' 
         href='logout.php'>Exit</a>";
