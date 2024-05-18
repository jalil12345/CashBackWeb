
<div class="modal fade " id="accountPassword" tabindex="-1" role="dialog" aria-labelledby="accountPasswordLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content shadow border-light rounded-3 bg-white">
        <div class="modal-header border-light bg-white">
          <h5 class="modal-title" id="accountPasswordLabel">Add Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body border-light">
        <form action="{{ route('password.update0')}}" method="post">
            @csrf
         <div class="mb-3">
         <label for="current_password" class="form-label">Current Password</label>
          <input type="password" id="current_password" name="current_password" class="form-control">
         </div>
       <div class="mb-3">
        <label for="new_password" class="form-label">New Password</label>
        <input type="password" id="new_password" name="new_password" class="form-control">
       </div>
       <div class="mb-3">
        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
        <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control">
       </div>
        <div class="modal-footer border-light">
        <button type="submit" class="btn btn-custom-color">Save</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
      </div>
    </div>
</div>