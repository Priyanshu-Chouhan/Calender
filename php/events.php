<?php
// events.php

include 'db.php';

// Function to add an event
function addEvent($date, $title, $description, $time) {
    global $conn;
    $sql = "INSERT INTO events (date, title, description, time) VALUES ('$date', '$title', '$description', '$time')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to fetch events for a specific date
function getEventsForDate($date) {
    global $conn;
    $sql = "SELECT * FROM events WHERE date = '$date'";
    $result = $conn->query($sql);
    $events = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
    }
    return $events;
}

// Function to update an event
function updateEvent($eventId, $newTitle, $newDescription, $newTime) {
    global $conn;
    $sql = "UPDATE events SET title='$newTitle', description='$newDescription', time='$newTime' WHERE id=$eventId";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to delete an event
function deleteEvent($eventId) {
    global $conn;
    $sql = "DELETE FROM events WHERE id=$eventId";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}
?>
