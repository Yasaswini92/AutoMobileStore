<?php
include("header.php");
include("navbar.php");
include("database_config.php");

$uid = 14;

$u_collection = $db->users;
$collection = $db->vehicles;
$counters_collection = $db->counters;


function getNextSequence($field)
{
    global $counters_collection;

    $retval = $counters_collection->findAndModify(
         array('_id' => $field),
         array('$inc' => array("nextid" => 1)),
         null,
         array(
            "new" => true,
             "upsert" => true
        )
    );
    return $retval['nextid'];
}

if($_POST)
{
    $cursor = $collection->insert(array("make" => $_POST['make'], "model" => $_POST['model'], "year" => $_POST['year'], "price" => $_POST['price'], "color" => $_POST['color'], "bodytype" => $_POST['bodytype'], "description" => $_POST['description'], "uid" => $uid, "id" => getNextSequence('id')));
    
    header("Location:all_listings_home.php?make=&type=");

}


?>

<html>
    <head>
        <title> Sell page </title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            #signup_heading
            {
                margin-left: 450px;
            }
           
            .asterisk_i:after 
            {
                content:" *"; 
                color: #e32;
                position: absolute; 
                margin: 0px 0px 0px -20px; 
                font-size: xx-large; 
                padding: 0 5px 0 0; 
            }
            #fileUP {
  position: relative;
  overflow: hidden;
}
   #fp {
  position: absolute;
  font-size: 50px;
  opacity: 0;
  right: 0;
  top: 0;
}         
        </style>
    </head>
    <body>
        
        <div class="container">
            <form name="sell_form" id = "sell_form_id" class="form" onsubmit="" method="post" role="form" accept-charset="utf-8">
          <div class="row">
              <h2 id = "signup_heading" style="Comic Sans MS, cursive, sans-serif;"><i> Sell Your Listing here!</i></h2> <br>
              
              <div class="col-sm-1"></div>
                
              <div class="col-sm-4">
                    <div class="form-group">
                        <label for="make">Make </label> <span style="color:red">*</span>
                        <input type="text" class="form-control asterisk_i" value="" placeholder="Make" name="make" required>
                    </div>
                    <div class="form-group">
                        <label for="model">Model  </label> <span style="color:red">*</span>
                        <input type="text" class="form-control" value="" placeholder="Model" name="model" required>
                  </div>
                 
                  <div class="form-group">
                        <label for="price">Price</label> <span style="color:red">*</span>
                        <input class="form-control" value="" placeholder="Price" name="price" required>
                  </div>
                     <div class="form-group">
                        <label for="bodytype">Bodytype</label> <span style="color:red">*</span>
                        <input type="text" class="form-control" value="" placeholder="Body type" name="bodytype" required>
                  </div>
                  <div >
                   
                       <label for="description">Description: </label> <span style="color:red">*</span>
                       <textarea class="form-control" value="" placeholder="Description about the vehicle" name="description" required></textarea> <br>
                 
                   </div> 
              </div>
              <div class="col-sm-1"></div>
              <div class="col-sm-4">
                  <div class="form-group">
                        <label for="color">Color: </label>
                        <input type="text" class="form-control" value="" placeholder="Color" name="color">
                  </div>
                   <div class="form-group">
                        <label for="year">Year </label> 
                        <input class="form-control" value="" placeholder="Year" name="year" required>
                  </div>
                    <div class="form-group">
                        <label for="transmission">Transmission</label>
                        <input type="text" class="form-control" value="" placeholder="Transmission" name="transmission">
                  </div>
                  <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" value="" placeholder="Website" name="website">
                  </div>
                
               <div class="file btn btn-lg btn-primary" id="fileUP" style="font-size:15px">
							Upload Image
							<input type="file" name="file" id="fp"/>
						</div>
                    
              </div>
                   </div> 
                   
                </form>
                    <center><button class="btn btn-warning" type="submit" form = "sell_form_id" style="padding:10px 14px;font-size:17px">Save your listing</button><br></center>
        </div>
    </body>
</html>