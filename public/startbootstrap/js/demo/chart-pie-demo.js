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
            callbacks: {
        label: function(tooltipItem, data) {
          return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + ' sessions';
        }
      },
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
      position: 'right',
      display: true,
      align: 'start'
    },
    cutoutPercentage: 80,
  },
});
}


if ($('#myPieChart1').length) {

  $.ajax({
  
    url: 'get/device-category',
    type: 'GET',
    success: function(response){
  
      draw_device_category(response, document.getElementById('myPieChart1'));
    }
  
  })
}

function draw_device_category(data, ctx){

  let graph_users = $.map(data, function(obj){
    
    
    return obj[1];
    

  })

  let graph_device = $.map(data, function(obj){

    return obj[0];

  })


var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: graph_device,
    datasets: [{
      data: graph_users,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
          return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + ' users';
        }
      },
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
      position: 'right',
      display: true,
      align: 'start',
      
    },
    cutoutPercentage: 80,
  },
});
}

if ($('#myPieChartPlatform').length) {

  $.ajax({
  
    url: 'get/user-platform',
    type: 'GET',
    success: function(response){
    
      draw_user_platform(response, document.getElementById('myPieChartPlatform'));
    }
  
  })
}

function draw_user_platform(data, ctx){

  let graph_users = $.map(data, function(obj){
    
    
    return obj[1];
    

  })

  let graph_device = $.map(data, function(obj){

    return obj[0];

  })


var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: graph_device,
    datasets: [{
      data: graph_users,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
          return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + ' users';
        }
      },
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
      position: 'right',
      display: true,
      align: 'start',
      
    },
    cutoutPercentage: 80,
  },
});
}