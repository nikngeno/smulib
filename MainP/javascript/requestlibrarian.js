const librarianData = {
    lib1: {
      name: "Sarah Johnson",
      specialty: "Literature & Humanities",
      bio: "Sarah has 12 years of experience helping students with literary research, digital humanities tools, and historical archives."
    },
    lib2: {
      name: "David Lee",
      specialty: "Science & Technology",
      bio: "David specializes in supporting students with STEM databases, citation management tools, and research papers."
    },
    lib3: {
      name: "Maria Kim",
      specialty: "Social Sciences",
      bio: "Maria brings deep expertise in psychology, sociology, and qualitative research methods. She loves helping with surveys and analysis."
    },
    lib4: {
      name: "James Blake",
      specialty: "Business & Economics",
      bio: "James has worked with hundreds of students on market research, business plans, and financial models."
    },
    lib5: {
      name: "Amina Yusuf",
      specialty: "Health & Nursing",
      bio: "Amina is the go-to for nursing students, offering help with evidence-based practice and PubMed research."
    }
  };
  
  function showLibrarianDetails(id) {
    const librarian = librarianData[id];
    document.getElementById('librarian-name').textContent = librarian.name;
    document.getElementById('librarian-specialty').textContent = librarian.specialty;
    document.getElementById('librarian-bio').textContent = librarian.bio;
    document.getElementById('librarian-details').classList.remove('hidden');
  
    sessionStorage.setItem("selectedLibrarian", id);
  }
  
  function redirectToLibrarianCalendar() {
    window.location.href = "librariancalendar.html";
  }
  