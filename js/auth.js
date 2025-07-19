const users = [
  { username: "student01", password: "sjvm123", role: "Student", branch: "Bandikodigenahalli" },
  { username: "teacher02", password: "teach2024", role: "Teacher", branch: "Atturu Layout" },
  { username: "coordinator01", password: "coord2024", role: "Coordinator", branch: "Bandikodigenahalli" },
  { username: "admin01", password: "admin123", role: "Admin", branch: "Atturu Layout" },
  { username: "principal", password: "princi@sjvm", role: "Principal", branch: "All" },
  { username: "chairman", password: "sjvm@head", role: "Chairman", branch: "All" }
];

const loginForm = document.getElementById("loginForm");
const message = document.getElementById("message");

loginForm.addEventListener("submit", function(e) {
  e.preventDefault();

  const username = document.getElementById("username").value.trim();
  const password = document.getElementById("password").value.trim();
  const branch = document.getElementById("branch").value;

  // Find user by username and password
  const user = users.find(
    u => u.username === username && u.password === password
  );

  if (!user) {
    message.textContent = "Invalid username or password.";
    return;
  }

  // Check branch access
  if (user.branch !== "All" && user.branch !== branch) {
    message.textContent = "You are not authorized for this branch.";
    return;
  }

  // Login success: save user to localStorage and redirect
  localStorage.setItem("sjvmUser", JSON.stringify({
    username: user.username,
    role: user.role,
    branch: user.branch === "All" ? branch : user.branch
  }));

  window.location.href = "dashboard.html";
});
