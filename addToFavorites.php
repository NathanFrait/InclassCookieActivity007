<?php
session_start();

// Check if required fields are in the query string
if (isset($_GET['PaintingID'], $_GET['ImageFileName'], $_GET['Title'])) {
    $painting = [
        'PaintingID' => $_GET['PaintingID'],
        'ImageFileName' => $_GET['ImageFileName'],
        'Title' => $_GET['Title']
    ];

    // Initialize favorites array if not set
    if (!isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = [];
    }

    // Add painting to favorites (check for duplicates)
    foreach ($_SESSION['favorites'] as $favorite) {
        if ($favorite['PaintingID'] == $painting['PaintingID']) {
            // Already in favorites, redirect without adding
            header('Location: view-favorites.php');
            exit;
        }
    }

    $_SESSION['favorites'][] = $painting;
}

// Redirect to favorites page
header('Location: view-favorites.php');
exit;
?>