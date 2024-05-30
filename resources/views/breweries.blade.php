<!DOCTYPE html>
<html>

<head>
    <title>Breweries</title>
</head>

<body>
    <h1>Breweries</h1>
    <div id="breweries"></div>
    <button id="loadMore">Load More</button>

    <script>
        let page = 1;

        document.addEventListener('DOMContentLoaded', function() {
            fetchBreweries();

            document.getElementById('loadMore').addEventListener('click', function() {
                page++;
                fetchBreweries();
            });
        });

        function fetchBreweries() {
            fetch(`/api/breweries?page=${page}`, {
                    headers: {
                        'Authorization': `Bearer {{ session('token') }}`
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const breweriesDiv = document.getElementById('breweries');
                    data.forEach(brewery => {
                        const div = document.createElement('div');
                        div.innerHTML = `<p>${brewery.name}</p>`;
                        breweriesDiv.appendChild(div);
                    });
                });
        }
    </script>
</body>

</html>
