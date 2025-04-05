const roomData = {
    room1: {
      title: "Room A",
      capacity: "4 People",
      floor: "2nd Floor",
      description: "A cozy room with a whiteboard and AC.",
    },
    room2: {
      title: "Room B",
      capacity: "6 People",
      floor: "1st Floor",
      description: "Spacious room with presentation screen.",
    }
  };
  
  function showRoomDetails(roomId) {
    const room = roomData[roomId];
    document.getElementById('room-title').textContent = room.title;
    document.getElementById('room-capacity').textContent = room.capacity;
    document.getElementById('room-floor').textContent = room.floor;
    document.getElementById('room-description').textContent = room.description;
  
    document.getElementById('room-details').classList.remove('hidden');
  
    // Save roomId for calendar redirect
    sessionStorage.setItem('selectedRoom', roomId);
  }
  
  function redirectToCalendar() {
    // Redirect to calendar page with room info passed in query string or session
    window.location.href = "roomcalendar.html";
  }
  