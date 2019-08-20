<?php
include("header.php");
include("navbar.php");
include("database_config.php");


$collection = $db->vehicles;
$cursor = $collection->find(array("id" => intval($_GET['id'])));

$u_collection = $db->users;
$u_cursor = $u_collection->find(array("uid" => intval($_GET['uid'])));

?>

<html>
<head>
    <title>Description</title>
    <style>
        #picture_row
        {
            margin-top:20px;
            margin-left: 30px;
        }
        .carousel-inner > .item > img {
            height: 300px;
            width: 500px;
        }
        .form-request {
    margin-top: -200px;
    padding: 50px;
    background: #3d3938;
}
.box {
    position: relative;
}
.form-item {
    border: 1px solid #eee;
    height: 45px;
    padding: 0px 15px;
    background: #fff;
    outline: none;
    width: 100%;
    border-radius: 0px;
    box-shadow: none;
    color: #333;
    margin-bottom: 15px;
}
.btn {
    display: inline-block;
    padding: 10px 20px;
    background: #fff;
    color: #333;
    font-weight: 500;
    border-radius: 3px;
    margin-top: 10px;
}
.carousel-indicators {
    position: absolute;
    bottom: 10px;
    left: 49%;
    z-index: 15;
    width: 11%;
    padding-left: 0;
    margin-left: -30%;
    text-align: center;
    style: none;
    background-color: black;
}

.carousel-controls {
display: -ms-flexbox;
display: flex;
-ms-flex-pack: justify;
justify-content: space-between;
position: absolute;
width: 50%;
top: 43%;
}

 

.carousel-controls a {

background-color: rgba(255, 255, 255, 0.6);

color: #000;

padding: 10px 14px;

font-size: 30px;

}

.carousel-controls a:hover {

background-color: rgba(255, 255, 255, 0.9);

}
.table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color: #847a78; // 
    </style>
    
</head>
<body>
    <div class="container" margin-top:30px;>
        <div class="row"  id="picture_row">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img class="d-block img-fluid" src="img/Lexus.jpeg" alt="First slide">
                </div>
                <div class="item">
                  <img class="d-block img-fluid" src="img/Honda.jpeg" alt="Second slide">
                </div>
                <div class="item">
                  <img class="d-block img-fluid" src="img/ferrari.jpeg" alt="Third slide">
                </div>
              </div>
              <!--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>-->
    <div class="carousel-controls">

    <a href="#carouselExampleIndicators" data-slide="prev">

    <span class="glyphicon glyphicon-chevron-left"></span>

    </a>

   <a href="#carouselExampleIndicators" data-slide="next">

    <span class="glyphicon glyphicon-chevron-right"></span>

    </a>

    </div>
            </div>
            
        </div>
        
        
        
            <div class ="row">
                <div class = "col-sm-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th>Item</th>
                              <th>Details</th>
                            </tr>
                        </thead>
                    <?php 
                        foreach ($cursor as $obj)
                        {
                    ?>
                        <tbody>

                    <?php
                            foreach($obj as $key=>$value)
                            { 
                                if(($key != '_id') && ($key != 'id') && ($key != 'uid'))
                                {            
                    ?>
                                    <tr>
                                        <td><?php echo $key; ?></td>
                                        <td><?php echo $value; ?></td>
                                    </tr>
                    <?php 
                                }
                            }
                    ?>

                        </tbody>
                    <?php


                        }

                    ?>

                    </table>
                </div>
                <div class = "col-sm-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th>Seller</th>
                              <th>Details</th>
                            </tr>
                        </thead>
                    <?php 
                        foreach ($u_cursor as $obj)
                        {
                    ?>
                        <tbody>

                    <?php
                            foreach($obj as $key=>$value)
                            { 
                                if(($key != '_id') && ($key != 'uid'))
                                {    
                                    if($key == 'utype')
                                    {          
                    ?>
                                        <tr>
                                            <td><?php echo "seller_type"; ?></td>
                                            <td><?php echo $value; ?></td>
                                        </tr>
                    <?php
                                    }
                                    elseif($key == 'reviews')
                                    {
                       ?>
                                        <tr>
                                            <td><?php echo $key; ?></td>
                                            <td>
                    <?php                 
                                        for($i=0;$i<sizeof($value);$i++)
                                        {
                                            foreach($value[$i] as $key1=>$value1)
                                            {
                    ?> 
                                            <p><?php echo $value1; ?></p>
                    <?php 
                                            }
                                        }
                    ?>
                                            </td>
                                        </tr>  
                    <?php
                                    }
                                    else
                                    {
                    ?>
                                        <tr>
                                            <td><?php echo $key; ?></td>
                                            <td><?php echo $value; ?></td>
                                        </tr>
                    <?php 
                                    }
                                }
                            }
                    ?>

                        </tbody>
                    <?php


                        }

                    ?>
                    </table> 
                </div> 
                 <div class = "col-sm-4">
                  </form>
                    <div class="form-request box">
							<h3 style="color:#f1ad4d">Contact seller</h3>
							<form>
								<input type="text" class="form-item" placeholder="Enter name">
								<input type="text" class="form-item" placeholder="Enter email">
								<input type="text" class="form-item" placeholder="Phone number">
								<textarea type="textarea" class="form-item" placeholder="Enter Message"></textarea>
								<a href="#" class="btn btn-warning">Send Message</a>
							</form>
							</div>
            </div>
        
        </div>
    </body>
</html>