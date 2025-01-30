@extends('layouts.app')
@section('content')

<style>
        #myChart {
            width: 100% !important;
            max-width: 100%;
            height: 400px;
            max-height: 500px;
            margin: 0 auto;
        }

</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Cards Section -->
    <div class="relative grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-3 mx-4 z-20 rounded-lg">
        <!-- Total Accepted Customers Card -->
        <div
            class="bg-white p-6 text-left hover:shadow-2xl flex flex-row items-center justify-between w-full h-20 rounded-lg transform sm:-translate-y-8 lg:-translate-y-12 shadow-lg z-[5]">
            <div>
                <h2 class="text-gray-700 font-medium">Total Accepted Customers</h2>
                <p class="text-gray-700 font-medium">{{$totalaccepted}}</p>
            </div>
            <div class="bg-blue-500 text-white w-12 h-12 flex items-center justify-center rounded-full">
                <i class="ri-calendar-check-fill text-2xl"></i>
            </div>
        </div>

        <!-- Customers Card -->
        <div
            class="bg-white p-6 rounded-lg text-left hover:shadow-2xl transition-shadow duration-300 flex flex-row items-center justify-between w-full h-20 transform sm:-translate-y-8 lg:-translate-y-12 shadow-lg">
            <div>
                <h2 class="text-gray-700 font-medium mb-2">Registered Customers</h2>
                <p class="text-gray-700 font-medium">{{$totalusers}}</p>
            </div>
            <div class="bg-yellow-500 text-white w-12 h-12 flex items-center justify-center rounded-full">
                <i class="ri-user-add-fill text-2xl"></i> 
            </div>
        </div>

        <!-- Comapnies Card -->
        <div
            class="bg-white p-6 rounded-lg text-left hover:shadow-2xl transition-shadow duration-300 flex flex-row items-center justify-between w-full h-20 transform sm:-translate-y-8 lg:-translate-y-12 shadow-lg">
            <div>
                <h2 class="text-gray-700 font-medium mb-2">Total Companies</h2>
                <p class="text-gray-700 font-medium">{{$totalcompanies}}</p>
            </div>
            <div class="bg-purple-600 text-white w-12 h-12 flex items-center justify-center rounded-full">
                <i class="ri-building-fill text-2xl"></i> 
            </div>
        </div>

          <!-- ShareHolders Card -->
          <div
          class="bg-white p-6 rounded-lg text-left hover:shadow-2xl transition-shadow duration-300 flex flex-row items-center justify-between w-full h-20 transform sm:-translate-y-4 lg:-translate-y-8 shadow-lg">
          <div>
              <h2 class="text-gray-700 font-medium mb-2">Total Shareholders</h2>
              <p class="text-gray-700 font-medium">{{$totalshareholders}}</p>
          </div>
          <div class="bg-green-500 text-white w-12 h-12 flex items-center justify-center rounded-full">
              <i class="ri-team-fill text-2xl"></i>
          </div>
      </div>



      <!-- Visitors Card -->
      <div
          class="bg-white p-6 rounded-lg text-left hover:shadow-2xl transition-shadow duration-300 flex flex-row items-center justify-between w-full h-20 transform sm:-translate-y-4 lg:-translate-y-8 shadow-lg">
          <div>
              <h2 class="text-gray-700 font-medium mb-2">Total Visitors</h2>
              <p class="text-gray-700 font-medium">{{$totalvisits}}</p>
          </div>
          <div class="bg-red-500 text-white w-12 h-12 flex items-center justify-center rounded-full">
              <i class="ri-earth-fill text-2xl"></i>
          </div>
      </div>
  </div>

  <div class="flex items-center justify-center py-8 px-4">
    <div class="w-full">
        <div class="flex flex-col justify-between h-full">
            <div>
                <div class="lg:flex w-full justify-between">
                    <h3 class="text-gray-600 dark:text-gray-100 leading-5 text-base md:text-xl font-bold">Details of
                        Visits</h3>
                </div>
            </div>
            <div class="mt-2">
                <canvas id="myChart" role="img"
                    aria-label="line graph to show selling overview in terms of months and numbers"></canvas>
            </div>
        </div>
    </div>
</div>

    <script>
                // Visits Line Chart
                const chart = new Chart(document.getElementById("myChart"), {
            type: "line",
            data: {
                labels: {!! json_encode($visitdate) !!},
                datasets: [{
                    label: "No of Visits",
                    borderColor: "#4F7CAC",
                    backgroundColor: "rgba(79, 124, 172, 0.2)",
                    data: {!! json_encode($visits) !!},
                    fill: true,
                    pointBackgroundColor: "#4F7CAC",
                    borderWidth: 3,
                    pointBorderWidth: 2,
                    pointHoverRadius: 6,
                    pointHoverBorderWidth: 8,
                    pointHoverBorderColor: "rgb(74,85,104,0.2)",
                    lineTension: 0.4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                tooltips: {
                    mode: 'nearest',
                    intersect: false,
                    backgroundColor: 'rgba(0, 0, 0, 0.7)',
                    titleFontSize: 14,
                    bodyFontSize: 12,
                    bodyFontColor: '#fff',
                    cornerRadius: 6,
                    callbacks: {
                        label: function(tooltipItem) {
                            return 'Visits: ' + tooltipItem.yLabel;
                        }
                    }
                },
                legend: {
                    position: 'top',
                    labels: {
                        fontColor: '#333',
                        fontSize: 14,
                    }
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 12,
                            fontColor: '#555',
                            autoSkip: true,
                            maxRotation: 0,
                            minRotation: 0,
                            padding: 10,
                        },
                        gridLines: {
                            display: true,
                            color: 'rgba(0,0,0,0.1)',
                            lineWidth: 1
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontSize: 12,
                            fontColor: '#555',
                            stepSize: 5,
                            padding: 10,
                        },
                        gridLines: {
                            display: true,
                            color: 'rgba(0,0,0,0.1)', // Lighter grid lines for y-axis
                            lineWidth: 1
                        }
                    }]
                }
            }
        });
    </script>

@endsection
