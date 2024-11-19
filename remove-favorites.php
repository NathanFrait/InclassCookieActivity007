<?php
session_start();

if (isset($_GET['PaintingID'])) {
    $paintingID = $_GET['PaintingID'];

    if (isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = array_filter($_SESSION['favorites'], function ($favorite) use ($paintingID) {
            return $favorite['PaintingID'] != $paintingID;
        });
    }
} elseif (isset($_GET['action']) && $_GET['action'] === 'clear') {
    // Clear all favorites
    unset($_SESSION['favorites']);
}

// Redirect back to favorites page
header('Location: view-favorites.php');
exit;
?>