<?php
include("header.php");
include("navbar.php");



if(isset($_POST['make'], $_POST['type'], $_POST['price']))
{
    $make = $_POST['make'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    header("Location: Listings.php?make=$make&type=$type&price=$price");
}

?>

<html>

    <head>
        <title> Enter </title>   
        <style type = "text/css">
            html 
            { 
              background: url(bkground.jpeg) no-repeat center center fixed; 
              -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;
            }
            body
            {
                background: none;
            }
            #website_name
            {
                font-family: "Raleway", sans-serif;
                margin-top: 70px;
                margin-left: 32%;
                color:#f1ad4d;
                font-size:40;
            }
    
                    
        </style>
        
    </head>
    
    <body>
        <h3><p id = "website_name"><i><b>Accelarate your Dreams!</b></i></p></h3>

        <div class="container" style="margin-top:170px;">

        <form method="post" style="width:70%;margin-left:27%">
            <div class="row" style="text-align:center">
            <div class="col-lg-4">
            <div class="form-group">
            <select class="form-control box"  name="listing_type">
                <option>Listing Type</option>
                <option>Car</option>
                <option>Truck</option>
                <option>RV</option>
                <option>Motor Cycle</option>
            </select>
            </div>
            <div class="form-group">
            <input type="text" name="id" class="form-control box" placeholder="Keyword">
            </div>
            <div class="form-group">
            <input type="text" name="make" class="form-control box" placeholder="make">
            </div>
            </div>
            <div class="col-lg-4">
            <div class="form-group">

            <input type="text" name="type" class="form-control box" placeholder="Min Price">
            </div>
            <div class="form-group">

            <input type="text" name="price" class="form-control box" placeholder="Max price">
            </div>

            <!--<input type="text" name="minprice" class="form-control box" placeholder="Enter minimum price">

            <input type="text" name="maxprice" class="form-control box" placeholder="Enter maximum price">-->
            

            <button class="btn btn-warning" name="search" type="submit" style="padding:6px 21px;font-size:18px">
                    Search
            </button>
            </div>

        </form>
        </div>
        </div>
    </body>
					 
</html>