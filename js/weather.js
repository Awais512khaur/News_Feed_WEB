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

    switch(weatherdata.weather[0].main){
        case 'cloud':
            weatherimage.src = "../../weather_images/cloud.png";
            break;
            case 'clear':
            weatherimage.src = "../../weather_images/clear.png";
            break;
            case 'mist':
            weatherimage.src = "../../weather_images/mist.png";
            break;
            case 'rain':
            weatherimage.src = "../../weather_images/rain.png";
            break;
            case 'snow':
            weatherimage.src = "../../weather_images/snow.png";
            break;
        }
}
searchbtn.addEventListener('click',()=>
{
    checkweather(inputbox.value);
})