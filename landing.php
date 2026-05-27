<?php
session_start();
// Protect the dashboard from unauthorized guest visitors
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
require_once 'db.php';

// Fetch all book records where available copies are greater than zero
$stmt = $conn->query("SELECT * FROM books WHERE available_copies > 0");
$books = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Catalog Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; margin: 0; padding: 0; }
        .navbar { background: #343a40; color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        .navbar a { color: #ffc107; text-decoration: none; font-weight: bold; }
        .container { padding: 40px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 25px; margin-top: 20px; }
        .book-card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-top: 4px solid #007bff; }
        .book-card h3 { margin: 0 0 10px 0; color: #333; }
        .book-card p { margin: 5px 0; color: #666; font-size: 14px; }
        .badge { display: inline-block; background: #28a745; color: white; padding: 3px 8px; border-radius: 4px; font-size: 12px; }
    </style>
</head>
<body>

<div class="navbar">
    <span>Welcome, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong> (Student View)</span>
    <a href="logout.php">Logout</a>
</div>

<div class="container">
    <h2>Available Library Books Catalog</h2>
    <div class="grid">
        <?php if (count($books) > 0): ?>
            <?php foreach ($books as $book): ?>
                <div class="book-card">
                    <h3><?php echo htmlspecialchars($book['title']); ?></h3>
                    <p><strong>Author:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
                    <p><strong>ISBN:</strong> <?php echo htmlspecialchars($book['isbn']); ?></p>
                    <p><span class="badge">In Stock: <?php echo $book['available_copies']; ?> copies</span></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No books are currently available in the system catalog shelves.</p>
        <?php endif; ?>
    </div>
</div>
<!-- NEW SECTION: BORROWED BOOKS HISTORY TABLE -->
    <div style="padding: 0 40px 40px 40px;">
        <h2 style="margin-bottom: 20px; color: #333; border-bottom: 2px solid #ddd; padding-bottom: 10px;">My Borrowed Books</h2>
        
        <?php if (empty($borrowed_books)): ?>
            <p style="color: #666; font-style: italic;">You are not currently borrowing any books.</p>
        <?php else: ?>
            <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                <thead>
                    <tr style="background: #343a40; color: white; text-align: left;">
                        <th style="padding: 12px 15px;">Book Title</th>
                        <th style="padding: 12px 15px;">Author</th>
                        <th style="padding: 12px 15px;">Date Borrowed</th>
                        <th style="padding: 12px 15px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($borrowed_books as $record): ?>
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td style="padding: 12px 15px;"><?php echo htmlspecialchars($record['title']); ?></td>
                            <td style="padding: 12px 15px;"><?php echo htmlspecialchars($record['author']); ?></td>
                            <td style="padding: 12px 15px;"><?php echo htmlspecialchars($record['borrow_date']); ?></td>
                            <td style="padding: 12px 15px;">
                                <!-- Return Action Form -->
                                <form action="return.php" method="POST" style="margin: 0;">
                                    <input type="hidden" name="record_id" value="<?php echo $record['record_id']; ?>">
                                    <button type="submit" style="background: #dc3545; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-weight: bold;">Return Book</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>