
// HOME — EXPANDING FLEX CARDS LITERATURA
const options = document.querySelectorAll(".literatura .option");

options.forEach(option => {
  option.addEventListener("click", () => {
    options.forEach(o => o.classList.remove("active"));
    option.classList.add("active");
  });
});

