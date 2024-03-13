<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>
    <link rel="stylesheet" href="../../style/weather.css">
</head>
<body>
    <div class="container">
        <div class="header">
          <div class="searchbox">
            <input type="text" placeholder="Enter your location" class="inputbox">
            
            <button class="fa-solid fa-magnifying-glass" id="searchbtn"></button>
          </div>
        </div>
        <div class="locationnotfound">
            <H1>Sorry location not found</H1>
            <img src="../../weather_images/404.png" alt="404 Error">
        </div>
 <div class="weatherbody">
  <img src="../../weather_images/cloud.png" alt="weather image" class="weatherimage">
  <div class="weatherbox">
    <p class="temprature">0<sup>°C</sup></p>
    <p class="description">Light Rain</p>
  </div>
  <div class="weatherdetails">
    <div class="humidity">
        <i class="fa-sharp fa-solid fa-droplet"></i>
        <div class="text">
            <span id="humidity">0%</span>
            <p>Humidity</p>
        </div>
        <div class="wind">
            <i class="fa-solid fa-wind"></i>
            <div class="text">
                <span id="wind">0Km/H</span>
                <p>Windspeed</p>
            </div>
    </div>
  </div>
 </div>
    </div>
    <script src="../../JS/weather.js"></script>
    <script src="https://kit.fontawesome.com/0deb7a1be4.js" crossorigin="anonymous"></script>
</body>
</html>