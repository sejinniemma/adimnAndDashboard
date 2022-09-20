<?php
include('./DB.php');
include('./News.php');
include('./User.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php  
        $title = "";
        $date = "";
        $content = ""; 
        if(isset($_GET['id'])){
            $news = DB::getNews($_GET['id']);
            $title = $news->getTitle();
            $date = $news->getDate();
            $content = $news->getContent();
        }
    ?>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1>Notice</h1>
        <div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" value="<?php echo $title?>" class="form-control" id="title" readonly />
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" value="<?php echo $date?>" class="form-control" id="date" readonly />
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" rows="3" readonly><?php echo $content?> </textarea>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>