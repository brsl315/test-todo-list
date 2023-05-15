
var subtasksContainer = document.getElementById("subtasks");
var addSubtaskButton = document.getElementById("add-subtask");

addSubtaskButton.addEventListener("click", function() {
  var subtaskCount = subtasksContainer.children.length;
  var subtaskTemplate = `
    <div class="subtask">
      <input type="text" class="subtask-name" name="subtask-name[]" placeholder="Введите название подзадачи">
      <input type="number" class="subtask-hours" name="subtask-hours[]" placeholder="Часы">
      <button type="button" class="remove-subtask">Удалить</button><br><br>
    </div>
  `;
  subtasksContainer.insertAdjacentHTML("beforeend", subtaskTemplate);
});

subtasksContainer.addEventListener("click", function(event) {
  if (event.target.classList.contains("remove-subtask")) {
    event.target.closest(".subtask").remove();
  }
});