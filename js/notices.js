fetch('https://yourgithubusername.github.io/data/notices.json')
  .then(response => response.json())
  .then(data => {
    const container = document.getElementById('notices-list');
    data.forEach(notice => {
      const card = document.createElement('div');
      card.className = 'col-md-6 mb-3';
      card.innerHTML = `
        <div class="card h-100 shadow">
          <div class="card-body">
            <h5 class="card-title">${notice.title}</h5>
            <p class="card-text">${notice.description}</p>
            <small class="text-muted">Date: ${notice.date}</small>
          </div>
        </div>`;
      container.appendChild(card);
    });
  })
  .catch(error => console.error('Failed to load notices:', error));
