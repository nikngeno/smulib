<?php
// search_books.php

function searchBooks(mysqli $conn, string $searchType, string $query): array {
    // Map search type to column
    $colMap = [
        'keyword' => 'title', 
        'title'   => 'title',
        'author'  => 'author',
        'genre'   => 'genre'
    ];
    $col = $colMap[$searchType] ?? 'title';

    $sql = "SELECT title, author, price, cover_path, summary
            FROM books
            WHERE $col LIKE ?";
    $stmt = $conn->prepare($sql);
    $like = "%$query%";
    $stmt->bind_param('s', $like);
    $stmt->execute();
    $result = $stmt->get_result();

    $books = [];
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
    $stmt->close();
    return $books;
}
