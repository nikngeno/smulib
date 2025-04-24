// Get references to DOM elements for displaying the month/year, dates, and navigation buttons
const monthYearElement = document.getElementById("monthYear");
const datesElement = document.getElementById("dates");
const prevButton = document.getElementById("prevButton");
const nextButton = document.getElementById("nextButton");

// Initialize the calendar with the current date
let currentDate = new Date();

// Function that handles what happens when a user clicks a date in the calendar
function dateClicked(date) { 
    // Convert the clicked JavaScript Date object into 'YYYY-MM-DD' format,
    // which is the expected format for the server query
    const formattedDate = date.toISOString().split('T')[0];

    // Call the updateEvent function, passing the formatted date
    // (Delegates responsibility for fetching and updating the event list)
    updateEvent(formattedDate);
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

// Function that is triggered when a user clicks on a date in the calendar
function dateClicked(date) { 

    // Convert the clicked JavaScript Date object into a 'YYYY-MM-DD' string format
    // (This is the format expected by the server-side PHP script)
    const formattedDate = date.toISOString().split('T')[0];

    // Send a GET request to the PHP script, including the selected date as a query parameter
    fetch(`../DBQueries/getcalendarevents.php?date=${formattedDate}`)

        // Handle the server's response
        .then(response => {
            // If the server responds with a non-success HTTP status (like 404, 500),
            // throw an error to be caught later
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            // If the response is OK (status 200), parse the response body as JSON
            return response.json();
        })

        // Once the JSON is parsed successfully
        .then(events => {
            // Log the event data to the browser console for developer testing and debugging
            console.log(events);

            // Pass the event data to the displayEvents function
            // This function will dynamically update the event list shown on the page
            //console.log('made it!');
            updateEvent(events);
        })

        // Catch any errors that occur during fetch, response handling, or JSON parsing
        .catch(error => {
            // Log any errors to the browser console for debugging
            console.error('Error fetching events:', error);
        });
}
function updateEvent(events) {
    const eventholder = document.getElementById("calendar-events-holder");
    eventholder.innerHTML = "";
    if (events.length === 0) {
        eventholder.innerHTML = '<div class="event-item"><div class = "event-header">No events found for this date.</div></div>';
        return;
    }
    events.forEach(event => {
        let eventTemplate = `
            <div class="event-item">
                <div class="event-header">
                    <span>Date-time: ${event["EventsDate"]}, ${event["EventTime"]}</span>
                    <span class="event-title">Event Title: ${event["EventName"]}</span>
                    <span>Location: ${event["EventLocation"]}</span>
                </div>
                <div>
                    <p>Description: ${event["EventDescription"]}</p>
                </div>
            </div>
        `;

        eventholder.insertAdjacentHTML('beforeend', eventTemplate);
    });
}
// Initial call to display the calendar when the page loads
updateCalendar();
dateClicked(currentDate); // Call dateClicked with the current date to fetch events for today   
console.log("Calendar initialized for " + currentDate.toLocaleString("default", { month: "long", year: "numeric" }));
console.log(5 + 5); // Example of a simple calculation