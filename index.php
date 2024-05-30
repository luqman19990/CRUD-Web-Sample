<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <!-- Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>List of clients</h1>
        <a class="btn btn-primary" href="create.php" role="button">New client</a>
        <br><br>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created at</th>
                    <th>Action</th>                                
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "myshop";
                    
                    // Create connection
                    $connection = new mysqli($servername, $username, $password, $database);
                    
                    // Check connection
                    if ($connection->connect_error) {
                        die("Connection failed: " . $connection->connect_error);
                    }
                    
                    $sql = "SELECT * FROM clients";
                    $result = $connection->query($sql);
                    
                    if (!$result) {
                        die("Invalid query: " . $connection->error);
                    }
                    
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['created_at']}</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='edit.php?id={$row['id']}'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='delete.php?id={$row['id']}'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS from CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
