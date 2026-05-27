<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

$record_id = intval($_POST['record_id']);
$return_date = date('Y-m-d');

try {
    $conn->beginTransaction();

    // 1. Locate the record and get the associated book ID
    $stmt = $conn->prepare("SELECT book_id FROM borrow_records WHERE id = :record_id AND status = 'borrowed' FOR UPDATE");
    $stmt->execute([':record_id' => $record_id]);
    $record = $stmt->fetch();

    if ($record) {
        $book_id = $record['book_id'];

        // 2. Update status to returned and log the return date
        $updateLog = $conn->prepare("UPDATE borrow_records SET status = 'returned', return_date = :return_date WHERE id = :record_id");
        $updateLog->execute([
            ':return_date' => $return_date,
            ':record_id' => $record_id
        ]);

        // 3. Increment available book copies by 1
        $updateBook = $conn->prepare("UPDATE books SET available_copies = available_copies + 1 WHERE id = :book_id");
        $updateBook->execute([':book_id' => $book_id]);

        $conn->commit();
        header("Location: landing.php?return=success");
        exit;
    } else {
        $conn->rollBack();
        header("Location: landing.php?error=invalid_record");
        exit;
    }

} catch (PDOException $e) {
    $conn->rollBack();
    die("Return processing failed: " . $e->getMessage());
}
?>