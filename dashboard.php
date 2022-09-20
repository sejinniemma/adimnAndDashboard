 <?php 
 include('./DB.php');
 include('./News.php');
include('./User.php');
session_start();
    if(!isset($_SESSION['user'])){
        header("Location:admin.php");
    }
    $news = DB::getAllNews();
?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <style>
     h1 {
         text-align: center;
     }
     </style>
     <!-- CSS only -->
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
 </head>

 <body>

     <div class="container mt-4">
         <h1>Notice</h1>
         <div class="row">
             <div class="col-md-4">
                 <div class="card ">
                     <div class="card-body">
                         <div class="input-group mb-0">
                             <input type="text" class="form-control" placeholder="Search..."
                                 aria-describedby="project-search-addon" />
                             <div class="input-group-append">
                                 <button class="btn btn-danger" type="button" id="project-search-addon"><i
                                         class="fa fa-search search-icon font-12"></i></button>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-6"></div>
             <div class="col-md-2 text-center m-auto">
                 <form action="admin.php" method="post">
                     <button type='submit' id='btn-create' value='logout' name='logout'
                         class='btn bg-secondary text-light mt-2 mb-2 p-1 '>Logout</button>
                 </form>
                 <a href="updateAndCreate.php" class="btn btn-primary text-light"><i class="fa fa-plus"></i>
                     Write</a>
             </div>
         </div>

         <!-- end row -->
         <div class="row">
             <div class="table-responsive project-list">
                 <form action="updateAndCreate.php" method="post">
                     <table class="table project-table table-centered table-nowrap">
                         <thead>
                             <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Title</th>
                                 <th scope="col">Date</th>
                                 <th scope="col">Author</th>
                                 <th scope="col">Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                if(empty($news)){
                                    echo "<tr><td colspan='5' class='text-center'>We haven't got any news</td></tr>";
                                }else {

                                    foreach($news as $new){
                                        echo "<tr>";
                                      
                                        echo "<td><a class='text-reset text-decoration-none' href='read_board.php?id=".$new->getId()."'>".$new->getId()."</a></td>";
                                        echo "<td><a class='text-reset text-decoration-none' href='read_board.php?id=".$new->getId()."'>".$new->getTitle()."</a></td>";
                                        echo "<td><a class='text-reset text-decoration-none' href='read_board.php?id=".$new->getId()."'>".$new->getDate()."</a></td>";
                                        echo "<td><a class='text-reset text-decoration-none' href='read_board.php?id=".$new->getId()."'>".$_SESSION['user']->getUserType()."</a></td>";
                                        
                                       
                                        echo "<td>
                                        <div class='action'>
                                                 <button type='submit' value='".$new->getId()."' name='news_id' class='text-success mr-4' data-toggle='tooltip'
                                                     data-placement='top' title='' data-original-title='Edit'> <i
                                                         class='fa fa-pencil h5 m-0'></i></button>
                                                 <button class='text-danger' data-toggle='tooltip'
                                                     data-placement='top' value='".$new->getId()."' name='remove' data-original-title='Close'> <i
                                                         class='fa fa-remove h5 m-0'></i></button>
                                             </div>
                                        </td>";
                                  
                                        echo "</tr>";
                                    }

                                }
                            ?>
                         </tbody>
                     </table>
                 </form>
             </div>
         </div>
     </div>

     <!-- JavaScript Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js">

     </script>
 </body>

 </html>