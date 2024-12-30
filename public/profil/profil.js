document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.querySelector(".sidebar");
  const toggleButton = sidebar.querySelector(".icon");
  const iconCompact = document.getElementById("toggleIcon");
  const iconExpanded = document.getElementById("toggleIconExpanded");
  const dashboard = document.getElementById("dashboard");
  const history = document.getElementById("history");
  const logout = document.getElementById("logout");
  const person = document.getElementById("person");
  // Ambil URL dari Laravel route
  const indexUrl = "../" + "{{ route('index') }}"; // Laravel Route URL untuk 'index'
  const profileUrl = "../" + "{{ route('profile') }}"; 


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
    window.location.href = profileUrl;
});

  dashboard.addEventListener("click", function () {
    window.location.href = indexUrl;
  });
 
  history.addEventListener("click", function () {
      window.location.href = "../riwayat/riwayat.html";
  });
 
  logout.addEventListener("click", function () {
      window.location.href = indexUrl;
    });
})

document.getElementById('editButton').addEventListener('click', function() {
  // Enable input fields
  document.getElementById('fullname').disabled = false;
  document.getElementById('username').disabled = false;
  document.getElementById('phonenumber').disabled = false;
  document.getElementById('address').disabled = false;

  // Show save button and hide edit button
  this.style.display = 'none';
  document.getElementById('saveButton').style.display = 'inline-block';  // Perbaiki tanda kutip dan kurung
});

document.getElementById('saveButton').addEventListener('click', function() {
  // Mengambil data form menggunakan FormData
  const formData = new FormData(document.getElementById('profileForm'));
});
