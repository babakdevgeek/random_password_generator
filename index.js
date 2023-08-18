$password_p = document.querySelector(".password");
$password_p.onclick = function () {
  document.execCommand("copy");
  $password_p.classList.add("active");
  setTimeout(() => {
    $password_p.classList.remove("active");
  }, 1000);
  const text = $password_p.textContent;
};
