
 <div 
  class="modal fade" 
  id="userName" 
  tabindex="-1" 
  role="dialog" 
  aria-labelledby="userNameLabel" 
  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="userNameLabel">Change User Name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('account-details.change-user-name') }}" method="post">
            @csrf
          <input 
          id="changeUserNameInput" name="changeUserNameInput" type="text" class="form-control" 
          placeholder="Enter New User Name">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-pink">Save changes</button>
        </div>
       </form>
      </div>
    </div>
</div>







