<?php 
session_start();

$now=time();
if($now > $_SESSION['expire']) {
  session_destroy();
  header("Location: index.html");  
}
if(empty($_SESSION['cityhead'])) {
  header("location:index.html");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>City Head</title>
    <link rel="stylesheet" href="./city_head.css" />
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
  </head>
  <body>

  <div class="header">
        <div class="left">
            <img src="./logo.png" alt="">
            <h1>SEWACITY</h1>
        </div>
        <div class="right">
       
            <a href="./logout_cityhead.php" class="logout_btn">Logout</a>
        </div>
    </div>
    



    <section class="container">
      <header><b>Sales Form</b></header>
      <form action="city_head_server.php" class="form" method="post">
        <div class="input-box">
          <label>Date*</label>
          <input type="date" placeholder="Enter Date" name="date" required />
        </div>

        <div class="input-box">
          <label>Sales Person Name*</label>
          <input type="text" placeholder="Enter Sales Person Name" name="sales_person_name" value=<?php  echo $_SESSION['cityhead']; ?> readonly />
        </div>

        <div class="column">
          <div class="input-box">
            <label>City*</label>
            <input type="text" list="cityinput" placeholder="choose your city" name="city" required>
                <datalist id="cityinput">
                  <option value="Forbesganj"></option>
                  <option value="Araria"></option>
                </datalist>
          </div>
        </div>

        <div class="column">
          <div class="input-box">
            <label>Vendors*</label>
            <input type="text" list="vendorinput" placeholder="choose vendor" name="vendor" required>
                <datalist id="vendorinput">
                  <option value="Ankit Snacks & Sweet Cafe"></option>
                  <option value="Amit Vaishnav Hotel"></option>
                  <option value="Annapurna Sweet House"></option>
                  <option value="Bihar chaat corner"></option>
                  <option value="Bhola Ji Pakori Wala"></option>
                  <option value="Balajee Sweets & Snacks"></option>
                  <option value="Cake Palace"></option>
                  <option value="Cafe Khopcha"></option>
                  <option value="Darjeeling Momo"></option>
                  <option value="Food Junction"></option>
                  <option value="Forbesganj Lunch Box"></option>
                  <option value="Honey & Cakes(Ruchika Jain)"></option>
                  <option value="Laziz Pizza"></option>
                  <option value="Pannalal Jalebi Shop"></option>
                  <option value="Jaika Restaurant"></option>
                  <option value="Naresh Sweets"></option>
                  <option value="Krishna Restaurant"></option>
                  <option value="Green Plaza Restaurant"></option>
                  <option value="The Food Shaukeens"></option>
                  <option value="Jyoti Bakery"></option>
                  <option value="The Exotic Cafe"></option>
                  <option value="Khana Khajana"></option>
                  <option value="Kolkata Biryani House"></option>
                  <option value="Moti Jaiswal Hotel"></option>
                  <option value="Moradabadi Biryani"></option>
                  <option value="The Chai Adda"></option>
                  <option value="RD Perfect Place"></option>
                  <option value="Satyam Restaurant"></option>
                  <option value="Sandip Momo"></option>
                  <option value="Yummy Food"></option>
                  <option value="Grocery"></option>
                  <option value="Taste of Mithila"></option>
                  <option value="Maurya Hotel"></option>
                  <option value="Araria Kathi Nation"></option>
                  <option value="Laziz Pizza Araria"></option>
                  <option value="Araria Hotel city Cafeteria"></option>
                  <option value="Famous Muradabadi Biryani Araria"></option>
                  <option value="Araria Hotel Panchwati"></option>
                  <option value="Sangam Champaran Hotel"></option>
                  <option value="Araria Samrat Hotel"></option>
                  <option value="Deepak Bakery"></option>
                  <option value="Araria Super Dairy"></option>
                  <option value="Araria Food On"></option>
                  <option value="Araria Royal Darbar"></option>
                  <option value="Araria S R Resto"></option>
                  <option value="Ghewar Wale"></option>
                  <option value="Araria GR Plaza"></option>
                  <option value="Araria Samocha"></option>
                  <option value="Araria Sahi Muradabadi"></option>
                  <option value="Araria Khana Khajana 7"></option>
                  <option value="Roy Egg Shop"></option>
                  <option value="Gullu Gulab Jamun"></option>
                  <option value="Bite Club"></option>
                  <option value="Anand Vesnab Hotel"></option>
                  <option value="Karmis Araria"></option>
                  <option value="Shree Govind"></option>
                  <option value="Al BAIK"></option>
                  <option value="Fine N Dine"></option>
                  <option value="Pizza House"></option>
                  <option value="Ice Cream Parlour"></option>
                  <option value="Famous Muradabad Biryani"></option>
                  <option value="2nd Wife"></option>
                  <option value="Safari Restaurant"></option>
                  <option value="Broz Biryani"></option>
                  <option value="AP Restaurant"></option>
                  <option value="Eat More Cafe"></option>
                  <option value="Dukhi Ram"></option>
                  <option value="Old Hut Restaurant"></option>
                  <option value="Barar Dhaba"></option>
                  <option value="Vadilal Ice Cream"></option>
                  <option value="Gupta Ji Sweets"></option>
                  <option value="Old Hut Restaurant"></option>
                  <option value="Araria Laziz Pizza"></option>
                  <option value="Famous Muradabadi Chicken Biryani"></option>
                  <option value="Hotel Vatika"></option>
                  <option value="The Coper Handi"></option>
                  <option value="Dhaba Food Junction"></option>
                  <option value="Fresh Chicken Shop"></option>
                  <option value="Aman Hotel"></option>
                  <option value="Sri Ganesh Parlour"></option>
                  <option value="Mandal Hotel"></option>
                  <option value="Sachiya Hub"></option>
                </datalist>
          </div>
        </div>

        <div class="seg-box">
          <h3>Business Segment*</h3>
          <div class="seg-option">
            <div class="segment">
              <input type="radio" id="check-food" name="segment" value="food" onclick="showprice(1)" />
              <label for="check-food">Food</label>
            </div>
            <div class="segment">
              <input type="radio" id="check-service" name="segment" value="service" onclick="showprice(2)" />
              <label for="check-service">Services</label>
            </div>
            <div class="segment">
              <input type="radio" id="check-subscription" name="segment" value="subscription" onclick="showprice(3)"/>
              <label for="check-subscription">Software subscription</label> 
            </div> <br>
            <div class="segment">
              <input type="radio" id="check-other" name="segment" value="other" onclick="showprice(4)" />
              <br>
              <label for="check-other">Other</label>
            </div>
          </div>
        </div>
        <div id="div1"> 
              <label for="">Total</label>
              <input type="number" id="total" name="total"> <br>
              <label for="">Delivery Charge</label>
              <input type="number" id="charge" name="delivery_charge" > <br>
              <label for="">GST</label>
              <input type="number" id="gst" step="any" name="gst" > <br>
              <label for="">Delivery Boy</label>
              <input type="text" id="dboy" list="boy" placeholder="choose your Delivery boy" name="delivery_boy" >
                <datalist id="boy">
                  <option value="Gaurav"></option>
                  <option value="Team"></option>
                  <option value="Suraj"></option>
                  <option value="Arjun"></option>
                  <option value="Naushad"></option>
                  <option value="Dharmaveer"></option>
                  <option value="Aditya"></option>
                  <option value="Guddu"></option>
                  <option value="Manish"></option>
                  <option value="Karan"></option>
                  <option value="Aman"></option>
                  <option value="Alok"></option>
                  <option value="Purshottam"></option>
                  <option value="Rohit"></option>
                  <option value="Suraj"></option>
                  <option value="Araria Shivam"></option>
                  <option value="Raju"></option>
                  <option value="Vivek"></option>
                  <option value="Ranjet"></option>
                </datalist>
                 <br>
              <label for="">Any Concern</label>
              <input type="text"  name="any_concern" >
        </div>    
        <div id="div2">
              <label for="">Price</label>
              <input type="number" name="service_price" > <br>
              <label for="">Total</label>
              <input type="number" name="service_total" > <br>
              <label for="" step="any">GST</label>
              <input type="number" step="any" name="service_gst"> <br>
        </div>

        <div id="div3"> 
          <label for="">Price</label>
          <input type="number" name="subscription_price" > <br>
          <label for="">Total</label>
          <input type="number" name="subscription_total" > <br>
          <label for="">GST</label>
          <input type="number" step="any" name="subscription_gst" ><br>
          <label for="">Subscription Validity</label>
          <input type="date" name="subscription_validity" > <br>
        </div>

        <div id="div4">
              <label for="">Price</label>
              <input type="number" name="other_price" > <br>
              <label for="">Total</label>
              <input type="" name="other_total" > <br>
              <label for="">GST</label>
              <input type="number"  step="any"name="other_gst" > <br>
        </div>


        <button  type="submit">Submit</button>

      </form>
    </section>
    <script>
     
    </script>
    <script src="./city_head.js"></script>
    <style>
      #div1{
        display: none;
      }
      #div2{
        display: none;
      }
      #div3{
        display: none;
      }
      #div4{
        display: none;
      }
    </style>
    <div class="spacer"></div>
  </body>
</html>