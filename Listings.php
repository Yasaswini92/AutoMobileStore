<?php
include("header.php");
include("navbar.php");
include("database_config.php");

$collection = $db->vehicles;



?>

<html>
    <head>
        <title> listings main page</title>
        <style>
            ul.listings li 
            {
                width: 200px;
                height: 150px;
                display: inline-block;
                vertical-align: top;
            }
            .img {
   				 position: relative;
    			float: left;
   			    width:  280px;
    			height: 160px;
   			    background-position: 50% 50%;
    			background-repeat:   no-repeat;
    			background-size:     cover;
				}
				#box {
    padding: 0;
    border: 0;
    background: #fff;
    margin-bottom: 30px;
    box-shadow: 0 0 1px 0 #ddd;
    color: #333;
}
        </style>
    </head>
    <body>
        <div class="container" style="margin-top:20px;">
        <form class="form-inline">


            <input type="text" name="id" class="form-control box" placeholder="Keyword">

            <input type="text" name="make" class="form-control box" placeholder="Make">

            <input type="text" name="type" class="form-control box" placeholder="Type">

            <input type="text" name="price" class="form-control box" placeholder="Price">


            <button class="btn btn-warning" name="search" type="submit">
                    Search
            </button>

        </form>
        
        <?php
        
            if(isset($_GET['make'], $_GET['type'], $_GET['price']))
            {
              
                if($_GET['price'] != null)
                    $price = intval($_GET['price']);

                if(($_GET['make'] == null) && ($_GET['type'] == null) && ($_GET['price'] == null))
                {
                
                    $cursor = $collection->find();
                    filter($cursor);
                }
                else if(($_GET['make'] != null) && ($_GET['type'] != null) && ($_GET['price'] != null))
                {
                   
                    $cursor = $collection->find(array("make" => $_GET['make'], "type" => $_GET['type'], "price" => $price));
                    filter($cursor);

                }

                else if(($_GET['make'] != null) && ($_GET['type'] != null))
                {  
                    
                    $cursor = $collection->find(array("make" => $_GET['make'], "type" => $_GET['type']));   
                    filter($cursor);
                }

                else if(($_GET['make'] != null) && ($_GET['price'] != null))
                {
                  
                    $cursor = $collection->find(array("make" => $_GET['make'], "price" => $price));
                    filter($cursor);
                }

                else if(($_GET['type'] != null) && ($_GET['price'] != null))
                {
                    
                    $cursor = $collection->find(array("type" => $_GET['type'], "price" => $price));
                    filter($cursor);
                }

                else if($_GET['make'] != null) 
                {
                   
                    $cursor = $collection->find(array("make" => $_GET['make']));
                    filter($cursor);
                }

                else if($_GET['type'] != null)
                {
                    
                    $cursor = $collection->find(array("type" => $_GET['type']));
                    filter($cursor);
                }

                else if($price != null)    
                {
                    
                    $cursor = $collection->find(array("price" => $price));
                    filter($cursor);
                }

            }
        ?>
        
        
			
        <?php
            function filter($new_cursor)
            {
                $counter = 0;
    
                foreach ($new_cursor as $obj) 
                {
                          
                    if (($counter % 1) == 0)
                    {
        ?>
                        
                        <div class="row" id="box">
        <?php
                    }
        ?>
                        
                            <div class="col-lg-2">
                            </div>
                            <div class="col-lg-4">
                            
                                <img src="img/<?php echo $obj['make'];?>.jpeg" alt="..." class="img">
                                </div>
                                <div class="col-lg-4">
                                  <div class="caption">
                                        <h4><?php echo $obj['make']; ?></h4>
                                        <p><?php echo " ".$obj['model']." "; ?></p>
                                        <p><?php echo " $".$obj['price']; ?></p>                                        
                                        <?php 
                                         $id = $obj['id']; 
                                            $uid = $obj['uid'];   
                                        ?>
                                        <a href="ListingDetail.php?id=<?php echo $id; ?>&uid=<?php echo $uid; ?>" class="btn btn-warning" role="button">More Details</a> 
                                  </div>
                                  </div>
                                  <div class="col-lg-2">
                                  </div>
                              
                           
                        
        
        <?php
                    $counter = $counter + 1;
                    
                    if (($counter % 1) == 0)
                    {
        ?>
                        </div> 
        <?php
                    }
                    
                } 
        
            }
        ?>
        
        </div>
    </body>
</html>