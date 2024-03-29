<div class="modal" tabindex="-1" id="modal-update-tasks">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Update tasks</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/tasks" method="post">
              @csrf
              @method('put')
              <input type="hidden" name="id_tasks" value="" data-js="id-task-update">
              <div class="form-group">
                  <label for="title">Title task</label>
                  <input type="text" id="title" class="form-control" name="title" maxlength="25" data-js="title-task-update" required>
              </div>
              <div class="form-group">
                  <label for="description">Description task</label>
                  <textarea id="description" class="form-control" name="description"  style="overflow:auto;resize:none" rows="3" max-length="255" data-js="description-task-update" required></textarea>
              </div>
              <div class="form-group">
                  <label for="milestone">Milestone</label>
                  <input type="datetime-local" class="form-control" id="milestone" name="milestone" data-js="milestone-task-update" required>
              </div>

              <div class="form-group">
                  <label for="status">status</label>
                  <input list="list-status" class="form-control" id="status" name="status" placeholder="To Do" data-js="status-task-update" required>
                  <datalist id="list-status">
                      <option value="To Do">To Do</option>
                      <option value="Doing">Doing</option>
                      <option value="Done">Done</option>
                  </datalist>
              </div>
              <div class="d-flex justify-content-end mb-2">
                  <button type="button" class="btn btn-outline-secondary mr-2" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save task</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
