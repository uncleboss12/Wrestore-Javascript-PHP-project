// Sample data for line chart
const lineChartData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
    datasets: [{
      label: 'Line Dataset',
      borderColor: 'rgb(75, 192, 192)',
      data: [65, 59, 80, 81, 56, 55]
    }]
  };
  
  // Sample data for bar chart
  const barChartData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
    datasets: [{
      label: 'Bar Dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      data: [12, 19, 3, 5, 2, 3]
    }]
  };
  
  // Configuration for combined chart
  const chartConfig = {
    type: 'bar',
    data: {
      labels: lineChartData.labels,
      datasets: [{
        type: 'line',
        label: lineChartData.datasets[0].label,
        borderColor: lineChartData.datasets[0].borderColor,
        borderWidth: 2,
        data: lineChartData.datasets[0].data,
        fill: false
      }, {
        type: 'bar',
        label: barChartData.datasets[0].label,
        backgroundColor: barChartData.datasets[0].backgroundColor,
        data: barChartData.datasets[0].data,
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  };
  
  // Create canvas element for chart
  const canvas = document.createElement('canvas');
  canvas.id = 'combined-chart';
  document.body.appendChild(canvas);
  
  // Get canvas context
  const ctx = canvas.getContext('2d');
  
  // Create combined chart
  const combinedChart = new Chart(ctx, chartConfig);
  
  // Display chart
  console.log(combinedChart);
  