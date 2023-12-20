<?php
include_once '../../login/connect_db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>UpLoad-Image</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <form action="add_news.php" method="POST" enctype="multipart/form-data">
                    <div class="p-4 border-2 border-dashed rounded-3">
                        <h6 class="my-2">เพิ่มข่าว</h6>
                        <input type="file" name="file" class="form-control streched-link" accept="image/gif, image/jpeg, image/png" style="width: 30rem;">
                        <p class="small md-0 mt-2"><b>Note:</b>Only JPG, JPEG, PNG & GIF files allowed to upload.</p>
                        <label for="name">หัวข้อข่าว:</label>
                        <input type="text" id="name" name="namenews" required style="width: 25rem; height: 2.3rem;">
                        <div class="col-12 mt-3">
                        <label for="status">เนื้อหา:</label>
                        <input type="text" id="status" name="descript" required style="width: 75rem; height: 2.3rem;">
                        </div>
                    </div>
                    <div class="d-sm-flex justify-content-left mt-2">
                        <input type="submit" name="submit" value="Upload" class="btn btn-sm btn-primary mb-3">
                    </div>
                </form>
            </div>

        </div>
        <div class="row">
            <?php
            if (!empty($statusMsg)) { ?>
                <div class="alert alert-secondary" role="alert">
                    <?php
                    echo $statusMsg;
                    ?>
                </div>
            <?php }
            ?>
        </div>
        <div class="row g-2">
            <?php
            $query = $db->query("SELECT * FROM news ORDER BY uploaded_news DESC");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    $imageURL = 'upload/' . $row['image_news'];
            ?>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="card shadow m-2">
                            <img src="<?php echo $imageURL ?>" alt="" class="card-img">
                            <div class="card-body">
                                <h5 class="card-title">หัวข้อข่าว: <?php echo $row['name_news']; ?></h5>
                                <p class="card-text">เนื้อหา: <?php echo $row['descript_news']; ?></p>
                                <!-- Edit button -->
                                <a href="edit_news.php?id=<?php echo $row['id_news']; ?>" class="btn btn-primary">Edit</a>
                                <!-- Delete button -->
                                <a href="delete_news.php?id=<?php echo $row['id_news']; ?>" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <p>No image found...</p>
            <?php
            }
            ?>
        </div>

    </div>
</body>

</html>