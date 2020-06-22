var map = L.map('mapa').setView([29.083453, -470.960315], 16);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([29.083453, -470.960315]).addTo(map)
    .bindTooltip('¡Aquí puedes encontrarnos!')
    .openTooltip();