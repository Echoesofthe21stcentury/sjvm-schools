function toggleMenu() {
  const nav = document.querySelector('.nav-links');
  nav.classList.toggle('active');
}

// Load notices
fetch('data/notices.json')
  .then(res => res.json())
  .then(data => {
    const noticeList = document.getElementById('notice-list');
    data.notices.forEach(n => {
      const li = document.createElement('li');
      li.textContent = n;
      noticeList.appendChild(li);
    });
  });
