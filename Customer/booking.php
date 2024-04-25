<?php
include './header.php'

?>
<!DOCTYPE html>
<html>
<head>
  <title>Restaurant Table Booking</title>
  <style>
    h2{
      font-style: oblique;
      flex-direction: column-reverse;
      text-align: center;
    }
    body{
      background-color:rgb(220, 196, 182);
    }
    table {
      border-collapse: collapse;
      width: 50%;
      margin: 20px auto;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: palevioletred;
      font-weight: bold;
    }
    input[type="text"],
    input[type="email"],
    input[type="date"],
    select {
      width: 100%;
      padding: 8px;
      margin: 5px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: yellowgreen;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h2>Restaurant Table Booking</h2>
  <form action="./bookingadd.php" method="post">
    <table>
      <tr>
        <th><label for="name">Name:</label></th>
        <td><input type="text" id="name" name="name" required></td>
      </tr>
      <tr>
        <th><label for="email">Email:</label></th>
        <td><input type="email" id="email" name="email" required></td>
      </tr>
      <tr>
        <th><label for="date">Date:</label></th>
        <td><input type="date" id="date" name="date" required></td>
      </tr>
      <tr>
        <th><label for="time">Time:</label></th>
        <td><input type="time" id="time" name="time" required></td>
      </tr>
      <tr>
        <th><label for="guests">Number of Guests:</label></th>
        <td><input type="number" id="guests" name="guests" min="1" required></td>
      </tr>
      <tr>
        <th><label for="specialRequest">Special Requests:</label></th>
        <td><textarea id="specialRequest" name="specialRequest" rows="4" cols="40"></textarea></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align: center;">
          <input type="submit" value="submit" name="submit">
        </td>
      </tr>
    </table>
  </form>
</body>
</html>