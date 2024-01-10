const articlesContainer = document.getElementById("articles");
const postsContainer = document.querySelector(".posts-container");
const tagsContainer = document.querySelector(".tags-container");

const renderWikiArticle = (obj = {}) =>
  `<wiki-article 
        title=${obj.title} 
        description=${obj.content} 
        author=${obj.username} 
        category=${obj.cat_name} 
        img=${obj.img} 
        date=${obj.createdAt}
    ></wiki-article>`;

const renderWikiPost = (obj = {}) =>
  `<wiki-post 
        title=${obj.title} 
        img=${obj.img} 
        date=${obj.createdAt} 
    ></wiki-post>`;

async function fetchWikis() {
  const req = await fetch("/wikis");
  const res = await req.json();
  res.forEach((wiki) =>
    articlesContainer.insertAdjacentHTML("beforeend", renderWikiArticle(wiki))
  );
}

async function fetchLastWikis() {
  const req = await fetch("/lastWikis");
  const res = await req.json();
  res.forEach((wiki) =>
    postsContainer.insertAdjacentHTML("beforeend", renderWikiPost(wiki))
  );
}

async function fetchTags() {
  const req = await fetch("/tags");
  const res = await req.json();
  res.forEach((tag) =>
    tagsContainer.insertAdjacentHTML("beforeend", `<a href="#">${tag.name}</a>`)
  );
}

fetchWikis();
fetchLastWikis();
fetchTags();
