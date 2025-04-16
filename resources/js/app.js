let currentUrl = window.location.pathname;
let loansEdit = /^\/admin\/loans\/\d+\/edit$/;
let adminDashboard = /^\/admin\/dashboard/;

if (loansEdit.test(currentUrl)) {
    console.log('Ini loan management');

    new TomSelect('#select-book', {
        create: true,
        sortField: {
            field: 'text',
            direction: 'asc'
        }
    });

    new TomSelect('#select-user', {
        create: true,
        sortField: {
            field: 'text',
            direction: 'asc'
        }
    });

    new TomSelect('#select-admin', {
        create: true,
        sortField: {
            field: 'text',
            direction: 'asc'
        }
    });
} else if (adminDashboard.test(currentUrl)) {
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

    // new Chart(ctx, {
    //     type: 'bar',
    //     data: {
    //         labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    //         datasets: [{
    //             label: '# of Votes',
    //             data: [12, 19, 3, 5, 2, 3],
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         }
    //     }
    // });
} else {
    console.log('Ini lain');
}
