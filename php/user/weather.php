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
    <script >
const inputbox = document.querySelector('.inputbox');
const searchbtn = document.getElementById('searchbtn');
const weatherimage = document.querySelector('.weatherimage');
const temprature = document.querySelector('.temprature');
const description = document.querySelector('.description');
const humidity = document.getElementById('humidity');
const wind = document.getElementById('wind');
const locationnotfound = document.querySelector('.locationnotfound');
async function checkweather(city)
{
    const apikey = "38c3cdb1e6fb4b4ee10150992a2d241b";
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apikey}`;
    const weatherdata = await fetch(`${url}`).then(response=> response.json());
    if(weatherdata.cod === `404`)
    {
        locationnotfound.style.display = "flex";
        console.log("Error");
        return;
    }
    temprature.innerHTML = `${Math.round (weatherdata.main.temp - 273.15)}`;
    description.innerHTML =  `${weatherdata.weather[0].description}`;
    console.log(weatherdata);
    humidity.innerHTML = `${weatherdata.main.humidity}%`;
    wind.innerHTML = `${weatherdata.wind.speed} Km/H`;

    switch (weatherdata.weather[0].main) {
        case 'Clouds':
            weatherimage.src = "../../weather_images/cloud.png";
            break;
        case 'Clear':
            weatherimage.src = "../../weather_images/clear.png";
            break;
        case 'Mist':
            weatherimage.src = "../../weather_images/mist.png";
            break;
        case 'Rain':
            weatherimage.src = "../../weather_images/rain.png";
            break;
        case 'Snow':
            weatherimage.src = "../../weather_images/snow.png";
            break;
        default:
            weatherimage.src = "../../weather_images/default.png"; 
            break;
    }
}
searchbtn.addEventListener('click',()=>
{
    checkweather(inputbox.value);
})
    </script>
    <script src="https://kit.fontawesome.com/0deb7a1be4.js" crossorigin="anonymous"></script>
</body>
</html>