
<div class="modal fade" id="phoneNumber" tabindex="-1" role="dialog" aria-labelledby="phoneNumberLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="phoneNumberLabel">Add Phone Number</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('email.save') }}" method="post">
            @csrf
          <input name="paymentEmailVerification" type="email" class="form-control" 
          placeholder="Enter Phone Number">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-pink">Save changes</button>
          
        </div></form>
      </div>
    </div>
</div>