const alertClose = document.querySelector(".alert-close");
const messageAlert = document.querySelector(".message-alert");

if (alertClose && messageAlert) {
  alertClose.addEventListener("click", function () {
    messageAlert.remove();
  });
}

const form = document.querySelector("#simple-message-form");

if (form) {
  const list = document.querySelector("#messages-list");
  const status = document.querySelector("#status");
  let currentMessages = JSON.parse(
    document.querySelector("#initial-messages").textContent,
  );

  async function send(data) {
    const response = await fetch("messages.php", {
      method: "POST",
      body: data,
    });
    return response.json();
  }

  function showStatus(text, error = false) {
    status.textContent = text;
    status.className = "comment-status " + (error ? "error" : "success");
  }

  function showMessages(messages) {
    list.innerHTML = "";
    messages.forEach((comment) => {
      const card = document.createElement("article");
      card.className = "message-card";
      card.innerHTML = `
      <div class="message-user">
      <div class="user-avatar">
      </div><div><h3></h3>
      </div>
      </div>
      <div class="message-content">
      <p></p>
      </div>
      <div class="comment-actions">
      <button type="button" class="comment-action edit">Edit</button>
      <button type="button" class="comment-action delete">Delete</button>
      </div>`;
      card.querySelector(".user-avatar").textContent =
        comment.name[0].toUpperCase();
      card.querySelector("h3").textContent = comment.name;
      card.querySelector("p").textContent = comment.message;
      card.querySelector(".edit").onclick = () => edit(comment, card);
      card.querySelector(".delete").onclick = () => remove(comment.id);
      list.append(card);
    });
  }

  form.onsubmit = async (event) => {
    event.preventDefault();
    const data = new FormData(form);
    data.append("action", "add");
    const result = await send(data);
    showStatus(result.reply, !result.success);
    if (result.success) {
      currentMessages = result.messages;
      showMessages(currentMessages);
      form.reset();
    }
  };

  function edit(comment, card) {
    const nameInput = document.createElement("input");
    const messageInput = document.createElement("textarea");
    const saveButton = document.createElement("button");
    const cancelButton = document.createElement("button");
    nameInput.value = comment.name;
    messageInput.value = comment.message;
    nameInput.className = "edit-input";
    messageInput.className = "edit-input edit-textarea";
    saveButton.textContent = "Save";
    cancelButton.textContent = "Cancel";
    saveButton.className = "comment-action edit";
    cancelButton.className = "comment-action";
    saveButton.type = cancelButton.type = "button";
    card
      .querySelector(".message-user div:last-child")
      .replaceChildren(nameInput);
    card.querySelector(".message-content").replaceChildren(messageInput);
    card
      .querySelector(".comment-actions")
      .replaceChildren(saveButton, cancelButton);
    messageInput.focus();

    cancelButton.onclick = () => showMessages(currentMessages);
    saveButton.onclick = async () => {
      if (!nameInput.value.trim() || !messageInput.value.trim()) {
        return showStatus("Enter both your name and message.", true);
      }
      const data = new FormData();
      data.append("action", "edit");
      data.append("id", comment.id);
      data.append("name", nameInput.value);
      data.append("message", messageInput.value);
      const result = await send(data);
      showStatus(result.reply, !result.success);
      if (result.success) {
        currentMessages = result.messages;
        showMessages(currentMessages);
      }
    };
  }

  async function remove(id) {
    if (!confirm("Delete this message?")) return;
    const data = new FormData();
    data.append("action", "delete");
    data.append("id", id);
    const result = await send(data);
    showStatus(result.reply, !result.success);
    if (result.success) {
      currentMessages = result.messages;
      showMessages(currentMessages);
    }
  }

  showMessages(currentMessages);
}
