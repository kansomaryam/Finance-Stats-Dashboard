// Function to render the chart
function renderChart() {
    // Retrieve saved revenue and expenses from WordPress
    const revenue = parseFloat(fsdData.revenue);
    const expenses = parseFloat(fsdData.expenses);

    // Create the chart data
    const ctx = document.getElementById('financialChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar', // Choose the chart type (bar, line, etc.)
        data: {
            labels: ['Revenue', 'Expenses'],
            datasets: [{
                label: 'Financial Stats',
                data: [revenue, expenses],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.5)', // Color for revenue
                    'rgba(255, 99, 132, 0.5)' // Color for expenses
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)', // Border color for revenue
                    'rgba(255, 99, 132, 1)' // Border color for expenses
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Start y-axis at zero
                }
            }
        }
    });
}