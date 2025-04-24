<?php
//require "../DBConnection/DBConnectionConfig.php";
// session_start();

// $dbhost = "localhost:8080";
// $dbuser = "root";
// $bdpass = "";
// $dbname = "smulib";

// $connection = mysqli_connect($dbhost, $dbuser, $bdpass, $dbname);
// if(!$connection) {
// 	die("Could not connect: " . mysqli_error());
// }

// $sql = "select EventsDate, EventTime, EventName, EventDescription, EventLocation from calendar_events order by EventsDate, EventTime";
// //echo $sql;

// $data = mysqli_query($connection, $sql);
// $connection -> close();

//     header("Content-Type: application/json");
//     echo json_encode($data);
// 


// require "../DBConnection/DBConnectionConfig.php";
session_start();

//$filtdate = $_GET['filter']; // Get the filter date from the URL parameterS
//if ($filtdate == null) 
//{/
 //   $filtdate = '20251604 00:00:00'; // Default date if not provided
//}
$dbhost = "localhost"; // don't include the port like localhost:8080 unless your MySQL is actually on that port
$dbuser = "root";
$bdpass = "";
$dbname = "smulib";

// Establish DB connection
$connection = mysqli_connect($dbhost, $dbuser, $bdpass, $dbname);
if (!$connection) {
    http_response_code(500);
    die(json_encode(["error" => "Database connection failed: " . mysqli_connect_error()]));
}

$selectedDate = isset($_GET['date']) ? $_GET['date'] : null;

if ($selectedDate) {
    // Correctly prepare and bind
    $sql = "SELECT EventsDate, EventTime, EventName, EventDescription, EventLocation 
            FROM calendar_events 
            WHERE EventsDate = ?
            ORDER BY EventsDate, EventTime;";
    
    $stmt = mysqli_prepare($connection,$sql);
    if (!$stmt) {
        http_response_code(500);
        die(json_encode(["error" => "Failed to prepare statement: " . mysqli_error($connection)]));
    }
    $stmt -> bind_param("s", $selectedDate);
    
    
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
} else {
    // If no selected date, just get all events
    $sql = "SELECT EventsDate, EventTime, EventName, EventDescription, EventLocation 
            FROM calendar_events 
            ORDER BY EventsDate, EventTime";
    $result = mysqli_query($connection, $sql);
}

if (!$result) {
    http_response_code(500);
    die(json_encode(["error" => "Query failed: " . mysqli_error($connection)]));
}

$events = [];
while ($row = mysqli_fetch_assoc($result)) {
    $events[] = $row;
}

$connection->close();

header("Content-Type: application/json");
echo json_encode($events);
exit();

// // SQL query
// $sql = "SELECT EventsDate, EventTime, EventName, EventDescription, EventLocation FROM calendar_events WHERE EventsDate = ? ORDER BY EventsDate, EventTime";
// $result = mysqli_query($connection, $sql);
// echo mysqli_error($connection); // Debugging line to check for SQL errors
// if (!$result) {
//     http_response_code(500);
//     die(json_encode(["error" => "Query failed: " . mysqli_error($connection)]));
    
// }

// // Fetch data into an array
// $events = [];
// while ($row = mysqli_fetch_assoc($result)) {
//     $events[] = $row;
// }

// $connection->close();

// // Send JSON response
// header("Content-Type: application/json");
// http_response_code(200); // Always successful even if no events
// echo json_encode($events);
// exit();

?>
 