<?php include "includes/header.php" ;?>

    <div id="wrapper">

        <!-- Navigation -->
       
        <?php include "includes/navigation.php" ;?>
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                  <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                       
                    </div>
                    
                  <div class="col-xs-6">
                    <?php   // ADD Categories
                    
                      insert_categories();
         
                     ?> 
                     
                     
        <form action="" method="post">

      <div class="form-group">
          <label for="cat-title">Add Categories</label>
          <input type="text" class="form-control" name="cat_title">


      </div>
      <div class="form-group">


          <input type="submit" name="submit" value="Add category"  class="btn btn-primary">


      </div>


  </form>

                     
                     
                      <?php
                      
                      if(isset($_GET['edit'])){
                      
                          $the_cat_id  =$_GET['edit'];
                          
                          
                      include "includes/update_categories.php" ;
                      
                      }
                      ?>    
                      
                  </div>
                  
                  <div class="col-xs-6">
                     
                     
                     
                      
                      <table class="table table-bordered table-hovered">
                          
                          <thead>
                              <tr>
                                  <th>Category Id</th>
                                  <th>category name</th>
                                  
                              </tr>
                          </thead>
                          <tbody>
                             <?php // Find ALL Categories
                            Findallcategories();
                      
                              ?>
                      
                          </tbody>
                      
                      </table>
                      
                      
                      <?php  // Delete Categories
                      
                       deletecategories();
                      ?>
                      
                  
                  </div>
               
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

       <?php include "includes/footer.php" ;?>