
<?php
include('include/db.php');

$result = null; 

$destinations = [
    'goa' => 'Goa',
    'kerala' => 'Kerala',
    'mysore' => 'Mysore',
    'ladakh' => 'Ladakh',
    'agra' => 'Taj Mahal',
    'india_gate' => 'India Gate',
    'hampi' => 'Hampi',
    'rajasthan' => 'Rajasthan',
    'manali' => 'Manali',
    'srinagar' => 'Srinagar',
    'amritsar' => 'Amritsar',
    'jogfalls' => 'Jog Falls'
];

if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    // $query = "SELECT * FROM `information` WHERE pname LIKE '%$search%'";
    $query = "
        SELECT i.*, t.latitude, t.longitude 
        FROM information i 
        JOIN tourism_spots t ON i.spot_id = t.spot_id 
        WHERE i.pname LIKE '%$search%'
    ";
} else {
    
    foreach ($destinations as $key => $name) {
        if (isset($_POST[$key])) {
            $query = "
                SELECT i.*, t.latitude, t.longitude 
                FROM information i 
                JOIN tourism_spots t ON i.spot_id = t.spot_id 
                WHERE i.pname = '$name'
            ";
            break;
        }
    }
}

if (isset($query)) {
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (isset($_POST['search']) && mysqli_num_rows($result) == 0) {
        echo "<script>alert('No result found!'); window.history.back();</script>";
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/places.css">
    <title>Information</title>
</head>
<body>
    <div class="hedder">
        <h1>Place Information</h1>
    </div>

    <div class="container">
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="description-container">
                    <hr width="100%" color="black">

                    <div class="box1">
                        <img src="<?php echo $row['pi_main']; ?>" alt="<?php echo $row['pname']; ?> Image" style="width: auto; height: 302px;">
                    </div>

                    <div class="description">
                        <h1><?php echo $row['pname']; ?></h1>
                        <p style="text-align: justify;"><?php echo $row['pdescription']; ?></p>
                    </div>
                       
                    <a href="r4.php?lat=<?php echo urlencode($row['latitude']); ?>&lng=<?php echo urlencode($row['longitude']); ?>&name=<?php echo urlencode($row['pname']); ?>" 
                       style="top: -20px; float: right; margin-right: 27%;">
                        View Route
                    </a>  
                </div>

                <div class="image-container" style="border: 1px solid black;">
                    <div class="box">
                        <div class="imgBox">
                            <img src="<?php echo $row['pi1']; ?>" alt="<?php echo $row['pname']; ?> Image 1" style="width: auto; height: 270px;">
                        </div>
                    </div>
                    <div class="box">
                        <div class="imgBox">
                            <img src="<?php echo $row['pi2']; ?>" alt="<?php echo $row['pname']; ?> Image 2" style="width: auto; height: 270px;">
                        </div>
                    </div>
                    <div class="box">
                        <div class="imgBox">
                            <img src="<?php echo $row['pi3']; ?>" alt="<?php echo $row['pname']; ?> Image 3" style="width: auto; height: 270px;">
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No information available for the selected place.</p>
        <?php endif; ?>
    </div>
</body>
</html>
