<div class="flex items-center justify-center w-full h-full p-4 bg-white dark:bg-gray-800 rounded shadow">
    <div class="relative w-full h-full">
        <canvas id="topDonorsChart" class="w-full h-full"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('topDonorsChart').getContext('2d');
            const config = {
                type: 'bar',
                data: {
                    labels: [ "{{$donorName1}}", "{{$donorName2}}","{{$donorName3}}", "{{$donorName4}}","{{$donorName5}}"],
                    datasets: [{
                        label: 'Donated Amount in Kwacha',
                        data: ["{{$donorsAmount1}}", "{{$donorsAmount2}}", "{{$donorsAmount3}}", "{{$donorsAmount4}}", "{{$donorsAmount5}}"],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            };

            const topDonorsChart = new Chart(ctx, config);
        });
    </script>
</div>
