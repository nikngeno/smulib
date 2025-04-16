<?php
$students = array(
    // ID, Name, Grade
    array(1000, "Alice", 85),
    array(2000, "Bob", 92),
    array(3000, "Charlie", 78),
    array(4000, "Diana", 88),
    array(5000, "Ethan", 90),
    array(6000, "Fiona", 73),
    array(7000, "George", 95),
    array(8000, "Hannah", 81),
    array(9000, "Ian", 69),
    array(1000, "Jenny", 87)
);

// Calculate total and average
$total = 0;
foreach ($students as $student) {
    $total += $student[2]; // grade is at index 2
}
$average = $total / count($students);

// Display table
echo "<h2>Student Grades Table</h2>";
echo "<p>Average Grade: " . number_format($average, 2) . "</p>";

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>ID</th><th>Name</th><th>Grade</th><th>Above Average?</th></tr>";

foreach ($students as $student) {
    $aboveAverage = $student[2] > $average ? "Yes" : "No";
    echo "<tr>";
    echo "<td>{$student[0]}</td>";
    echo "<td>{$student[1]}</td>";
    echo "<td>{$student[2]}</td>";
    echo "<td>$aboveAverage</td>";
    echo "</tr>";
}

echo "</table>";
?>
