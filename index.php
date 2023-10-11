<!DOCTYPE html>
<html>
<head>
    <title>CRUD Example</title>
    <style>
        .body-font {
            font-family: Arial, sans-serif;
        }

        .input-field {
            padding: 5px;
            width: 100%;
        }

        .button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }

        .form-container {
            margin-bottom: 20px;
        }

        .data-table {
            border-collapse: collapse;
            width: 100%;
        }

        .data-table th, .data-table td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .data-table th {
            background-color: #f2f2f2;
        }

        .data-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .data-table tr:hover {
            background-color: #f1f1f1;
        }

    </style>
</head>
<body>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="input-field"><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" class="input-field"><br>
        <input type="submit" name="create" value="Create" class="button">
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Exam";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['create'])){
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $sql = "DELETE FROM users WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='data-table'><tr><th>ID</th><th>Name</th><th>Email</th><th>Action</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>
                  <form action='' method='post'>
                  <input type='hidden' name='id' value='".$row["id"]."'>
                  <input type='submit' name='delete' value='Delete' class='button'>
                  </form></td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</body>
</html>
