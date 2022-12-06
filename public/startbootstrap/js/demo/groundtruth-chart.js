// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

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

// var dynamicColors = function() {
//     var r = Math.floor(Math.random() * 255);
//     var g = Math.floor(Math.random() * 255);
//     var b = Math.floor(Math.random() * 255);
//     return "rgb(" + r + "," + g + "," + b + ")";
//  };

let legend_type = 'impressions';
let data_chart_response;

$(document).on('click', '.groundtruth-chart', function(e){

 legend_type = $(this).data('selector')
 let selector = $(`#${legend_type}`).find('canvas');
 console.log(selector);
 draw_impressions(data_chart_response, selector);

});

//  if ($('.GroundtruthChart').length) {

//   $(function() {

//   $('input[name="daterange"]').daterangepicker({
//     opens: 'left',
//     "maxSpan": {
//         "days": 7
//     },

//   }, function(start, end, label) {
//     console.log('chart')
//     let start_date = start.format('YYYY-MM-DD');
//     let end_date =  end.format('YYYY-MM-DD');

//     $.ajax({
    
//       url: '/get/table-campaign-daily-view?start_date='+start_date+'&end_date='+end_date+'',
//       type: 'GET',
//       success: function(response){ 
  
//         data_chart_response = response;
//         draw_impressions(response, document.getElementsByClassName('GroundtruthChart'));

//       }
    
//     });
//   })
//   })
//  }

  function draw_impressions(data, ctx){

    let c_adgroup_id =  data['campaign_adgroup_id'];
    let c_adgroup_date = data['campaign_adgroup_date'];

    let dataset_array = [];
    let r = 50;
    let g = 25;
    let b = 75;

      for ( i = 0; i < c_adgroup_id.length; i++){
        let data_temp = [];
        for ( x = 0; x < data[c_adgroup_id[i]].length; x++){

          data_temp.push(data[c_adgroup_id[i]][x][legend_type]);

        }

        
        let temp_array = {
          label: c_adgroup_id[i],
          lineTension: 0.3,
          backgroundColor: `rgba(${r}, ${g}, ${b}, 0)`,
          borderColor: `rgba(${r}, ${g}, ${b}, 1)`,
          pointRadius: 3,
          pointBackgroundColor: `rgba(${r}, ${g}, ${b}, 1)`,
          pointBorderColor: `rgba(${r}, ${g}, ${b}, 1)`,
          pointHoverRadius: 3,
          pointHoverBackgroundColor: `rgba(${r}, ${g}, ${b}, 1)`,
          pointHoverBorderColor: `rgba(${r}, ${g}, ${b}, 1)`,
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: data_temp,
        };

        dataset_array.push(temp_array);

        r = r+20;
        g = g+15;
        b = b+55;

      }
    
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: c_adgroup_date,
    datasets: dataset_array
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
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
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
      display: true
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + ' ' + legend_type;
        }
      }
    }
  }
})
};