<div class="modal" tabindex="-1" id="modal-delete-tasks">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Delete task</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/tasks" method="post">
              @csrf
              @method('delete')
              <input type="hidden" name="id_task" value="" data-js="input-id-task-delete">
              <h5>Those follow data will <span class="text-danger">lose</span>!</h5>
              <ul>
                  <li>
                      <b># Task</b> <span data-js="id-task-delete">1</span>
                  </li>
                  <li>
                      <b>Title</b> <span data-js="title-task-delete">Title</span>
                  </li>
                  <li>
                      <b>Description </b> <span data-js="description-task-delete">Description</span>
                  </li>
                  <li>
                      <b>Milestone: </b> <span data-js="milestone-task-delete">Milestone</span>
                  </li>
                  <li>
                      <b>Status: </b> <span data-js="status-task-delete">Status</span>
                  </li>
              </ul>
              <div class="d-flex justify-content-end mb-2">
                  <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-outline-danger">Delete task</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
