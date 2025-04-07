fetch('posts.json')
  .then(response => response.json())
  .then(posts => {
    const container = document.getElementById('blog-posts');
    
    // Create a responsive row
    const row = document.createElement('div');
    row.className = 'row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4';
    
    posts.forEach(post => {
      // Create Bootstrap card for each post
      const col = document.createElement('div');
      col.className = 'col';
      
      col.innerHTML = `
        <div class="card h-100 shadow-sm">
          <img src="${post.image}" class="card-img-top" alt="${post.title}" style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">${post.title}</h5>
            <p class="card-text"><small class="text-muted">${post.date}</small></p>
            <p class="card-text">${post.content}</p>
          </div>
        </div>
      `;
      
      row.appendChild(col);
    });
    
    container.appendChild(row);
  })
  .catch(error => {
    console.error('Error loading posts:', error);
    document.getElementById('blog-posts').innerHTML = `
      <div class="alert alert-danger" role="alert">
        Failed to load blog posts. Please try again later.
      </div>
    `;
  });