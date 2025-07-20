<x-app-layout>
    <div class="px-8 font-bold text-2xl text-blue-900 dark:text-gray-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            Dashboard
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 dark:text-gray-200">
            @livewire('dashboard.hr-stats')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-900 overflow-hidden rounded-lg shadow p-4">
                    <h3 class="text-lg font-semibold mb-4 text-blue-900 dark:text-gray-100 mb-8">Registered Applicants in Last 30 Days</h3>
                    <canvas id="myChart"></canvas>
                </div>
                <div class="bg-white dark:bg-gray-900 overflow-hidden rounded-lg shadow p-4">
                    <h3 class="text-lg font-semibold mb-4 text-blue-900 dark:text-gray-100">Applicants by Age Range</h3>
                    <canvas id="myChart2" height="200" class="w-full max-h-[300px]"></canvas>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const barData = {
        labels: @json($data->map(fn ($data) => $data->date)),
        datasets: [{
            label: 'Registered applicants in the last 30 days',
            backgroundColor: 'rgb(176,196,222)',
            borderColor: 'rgb(173,216,230)',
            data: @json($data->map(fn ($data) => $data->aggregate)),
        }]
    };
    const barConfig = {
        type: 'bar',
        data: barData
    };
    const myChart = new Chart(
        document.getElementById('myChart'),
        barConfig
    );
</script>

<script>
    const agePieData = {
        labels: @json(array_keys($data2)),
        datasets: [{
            label: 'Applicants by Age Range',
            data: @json(array_values($data2)),
            backgroundColor: [
                'rgb(255, 99, 132)',    // Below 18
                'rgb(255, 159, 64)',    // 18–24
                'rgb(255, 205, 86)',    // 25–34
                'rgb(75, 192, 192)',    // 35–44
                'rgb(54, 162, 235)',    // 45–54
                'rgb(153, 102, 255)',   // 55–64
                'rgb(201, 203, 207)'    // 65+
            ],
            hoverOffset: 4,
            borderWidth: 0 
        }]
    };

    const agePieConfig = {
        type: 'pie',
        data: agePieData,
    };

    const myChart2 = new Chart(
        document.getElementById('myChart2'),
        agePieConfig
    );
</script>

