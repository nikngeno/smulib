const roomId = sessionStorage.getItem('selectedRoom') || "Room";

const roomTitles = {
  room1: "Room A",
  room2: "Room B"
};

document.getElementById("calendar-room-name").textContent = `${roomTitles[roomId] || roomId} Availability`;

const times = [
  "9:00 AM", "10:00 AM", "11:00 AM", 
  "12:00 PM", "1:00 PM", "2:00 PM", 
  "3:00 PM", "4:00 PM"
];

const days = ["Mon", "Tue", "Wed", "Thu", "Fri"];

const calendarBody = document.getElementById("calendar-body");

times.forEach(time => {
  const row = document.createElement("tr");

  const timeCell = document.createElement("td");
  timeCell.textContent = time;
  row.appendChild(timeCell);

  days.forEach(day => {
    const cell = document.createElement("td");
    
    const isBooked = Math.random() < 0.3; // simulate some slots being booked
    cell.className = isBooked ? "booked" : "available";
    cell.textContent = isBooked ? "Booked" : "Available";

    if (!isBooked) {
      cell.addEventListener("click", () => {
        alert(`You booked ${roomTitles[roomId] || roomId} on ${day} at ${time}`);
        cell.className = "booked";
        cell.textContent = "Booked";
      });
    }

    row.appendChild(cell);
  });

  calendarBody.appendChild(row);
});
