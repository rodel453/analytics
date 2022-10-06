// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

let set_of_data = [1, 0, 2, 1, 0, 2, 2, 1, 0, 2, 2, 1, 0, 2, 2, 1, 0, 2, 2, 1, 0, 2, 2, 1, 0, 2, 2, 1, 0, 2, 2, 1, 0, 2, 2, 1, 0, 2];
let map_data = [];
map_data = set_of_data.map(function(value, index){

  if (value == 0){

    return value + 0.1;
   
  }

    return value;

})

function number_format(number, decimals, dec_point, thousands_sep) {

  
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
if ($('#myBarChartHorizontal1').length) {

  $.ajax({
  
    url: 'get/analytics-data',
    type: 'GET',
    success: function(response){

        draw_graph(response, document.getElementById('myBarChartHorizontal1'),"url", "pageViews");
    }
  
  })
  
}

function get_graph_data(data, key1 = null, key2 = null){
  let graph_data = [];

  let graph_data1 = $.map(data, function(obj){

    return obj[key1];
  })

  let graph_data2 = $.map(data, function(obj){

    return obj[key2];

  })

  let graph_data3 = Math.max(...data.map(obj => {

      return obj[key2];

  }));

  graph_data.push(graph_data1);
  graph_data.push(graph_data2);
  graph_data.push(graph_data3);

  return graph_data;

}

function draw_graph(data, ctx, key1 = null, key2 = null){
  
  let graph_data = get_graph_data(data, key1, key2);

  var myBarChartHorizontal1 = new Chart(ctx, {
  
  type: 'bar',
  data: {
      labels: graph_data[0],
      datasets: [{
      label: key2,
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: graph_data[1],
      }],
  },
  options: {
      maintainAspectRatio: false,
      layout: {
      padding: {
          left: 10,
          right: 25,
          top: 25,
          bottom: 0
      }
      },
      scales: {
      xAxes: [{
          time: {
          unit: 'month'
          },
          gridLines: {
          display: false,
          drawBorder: false
          },
          ticks: {
          maxTicksLimit: 6
          },
          maxBarThickness: 25,
      }],
      yAxes: [{
          ticks: {
          min: 0,
          max: Math.ceil(graph_data[2] / 10) * 10 ,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
              return number_format(value);
          }
          },
          gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
          }
      }],
      },
      legend: {
      display: false
      },
      tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
          label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
          }
      }
      },
  }
  });
}

var ctx = document.getElementById("myBarChart");

  var myBarChart = new Chart(ctx, {
  
  
    type: 'bar',
    data: {
      labels: ["30 minute ago","29 minute ago","28 minute ago", "27 minute ago", "26 minute ago", "25 minute ago", "24 minute ago", "23 minute ago", "22 minute ago", "21 minute ago", "20 minute ago", "19 minute ago", "18 minute ago", "17 minute ago", "16 minute ago", "15 minute ago", "14 minute ago", "13 minute ago", "12 minute ago", "11 minute ago", "10 minute ago", "8 minute ago", "8 minute ago", "7 minute ago", "6 minute ago", "5 minute ago", "4 minute ago", "3 minute ago", "2 minute ago", "1 minute ago", "0 minute ago"],
      datasets: [{
        label: "USERS",
        backgroundColor: "#4e73df",
        hoverBackgroundColor: "#2e59d9",
        borderColor: "#4e73df",
        data: map_data,
      }],
    },
    options: {
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 0,
          bottom: 0
        }
      },
      scales: {
        xAxes: [{
          time: {
            unit: 'minute'
          },
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            display: false,
            maxTicksLimit: 5 
          },
          maxBarThickness: 5,
        }],
        yAxes: [{
          ticks: {
            display: false,
            min: 0,
            max: 15,
            maxTicksLimit: 5,
            padding: 0,
            // Include a dollar sign in the ticks
            callback: function(value, index, values) {
              return number_format(value);
            }
          },
          gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            display: false,
          }
        }],
      },
      legend: {
        display: false
      },
      tooltips: {
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 12,
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 10,
        yPadding: 10,
        displayColors: false,
        caretPadding: 5,
        callbacks: {
          label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ": " +number_format(tooltipItem.yLabel);
          }
        }
      },
    }
  });


  if ($('#myBarChartHorizontal').length) {

    $.ajax({
    
      url: 'get/users-type',
      type: 'GET',
      success: function(response){

          draw_graph(response, document.getElementById('myBarChartHorizontal'), "type", "sessions");
      }
    
    })
  
  }


