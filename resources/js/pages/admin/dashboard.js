export function init() {
    console.log('Ini Dashboard');
    const ctx = document.getElementById('visitorChart');

    const monthNames = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    const dataset = [];

    function getRandomIntInclusive(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    for (let i = 0; i < 12; i++) {
        dataset.push(getRandomIntInclusive(10, 100));
    }

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: monthNames,
            datasets: [{
                label: 'Visitor Dataset',
                data: dataset,
                fill: true,
                borderColor: 'rgb(0, 125, 255)',
                tension: 0.1
            }]
        }
    });
}