const agreeCheckbox = document.getElementById("agreeCheckbox");
const acceptButton = document.getElementById("acceptButton");
const cancelButton = document.getElementById("cancelButton");

agreeCheckbox.addEventListener("change", () => {
  if (agreeCheckbox.checked) {
    acceptButton.disabled = false;
  } else {
    acceptButton.disabled = true;
  }
});

cancelButton.addEventListener("click", () => {
  alert("You cancelled the agreement.");
});

acceptButton.addEventListener("click", () => {
  alert("You accepted the Terms and Conditions.");
});

document.getElementById("acceptButton").disabled = false;

document.getElementById("acceptButton").addEventListener("click", function () {
  window.location.href = "/pinjambuku/pinjambuku.html";
});
