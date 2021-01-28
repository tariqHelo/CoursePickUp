/*=========================================================================================
    File Name: dashboard-crypto.js
    Description: intialize dashboard crypto
    ----------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
    Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

(function(window, document, $) {
  "use strict";

  /********************************************
   *               BTC Card                    *
   ********************************************/
  //Get the context of the Chart canvas element we want to select
  var btcChartjs = document.getElementById("btc-chartjs").getContext("2d");
  // Create Linear Gradient
  var blue_trans_gradient = btcChartjs.createLinearGradient(0, 0, 0, 100);
  blue_trans_gradient.addColorStop(0, "rgba(255, 145, 73,0.4)");
  blue_trans_gradient.addColorStop(1, "rgba(255,255,255,0)");
  // Chart Options
  var BTCStats = {
    responsive: true,
    maintainAspectRatio: false,
    datasetStrokeWidth: 3,
    pointDotStrokeWidth: 4,
    tooltipFillColor: "rgba(255, 145, 73,0.8)",
    legend: {
      display: false
    },
    hover: {
      mode: "label"
    },
    scales: {
      xAxes: [
        {
          display: false
        }
      ],
      yAxes: [
        {
          display: false,
          ticks: {
            min: 0,
            max: 85
          }
        }
      ]
    },
    title: {
      display: false,
      fontColor: "#FFF",
      fullWidth: false,
      fontSize: 30,
      text: "52%"
    }
  };

  // Chart Data

  
  var BTCMonthData = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
    datasets: [
      {
        label: "BTC",
        data: [10, 13, 55, 70, 20, 80, 50],
        backgroundColor: blue_trans_gradient,
        borderColor: "#FF9149",
        borderWidth: 1.5,
        strokeColor: "#FF9149",
        pointRadius: 0
      }
    ]
  };

  var BTCCardconfig = {
    type: "line",

    // Chart Options
    options: BTCStats,

    // Chart Data
    data: BTCMonthData
  };

  // Create the chart
  var BTCAreaChart = new Chart(btcChartjs, BTCCardconfig);

  /********************************************
   *               ETH Card                    *
   ********************************************/
  //Get the context of the Chart canvas element we want to select
  var ethChartjs = document.getElementById("eth-chartjs").getContext("2d");
  // Create Linear Gradient
  var blue_trans_gradient = ethChartjs.createLinearGradient(0, 0, 0, 100);
  blue_trans_gradient.addColorStop(0, "rgba(120, 144, 156,0.4)");
  blue_trans_gradient.addColorStop(1, "rgba(255,255,255,0)");
  // Chart Options
  var ETHStats = {
    responsive: true,
    maintainAspectRatio: false,
    datasetStrokeWidth: 3,
    pointDotStrokeWidth: 4,
    tooltipFillColor: "rgba(120, 144, 156,0.8)",
    legend: {
      display: false
    },
    hover: {
      mode: "label"
    },
    scales: {
      xAxes: [
        {
          display: false
        }
      ],
      yAxes: [
        {
          display: false,
          ticks: {
            min: 0,
            max: 85
          }
        }
      ]
    },
    title: {
      display: false,
      fontColor: "#FFF",
      fullWidth: false,
      fontSize: 30,
      text: "52%"
    }
  };

  // Chart Data
  var ETHMonthData = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
    datasets: [
      {
        label: "ETH",
        data: [40, 30, 60, 40, 45, 30, 60],
        backgroundColor: blue_trans_gradient,
        borderColor: "#78909C",
        borderWidth: 1.5,
        strokeColor: "#78909C",
        pointRadius: 0
      }
    ]
  };

  var ETHCardconfig = {
    type: "line",
    // Chart Options
    options: ETHStats,
    // Chart Data
    data: ETHMonthData
  };

  // Create the chart
  var ETHAreaChart = new Chart(ethChartjs, ETHCardconfig);

  /********************************************
   *               XRP Card                    *
   ********************************************/
  //Get the context of the Chart canvas element we want to select
  var xrpChartjs = document.getElementById("xrp-chartjs").getContext("2d");
  // Create Linear Gradient
  var blue_trans_gradient = xrpChartjs.createLinearGradient(0, 0, 0, 100);
  blue_trans_gradient.addColorStop(0, "rgba(30,159,242,0.4)");
  blue_trans_gradient.addColorStop(1, "rgba(255,255,255,0)");
  // Chart Options
  var XRPStats = {
    responsive: true,
    maintainAspectRatio: false,
    datasetStrokeWidth: 3,
    pointDotStrokeWidth: 4,
    tooltipFillColor: "rgba(30,159,242,0.8)",
    legend: {
      display: false
    },
    hover: {
      mode: "label"
    },
    scales: {
      xAxes: [
        {
          display: false
        }
      ],
      yAxes: [
        {
          display: false,
          ticks: {
            min: 0,
            max: 85
          }
        }
      ]
    },
    title: {
      display: false,
      fontColor: "#FFF",
      fullWidth: false,
      fontSize: 30,
      text: "52%"
    }
  };

  // Chart Data
  var XRPMonthData = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
    datasets: [
      {
        label: "XRP",
        data: [70, 20, 35, 60, 20, 40, 30],
        backgroundColor: blue_trans_gradient,
        borderColor: "#1E9FF2",
        borderWidth: 1.5,
        strokeColor: "#1E9FF2",
        pointRadius: 0
      }
    ]
  };

  var XRPCardconfig = {
    type: "line",

    // Chart Options
    options: XRPStats,

    // Chart Data
    data: XRPMonthData
  };

  // Create the chart
  var XRPAreaChart = new Chart(xrpChartjs, XRPCardconfig);

  var candlestickBasicChart = {
    chart: {
      height: 350,
      type: "candlestick"
    },
    series: [
      {
        data: [
       
        ]
      }
    ],
    title: {
      text: "CandleStick Chart",
      align: "left"
    },
    xaxis: {
      type: "datetime"
    },
    yaxis: {
      tooltip: {
        enabled: true
      }
    }
  };
  // Initializing Candlestick Basic Chart
  var candlestick_basic_chart = new ApexCharts(
    document.querySelector("#btc-candlestick-control"),
    candlestickBasicChart
  );
  candlestick_basic_chart.render();
})(window, document, jQuery);
