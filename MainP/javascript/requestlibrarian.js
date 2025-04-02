const librarianData = {
    lib1: {
      name: "Sarah Johnson",
      specialty: "Literature & Humanities",
      bio: "Sarah has 12 years of experience helping students with literary research, digital humanities tools, and historical archives.",
      img: "people_images/sarah.png"
    },
    lib2: {
      name: "David Lee",
      specialty: "Science & Technology",
      bio: "David specializes in supporting students with STEM databases, citation management tools, and research papers.",
      img: "people_images/David.png"
    },
    lib3: {
      name: "Maria Kim",
      specialty: "Social Sciences",
      bio: "Maria brings deep expertise in psychology, sociology, and qualitative research methods.",
      img: "people_images/Maria.png"
    },
    lib4: {
      name: "James Blake",
      specialty: "Business & Economics",
      bio: "James has worked with hundreds of students on market research, business plans, and financial models.",
      img: "people_images/James.png"
    },
    lib5: {
      name: "Amina Yusuf",
      specialty: "Health & Nursing",
      bio: "Amina is the go-to for nursing students, offering help with evidence-based practice and PubMed research.",
      img: "people_images/Amina.png"
    }
  };
  
  function showLibrarianDetails(id) {
    const lib = librarianData[id];
    document.getElementById("modal-name").textContent = lib.name;
    document.getElementById("modal-specialty").textContent = lib.specialty;
    document.getElementById("modal-bio").textContent = lib.bio;
    document.getElementById("modal-image").src = lib.img;
    document.getElementById("librarianModal").classList.remove("hidden");
  
    sessionStorage.setItem("selectedLibrarian", id);
  }
  
  function closeModal() {
    document.getElementById("librarianModal").classList.add("hidden");
  }
  
  function redirectToLibrarianCalendar() {
    window.location.href = "librariancalendar.html";
  }
  