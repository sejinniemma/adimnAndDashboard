<?php
class DB {
    protected static function launchQuery($sql) {
        $DBServer = "localhost";  //수정해주세요   
        $username = "root";  //수정해주세요   
        $pass = "";  //수정해주세요   
        $dbName = "eco_project_db";

        $dbCon = new mysqli($DBServer, $username, $pass, $dbName);

        if($dbCon->connect_error){
            die("Connection failed. ".$dbCon->connect_error);
        }

        $resultado = null;
        if (isset($dbCon)) $resultado = $dbCon->query($sql);
        $dbCon->close(); // Closed the database conection

        return $resultado;
    }

    public static function getUser($email, $pass){
        $selectQuery = "SELECT * FROM users WHERE email='$email' AND pass='$pass'";
        $result = self::launchQuery($selectQuery);
        if($result->num_rows == 1){
            $query = $result->fetch_assoc();
            $user = new User($query['user_id'],$query['email'],$query['user_type']);
            return $user;
        } else {
            return null;
        }
    }



    public static function getAllNews(){
        $selectQuery = "SELECT * FROM news ORDER BY date ASC";
        $result = self::launchQuery($selectQuery);
        $returnQuery = array();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $news = new News($row['news_id'], $row['title'], $row['date'], $row['content'],$row['email_author']);
                array_push($returnQuery, $news);
            }
        }
        return $returnQuery;
    }

    public static function getNews($news_id){
        $selectQuery = "SELECT * FROM news WHERE news_id = '".$news_id."'";
        $result = self::launchQuery($selectQuery);

        if($result->num_rows == 1){
            while($row = $result->fetch_assoc()){
                $news = new News($row['news_id'], $row['title'], $row['date'], $row['content'], $row['email_author']);
            }
            return $news;
        } else {
            echo null;
        }
    }

    public static function deleteNew($news_id){
        $selectQuery = "DELETE FROM news WHERE news_id = '".$news_id."'";
        $result = self::launchQuery($selectQuery);

        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public static function updateNews($news_id, $title, $date, $email_author, $content){
        $selectQuery = "UPDATE news SET title = '".$title."', date = '".$date."', email_author = '".$email_author."', content = '".$content."' WHERE news_id = '".$news_id."'";
        $result = self::launchQuery($selectQuery);

        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public static function insertNews($title, $date, $email_author, $content){
        $insertQuery = "INSERT INTO news (title, date, email_author, content) VALUES('$title', '$date', '$email_author', '$content')";

        if(self::launchQuery ($insertQuery) === TRUE){
            return true;
        } else {
            return false;
        }
    }

}
?>