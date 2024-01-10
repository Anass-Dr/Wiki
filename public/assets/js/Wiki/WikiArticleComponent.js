const template = document.createElement("template");
template.innerHTML = `
    <article>
        <div class="post-image">
            <img src="" alt="wiki_image">
            <div class="category"><a href="#">IMG</a></div>
        </div>
        <div class="post-text">
            <span class="date">07 Jun 2016</span>
            <h2><a href="#">MAECENAS CONSECTETUR</a></h2>
            <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.
                Nunc maximus arcu sit amet accumsan imperdiet. Aliquam elementum efficitur ipsum nec blandit.
                Pellentesque posuere vitae metus sed auctor. Nullam accumsan fringilla ligula non pellentesque.
                <a href="#"><i class="icon-arrow-right2"></i></a>
            </p>
        </div>
        <div class="post-info">
            <div class="post-by">Post By <a href="#">AD-Theme</a></div>
            <div class="extra-info">
                <a href="#"><i class="icon-facebook5"></i></a>
                <a href="#"><i class="icon-twitter4"></i></a>
                <a href="#"><i class="icon-google-plus"></i></a>
                <span class="comments">25 <i class="icon-bubble2"></i></span>
            </div>
            <div class="clearfix"></div>
        </div>
    </article>
`;

class Wiki extends HTMLElement {
  constructor() {
    super();

    let clone = template.content.cloneNode(true);
    this.appendChild(clone);
  }

  static get observedAttributes() {
    return ["img", "date", "title", "description", "author", "category"];
  }

  //
  get img() {
    return this.getAttribute("img");
  }
  set img(value) {
    this.setAttribute("img", value);
  }
  get date() {
    return this.getAttribute("date");
  }
  set date(value) {
    this.setAttribute("date", value);
  }
  get title() {
    return this.getAttribute("title");
  }
  set title(value) {
    this.setAttribute("title", value);
  }
  get description() {
    return this.getAttribute("description");
  }
  set description(value) {
    this.setAttribute("description", value);
  }
  get author() {
    return this.getAttribute("author");
  }
  set author(value) {
    this.setAttribute("author", value);
  }
  get category() {
    return this.getAttribute("category");
  }
  set category(value) {
    this.setAttribute("category", value);
  }

  //
  attributeChangedCallback(attrName, oldVal, newVal) {
    switch (attrName.toLowerCase()) {
      case "img":
        this.querySelector(".post-image img").src = newVal;
        break;
      case "date":
        this.querySelector(".date").textContent = newVal;
        break;
      case "title":
        this.querySelector("h2 a").textContent = newVal;
        break;
      case "description":
        this.querySelector("p.text").textContent = newVal;
        break;
      case "author":
        this.querySelector(".post-by a").textContent = newVal;
        break;
      case "category":
        this.querySelector(".category a").textContent = newVal;
        break;
    }
  }
}

customElements.define("wiki-article", Wiki);
