
// DROPDOWN
document.querySelectorAll('.custom-dropdown').forEach(dd => {
  const input = dd.querySelector('.dropdown-input');
  const list = dd.querySelector('.dropdown-options');

  input.onclick = () => {
    dd.classList.toggle('open');
    list.style.display = list.style.display === 'block' ? 'none' : 'block';
  };

  list.querySelectorAll('li').forEach(li => {
    li.onclick = () => {
      input.querySelector('span').innerText = li.innerText;
      list.style.display = 'none';
      dd.classList.remove('open');
    };
  });

  document.addEventListener('click', e => {
    if (!dd.contains(e.target)) {
      list.style.display = 'none';
      dd.classList.remove('open');
    }
  });
});

/**Add contact section for form **/
const options = document.querySelectorAll(".dropdown-options li");
const selectedText = document.getElementById("selectedCategory");
const hiddenInput = document.getElementById("travelCategory");

options.forEach(option => {
  option.addEventListener("click", function () {
    selectedText.textContent = this.textContent;
    hiddenInput.value = this.textContent;
  });
});