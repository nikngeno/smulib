// Get references to DOM elements for displaying the month/year, dates, and navigation buttons
const monthYearElement = document.getElementById("monthYear");
const datesElement = document.getElementById("dates");
const prevButton = document.getElementById("prevButton");
const nextButton = document.getElementById("nextButton");

// Initialize the calendar with the current date
let currentDate = new Date();

void function updateEvent() 
{
    
}

// Function to update the calendar display based on the current date
const updateCalendar = () => {
    const currentYear = currentDate.getFullYear(); // Get the current year
    const currentMonth = currentDate.getMonth();   // Get the current month (0-11)

    // Get the first day *of the previous month* to determine leading inactive days
    const firstDay = new Date(currentYear, currentMonth, 0);

    // Get the last day of the current month
    const lastDay = new Date(currentYear, currentMonth + 1, 0);

    const totalDays = lastDay.getDate();           // Total number of days in the current month
    const firstDayIndex = (firstDay.getDay() + 1) % 7;       // Day index of first visible date in calendar grid (0=Sunday, 6=Saturday)
    const lastDayIndex = lastDay.getDay();         // Day index of the last day of the month

    // Format and display the current month and year (e.g., "April 2025")
    const monthYearString = currentDate.toLocaleString("default", { month: "long", year: "numeric" });
    monthYearElement.textContent = monthYearString;
    datesElement.innerHTML = ""; // Clear previous dates



    // Add trailing dates from the previous month to fill the first row of the calendar
    for (let i = firstDayIndex; i > 0; i--) {
        const prevDate = new Date(currentYear, currentMonth, 0 - i + 1);
        datesElement.insertAdjacentHTML("beforeend", `<div class="date inactive">${prevDate.getDate()}</div>`); // Add leading dates from the previous month
    }

    // Add current month's dates and highlight today as active
    for (let i = 1; i <= totalDays; i++) {
        const date = new Date(currentYear, currentMonth, i);
        let dateDiv = document.createElement("div");
        dateDiv.classList.add("date");

        if (date.toDateString() === new Date().toDateString()) {
            dateDiv.classList.add("active"); // Highlight today's date
        }

        dateDiv.textContent = i; // Set the date number
        dateDiv.addEventListener("click", () => { dateClicked(date); }); // Add click event listener to each date

        datesElement.appendChild(dateDiv); // Append the date div to the calendar
    }
    
    // Add leading dates from the next month to complete the last row of the calendar
    for (let i = 1; i <= 6 - lastDayIndex; i++) {
        const nextDate = new Date(currentYear, currentMonth + 1, i);
        datesElement.insertAdjacentHTML("beforeend", `<div class="date inactive">${nextDate.getDate()}</div>`); // Add trailing dates from the next month
    }
}

// Add click event listeners to navigate between months
prevButton.addEventListener("click", () => {
    currentDate.setMonth(currentDate.getMonth() - 1); // Go to the previous month
    updateCalendar(); // Refresh the calendar view
});

nextButton.addEventListener("click", () => {
    currentDate.setMonth(currentDate.getMonth() + 1); // Go to the next month
    updateCalendar(); // Refresh the calendar view
});

function dateClicked(date) {
    alert("You clicked on " + date); // Alert the clicked date //function to handle date clicks
    fetch("DBQueries/getcalendarevents.php")
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log(data); // Handle the data received from the server
            // You can update the UI or perform other actions with the data here

        });
}

// Initial call to display the calendar when the page loads
updateCalendar();
console.log("Calendar initialized for " + currentDate.toLocaleString("default", { month: "long", year: "numeric" }));
console.log(5 + 5); // Example of a simple calculation