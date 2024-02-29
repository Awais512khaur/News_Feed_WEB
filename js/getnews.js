function news() {
    const newslist = document.getElementById('newslist');
    const apikey = 'b3247cdbcb604ac1a52b36ed00080a5e';
    const apiURL = `https://newsapi.org/v2/top-headlines?country=us&apiKey=${apikey}`;
    fetch(apiURL).then(response => response.json()).then(data => 
    {
            console.log(data);
            newslist.innerHTML = '';
            data.articles.forEach(article => {
                const div = document.createElement('div');
                div.classList.add('article');
                div.innerHTML = `
                    <img src="${article.urlToImage}" >
                    <h2>${article.title}</h2>
                    <p>${article.description || 'No description to show'}</p>
                    <a href="${article.url}">Read More</a>`;
                newslist.appendChild(div);
            });
    }).catch(error => console.error('error fetching news data', error));
}
