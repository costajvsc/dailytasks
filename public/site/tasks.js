const deleteTask = task => {
    const inputID = document.querySelector("[data-js=input-id-task-delete]")
    const id = document.querySelector("[data-js=id-task-delete]")
    const title = document.querySelector("[data-js=title-task-delete]")
    const description = document.querySelector("[data-js=description-task-delete]")
    const milestone = document.querySelector("[data-js=milestone-task-delete]")
    const status = document.querySelector("[data-js=status-task-delete]")

    inputID.value = task.id_tasks
    id.innerHTML = task.id_tasks
    title.innerHTML = task.title
    description.innerHTML = task.description
    milestone.innerHTML = task.milestone
    status.innerHTML = task.status
}

const updateTask = task => {
    const id = document.querySelector("[data-js=id-task-update]")
    const title = document.querySelector("[data-js=title-task-update]")
    const description = document.querySelector("[data-js=description-task-update]")
    const milestone = document.querySelector("[data-js=milestone-task-update]")
    const status = document.querySelector("[data-js=status-task-update]")

    var milestoneTransform = new Date(task.milestone)
    milestoneTransform.setMinutes(milestoneTransform.getMinutes() - milestoneTransform.getTimezoneOffset())

    id.value = task.id_tasks
    title.value = task.title
    description.value = task.description
    milestone.value = milestoneTransform.toISOString().slice(0,16)
    status.value = task.status
}