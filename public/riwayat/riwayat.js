document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.querySelector(".sidebar");
  const toggleButton = sidebar.querySelector(".icon");
  const iconCompact = document.getElementById("toggleIcon");
  const iconExpanded = document.getElementById("toggleIconExpanded");
  const dashboard = document.getElementById("dashboard");
  const history = document.getElementById("history");
  const logout = document.getElementById("logout");
  const person = document.getElementById("person");
  


  toggleButton.addEventListener("click", function () {
    sidebar.classList.toggle("expanded");

    if (sidebar.classList.contains("expanded")) {
      iconCompact.style.display = "none";
      iconExpanded.style.display = "inline-block";
    } else {
      iconCompact.style.display = "inline-block";
      iconExpanded.style.display = "none";
    }
  });

  person.addEventListener("click", function () {
    window.location.href = "../profil/profil.html";
});

  dashboard.addEventListener("click", function () {
      window.location.href = "../afterlogin/afterlogin.html";
  });
 
  history.addEventListener("click", function () {
      window.location.href = "../riwayat/riwayat.html";
  });
 
  logout.addEventListener("click", function () {
      window.location.href = "../landingpage/landingpage.html";
    });
})