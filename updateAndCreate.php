<?php
include('./DB.php');
include('./News.php');
include('./User.php');
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location:admin.php");
    }
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
        
        if(!isset($_POST['news_id'])){
            echo "<title>Create News</title>";
        } else {
            echo "<title>Update New</title>";
            $news = DB::getNews($_POST['news_id']);
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
        <form action="updateAndCreate.php" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" value="<?php echo $title?>" class="form-control" id="title" name="title" required />
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" value="<?php echo $date?>" class="form-control" id="date" name="date" required />
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="3"
                    required><?php echo $content?> </textarea>
            </div>
            <?php
                if(!isset($_POST['news_id'])){
                    echo "<button type='submit' id='btn-create' value='new' name='new' class='btn btn-primary mt-4'>Enroll</button>";
                    
                } else {
                    echo "<button type='submit' id='btn-update' value='".$_POST['news_id']."' name='update' class='btn btn-primary mt-4'>Update</button>";
                }
            ?>
        </form>
    </div>
    <?php
     if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['new'])){
            $title = $_POST['title'];
            $date = $_POST['date'];
            $content = $_POST['content'];
            $email_author = $_SESSION['user']->getEmail();
            $result = DB::insertNews($title, $date, $email_author, $content);
            if($result){
                header("Location:dashboard.php");
            } else {
                echo "Error : Save the data to database";
            }
        } else if(isset($_POST['update'])){
            $title = $_POST['title'];
            $date = $_POST['date'];
            $content = $_POST['content'];
            $email_author = $_SESSION['user']->getEmail();
            $result = DB::updateNews($_POST['update'], $title, $date, $email_author, $content);
            if($result){
                header("Location:dashboard.php");
            } else {
                echo "Error : Save the data to database";
            }
        } else if(isset($_POST['remove'])){
            // $title = $_POST['title'];
            $news_id = $_POST['remove'];

            $result = DB::deleteNew($news_id);
            if($result){
                header("Location:dashboard.php");
            } else {
                echo "Error : To remove news from database";
            }
        }
    }

    ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>