<?php


function getUsersAsTable(){
    global $conn;
    $totalUsers = 0;
    if ($_SESSION['role'] == 'admin') {
        $sessionId = $_SESSION['id'];
        $sql = "SELECT * FROM user WHERE id !='$sessionId'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            
            echo '<table class="table table-striped table-hover">';
            echo '<thead>
                    <tr>
                      <th scope="col">id</th>
                      <th scope="col">Firstname</th>
                      <th scope="col">Lastname</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Email</th>
                      <th scope="col">Password</th>
                      <th scope="col">Role</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>';
        
            // Loop through the user records
            while ($row = mysqli_fetch_assoc($result)) {
                // Increment the total users count
                $totalUsers++;
        
                // Start a new row in the table
                echo "<tr>
                        <th scope='row'>" . $row['id'] . "</th>
                        <td>" . $row['firstname'] . "</td>
                        <td>" . $row['lastname'] . "</td>
                        <td>" . $row['gender'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['password'] . "</td>
                        <td>" . $row['role'] . "</td>
                        <td>" . $row['status'] . "</td>
                        <td class='actions'>
                            <button class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#formModal' onclick='handleEdit(".json_encode($row).")'>Edit</button>
                            <form action='php/users/deleteUser.php' method='POST'> <input type='hidden' value=".$row['id']." name='id'> <button class='btn btn-danger' type='submit' name='deleteBtn'>Delete</button></form>
                            
                        </td>
                      </tr>";
            }
        
            // Close the table and display the total user count
            echo '</tbody>
                  </table>';
            echo '<p>Total Users found: ' . $totalUsers . '</p>';
        } else {
            echo 'No users found.';
        }
    
    
        
    } else {
        echo "You can't do that here";
    }

}




function getTotalUsers(){
    global $conn;
    $totalUsers = 0;
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $totalUsers = mysqli_num_rows($result);
    }
    return $totalUsers;
}

function getTotalFemaleUsers(){
    global $conn;
    $totalFemales = 0;
    $sql = "SELECT * FROM user WHERE gender='female'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $totalFemales = mysqli_num_rows($result);
    }
    return $totalFemales;
}

function getTotalMaleUsers(){
    global $conn;
    $totalMales = 0;
    $sql = "SELECT * FROM user WHERE gender='male'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $totalMales = mysqli_num_rows($result);
    }
    return $totalMales;
}

