<x-app-layout>
    <div class="px-8 font-bold text-2xl text-blue-900 dark:text-gray-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            Dashboard
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 dark:text-gray-200">
            @livewire('dashboard.admin-stats') 
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-900 overflow-hidden rounded-lg shadow p-4">
                    <h3 class="text-lg font-semibold mb-4 text-blue-900 dark:text-gray-100 mb-8">Registered Users in Last 30 Days</h3>
                    <canvas id="myChart"></canvas>
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
            label: 'Registered users in the last 30 days',
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
