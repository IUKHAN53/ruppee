<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Analytics') }}
        </h2>
    </x-slot>
    <div class="container ">
        <div class="flex bg-gray-50 dark:bg-gray-900 mt-5">
            <div class="container max-w-6xl px-5 mx-auto my-10">
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
                    <div class="p-5 bg-white rounded shadow-sm">
                        <div class="text-base text-gray-400 ">Total Orders</div>
                        <div class="flex items-center pt-1">
                            <div class="text-2xl font-bold text-gray-900 ">{{$order_count}}</div>
                        </div>
                    </div>
                    <div class="p-5 bg-white rounded shadow-sm">
                        <div class="text-base text-gray-400 ">Net Revenue</div>
                        <div class="flex items-center pt-1">
                            <div class="text-2xl font-bold text-gray-900 ">Rs. {{$earnings}}</div>
                        </div>
                    </div>
                    <div class="p-5 bg-white rounded shadow-sm">
                        <div class="text-base text-gray-400 ">Total Spent</div>
                        <div class="flex items-center pt-1">
                            <div class="text-2xl font-bold text-gray-900 ">Rs. {{$total_spent}}</div>
                        </div>
                    </div>
                    <div class="p-5 bg-white rounded shadow-sm">
                        <div class="text-base text-gray-400 ">Total Buyers</div>
                        <div class="flex items-center pt-1">
                            <div class="text-2xl font-bold text-gray-900 ">{{$buyer_count}}</div>
                        </div>
                    </div>
                    <div class="p-5 bg-white rounded shadow-sm">
                        <div class="text-base text-gray-400 ">Avg Reviews</div>
                        <div class="flex items-center pt-1">
                            <div class="text-2xl font-bold text-gray-900 ">{{$avg_rating}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chart">
            <canvas id="myChart" width="250" height="150"></canvas>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        let labels = @json($labels);
        let series = @json($series);
        let ctx = document.getElementById('myChart');
        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Earnings per month',
                    data: series,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
