const template = document.createElement("template");
template.innerHTML = `
    <div style="margin-top: 25px" class="item">
        <img src="assets/img/latest-posts-1.jpg" alt="post 1" class="post-image">
        <div class="info-post">
            <h5><a href="#">MAECENAS <br> CONSECTETUR</a></h5>
            <span class="date">07 JUNE 2016</span>
        </div>
        <div class="clearfix"></div>
    </div>
`;

class WikiPostComponent extends HTMLElement {
  constructor() {
    super();

    this.appendChild(template.content.cloneNode(true));
  }

  static get observedAttributes() {
    return ["img", "title", "date"];
  }

  //
  get title() {
    return this.getAttribute("title");
  }
  set title(value) {
    return this.setAttribute("title", value);
  }
  get img() {
    return this.getAttribute("img");
  }
  set img(value) {
    return this.setAttribute("img", value);
  }
  get date() {
    return this.getAttribute("date");
  }
  set date(value) {
    return this.setAttribute("date", value);
  }

  //
  attributeChangedCallback(attrName, oldVal, newVal) {
    switch (attrName.toLowerCase()) {
      case "title":
        this.querySelector("h5 a").textContent = newVal;
        break;
      case "img":
        this.querySelector("img").src = newVal;
        break;
      case "date":
        this.querySelector(".date").textContent = newVal;
        break;
    }
  }
}

customElements.define("wiki-post", WikiPostComponent);
