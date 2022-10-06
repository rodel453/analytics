// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example

if ($('#myPieChart').length) {

  $.ajax({
  
    url: 'get/top-browsers',
    type: 'GET',
    success: function(response){
  
      draw_top_browser(response, document.getElementById('myPieChart'));
    }
  
  })

}

function draw_top_browser(data, ctx){

  let graph_sessions = $.map(data, function(obj){

    return obj.sessions;

  })

  let graph_browser = $.map(data, function(obj){

      return obj.browser;
  })


var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: graph_browser,
    datasets: [{
      data: graph_sessions,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
}