function handleSwitch() {
  const currentURL = window.location.href;
  const url = new URL(currentURL);
  const page = url.searchParams.get("page");
  switchPage(page);
  highlight(page);
  handleBreadCrumbs(page);
}

handleSwitch();

function handleBreadCrumbs(page) {
  const breadCrumbPage = document.getElementById("breadCrumbPage");
  const pageTitle = document.getElementById("pageTitle");
  if (!page) return;
  breadCrumbPage.innerText = capitalizeFirstLetter(page);
  pageTitle.innerText = capitalizeFirstLetter(page);
}

function highlight(page) {
  const sidebarLinks = document.querySelectorAll("#sidebar-nav .nav-link");

  sidebarLinks.forEach((link) => {
    link.classList.add("collapsed");
    if (link.dataset.active == page) {
      link.classList.remove("collapsed");
    }
  });

  if (!page) {
    sidebarLinks[0].classList.remove("collapsed");
  }
}

function switchPage(page) {
  const sections = document.querySelectorAll(".section");
  sections.forEach((section) => {
    section.classList.add("hidden");

    if (section.classList.contains(page)) {
      section.classList.remove("hidden");
    }
  });

  if (!page) {
    sections[0].classList.remove("hidden");
  }
}

function capitalizeFirstLetter(inputString) {
  return inputString.charAt(0).toUpperCase() + inputString.slice(1);
}
