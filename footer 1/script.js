// script.js

function updateTime() {
    const currentTime = new Date();
    const options = { hour: 'numeric', minute: 'numeric', second: 'numeric' };
    const formattedTime = currentTime.toLocaleTimeString('en-US', options);
    document.getElementById('current-time').textContent = `Current Time: ${formattedTime}`;
}

setInterval(updateTime, 1000); // Update time every second

// Initialize the count to 0
let count = 0;

// Function to update the count and display it
function updateCount() {
    count++;
    document.getElementById("count").textContent = count;
}

// Call the updateCount function when the page loads
window.addEventListener("load", updateCount);

