<?php
$conn=mysqli_connect("localhost","root","root","projecte");

if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
}