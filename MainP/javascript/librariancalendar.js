const librarianTitles = {
    lib1: "Sarah Johnson",
    lib2: "David Lee",
    lib3: "Maria Kim",
    lib4: "James Blake",
    lib5: "Amina Yusuf"
  };
  
  const librarianId = sessionStorage.getItem("selectedLibrarian") || "lib1";
  const librarianName = librarianTitles[librarianId] || "Librarian";
  
  document.getElementById("calendar-librarian-name").textContent = `Availability for ${librarianName}`;
  
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
  
      const isBooked = Math.random() < 0.2;
      cell.className = isBooked ? "booked" : "available";
      cell.textContent = isBooked ? "Booked" : "Available";
  
      if (!isBooked) {
        cell.addEventListener("click", () => {
          alert(`You booked ${librarianName} on ${day} at ${time}`);
          cell.className = "booked";
          cell.textContent = "Booked";
        });
      }
  
      row.appendChild(cell);
    });
  
    calendarBody.appendChild(row);
  });
  