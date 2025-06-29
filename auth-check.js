// auth-check.js

(function () {
  const role = localStorage.getItem("role");
  const userid = localStorage.getItem("userid");

  const page = window.location.pathname.split("/").pop();

  const allowedPages = {
    "principal-dashboard.html": "Principal",
    "admin-dashboard.html": "Admin",
    "chairman-dashboard.html": "Chairman",
    "teacher-dashboard.html": "Teacher",
    "coordinator-dashboard.html": "Coordinator",
    "student-dashboard.html": "Student"
  };

  if (!userid || !role || allowedPages[page] !== role) {
    alert("Access Denied! Please log in.");
    window.location.href = "userlogin.html";
  }
})();
