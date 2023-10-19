<?php 


function getActivitiesinMonth(){
    global $conn;
    $res = array();

$monthsQuery = "SELECT 'Jan' AS month
                UNION SELECT 'Feb'
                UNION SELECT 'Mar'
                UNION SELECT 'Apr'
                UNION SELECT 'May'
                UNION SELECT 'Jun'
                UNION SELECT 'Jul'
                UNION SELECT 'Aug'
                UNION SELECT 'Sep'
                UNION SELECT 'Oct'
                UNION SELECT 'Nov'
                UNION SELECT 'Dec'";


$sql = "SELECT 
            m.month AS month,
            IFNULL(COUNT(a.id), 0) AS count
        FROM ({$monthsQuery}) m
        LEFT JOIN activities a
        ON m.month = DATE_FORMAT(a.date, '%b')
        GROUP BY m.month
        ORDER BY FIELD(m.month, 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec')";

$result = mysqli_query($conn, $sql);

if ($result) {
 
    while ($row = mysqli_fetch_assoc($result)) {
        $res[] = $row['count'];
    }

    return json_encode($res);
} else {
    echo "Query failed: " . mysqli_error($conn);
}
}
