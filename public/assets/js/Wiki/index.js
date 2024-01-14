const articlesContainer = document.getElementById("articles");
const postsContainer = document.querySelector(".posts-container");
const tagsContainer = document.querySelector(".tags-container");
const searchResults = document.querySelector(".search_results");
const searchResultsUl = searchResults.querySelector("ul");

const renderWikiArticle = (obj = {}) =>
  `<wiki-article 
        title='${obj.title}' 
        author='${obj.author}' 
        category='${obj.category}' 
        img='assets/img/${obj.img}' 
        date='${obj.updatedAt}'
        href='/wiki?id=${obj.id}'
    ></wiki-article>`;

const renderWikiPost = (obj = {}) =>
  `<wiki-post 
        title='${obj.title}' 
        img='assets/img/${obj.img}' 
        date='${obj.updatedAt}' 
        href='/wiki?id=${obj.id}'
    ></wiki-post>`;

async function fetchWikis() {
  const req = await fetch("/wikis");
  const res = await req.json();
  res.forEach((wiki) => {
    if (!wiki.deletedAt)
      articlesContainer.insertAdjacentHTML(
        "beforeend",
        renderWikiArticle(wiki)
      );
  });
}

async function fetchLastWikis() {
  const req = await fetch("/lastWikis");
  const res = await req.json();
  res.forEach((wiki) => {
    if (!wiki.deletedAt)
      postsContainer.insertAdjacentHTML("beforeend", renderWikiPost(wiki));
  });
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

// ##############   Search  ############## :
async function sendData(key, type, columnName = "name", id = "") {
  const req = await fetch(
    `/search?key=${key}&type=${type}&column=${columnName}&id=${id}`
  );
  const res = await req.json();
  if (type == "wiki") {
    articlesContainer.innerHTML = "";
    res.forEach((wiki) => {
      if (!wiki.deletedAt)
        articlesContainer.insertAdjacentHTML(
          "beforeend",
          renderWikiArticle(wiki)
        );
    });
  } else {
    renderSearchResults(res, type);
  }
}

function search(e) {
  e.preventDefault();
  searchResults.classList.add("hidden");
  const keyword = e.currentTarget.querySelector("input[type=search]").value;
  const type = e.currentTarget.querySelector("select").value || "wiki";
  sendData(keyword, type);
}

function searchByResult(e) {
  searchResults.classList.add("hidden");
  const keyword = e.currentTarget.textContent;
  const columnName = e.currentTarget.dataset.target;
  const id = e.currentTarget.dataset.id;
  sendData(keyword, "wiki", columnName, id);
}

function renderSearchResults(items, type) {
  searchResults.classList.remove("hidden");
  searchResultsUl.innerHTML = "";
  items.forEach((item) =>
    searchResultsUl.insertAdjacentHTML(
      "beforeend",
      `<li class="list-group-item" data-id="${item.id}" data-target="${type}" onclick="searchByResult(event)">${item.name}</li>`
    )
  );
}
