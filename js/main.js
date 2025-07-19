fetch('data/notices.json')
  .then(res => res.json())
  .then(data => {
    const list = document.getElementById('notice-list');
    data.slice(0, 3).forEach(notice => {
      const li = document.createElement('li');
      li.textContent = `${notice.date} - ${notice.title}`;
      list.appendChild(li);
    });
  })
  .catch(err => {
    document.getElementById('notice-list').innerHTML = "<li>Unable to load notices.</li>";
  });
