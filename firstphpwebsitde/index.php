<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Website</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #f9f9f9;
}

h1 {
    color: #4CAF50;
    text-align: center;
}

form {
    margin-bottom: 20px;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: center;
}

input {
    padding: 10px;
    margin-right: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: #fff;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}
</style>
<body>
    <h1>My First PHP CRUD Website - MySQL</h1>
    <form action="" method="POST">
        <input type="hidden" name="id" id="userId">
        <input type="text" name="name" id="userName" placeholder="Enter Name" required>
        <input type="email" name="email" id="userEmail" placeholder="Enter Email" required>
        <button type="submit" name="action" value="add">Add</button>
        <button type="submit" name="action" value="update" style="display:none;">Update</button>
    </form>
    <table >
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $server = "localhost";
            $username = "root";
            $password = "";
            $conn = new mysqli($server, $username, $password, "firstdb");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $action = $_POST['action'];
                if ($action == 'add') {
                    $sql = "INSERT INTO users (Username, Email) VALUES ('$name', '$email')";
                } elseif ($action == 'update') {
                    $sql = "UPDATE users SET Username='$name', Email='$email' WHERE Id=$id";
                }
                if ($conn->query($sql) === TRUE) {
                    header('Location: index.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            if (isset($_GET['delete'])) {
                $id = $_GET['delete'];
                $sql = "DELETE FROM users WHERE Id=$id";
                if ($conn->query($sql) === TRUE) {
                    header('Location: index.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['Username']}</td>
                            <td>{$row['Email']}</td>
                            <td>
                                <button onclick=\"editUser({$row['Id']}, '{$row['Username']}', '{$row['Email']}')\">Edit</button>
                                <button onclick=\"deleteUser({$row['Id']})\">Delete</button>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No records found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    <script>
        function deleteUser(userId) {
            if (confirm('Are you sure you want to delete this user?')) {
                window.location.href = 'index.php?delete=' + userId;
            }
        }
        function editUser(id, name, email) {
            document.getElementById('userId').value = id;
            document.getElementById('userName').value = name;
            document.getElementById('userEmail').value = email;
            document.querySelector('button[value="add"]').style.display = 'none';
            document.querySelector('button[value="update"]').style.display = 'inline-block';
        }
    </script>
</body>
</html>