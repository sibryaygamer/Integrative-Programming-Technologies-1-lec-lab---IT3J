// Message alert close

const alertClose = document.querySelector(".alert-close");

const messageAlert = document.querySelector(".message-alert");

if (alertClose && messageAlert) {
  alertClose.addEventListener("click", function () {
    messageAlert.remove();
  });
}
