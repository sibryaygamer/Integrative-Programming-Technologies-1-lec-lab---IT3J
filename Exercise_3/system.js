const searchInput = document.getElementById("searchInput");

const teamMembers = document.querySelectorAll(".detail-card");

searchInput.addEventListener("input", function () {
  const searchText = searchInput.value;

  console.log(searchText);

  teamMembers.forEach(function (member) {
    const name = member.querySelector(".detail-name").textContent;

    const matches = name.toLowerCase().includes(searchText.toLowerCase());

    member.style.display = matches ? "" : "none";
  });
});

// Header menu toggle (click to open/close)
const menuButton = document.getElementById("menuToggle");

const menu = document.querySelector(".header-menu");

menuButton.addEventListener("click", function () {
  menu.classList.toggle("open");
});

const readMore = document.querySelector(".read-more");

readMore.addEventListener("click", function () {});
