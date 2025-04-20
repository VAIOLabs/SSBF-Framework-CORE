 export async function postLoader() {
  const container = document.getElementById("posts-container");
  if (!container) return;

  try {
    const response = await fetch('../posts/index.json');
    const postFiles = await response.json();

    if (!postFiles.length) {
      container.innerHTML = "<p>Brak postów.</p>";
      return;
    }

    container.innerHTML = "";

    // Wczytaj od najnowszego
    const sortedPosts = postFiles.reverse();

    for (const file of sortedPosts) {
      const res = await fetch(`posts/${file}`);
      const post = await res.json();

      const postElement = document.createElement("div");
      postElement.style = "border:1px solid #ccc; padding:1em; margin-bottom:1em;";
      postElement.innerHTML = `
        <h2>${post.title}</h2>
        <p><i>${post.date}</i></p>
        <p>${post.content}</p>
      `;

      container.appendChild(postElement);
    }

  } catch (err) {
    container.innerHTML = '<p>Błąd ładowania postów.</p>';
    console.error("Błąd:", err);
  }
}
