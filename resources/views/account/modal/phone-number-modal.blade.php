
<div class="modal fade" 
     id="phoneNumber" 
     tabindex="-1" role="dialog" 
     aria-labelledby="phoneNumberLabel" 
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content  shadow border-light rounded-3">
        <div class="modal-header border-light">
          <h5 class="modal-title" id="phoneNumberLabel">Add Phone Number</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body border-light">
        <form action="{{ route('number.add') }}" method="post">
          @csrf
          <div class="input-group align-items-center">
              <div class="input-group-prepend">
                  <select class="custom-select" name="countryCodeInput" style="height: 38px;">
                      <option value="+1" >+1 (US)</option>
                      <option value="+1" >+1 (US)</option>
                      <option value="+1" >+1 (US)</option>
                      <!-- Add more options for other countries as needed -->
                  </select>
              </div>
              <input name="phoneNumberInput" type="tel" class="form-control" 
                     style="height: 38px;" placeholder="Enter Phone Number">
          </div>
        <div class="modal-footer border-light">
          <button type="submit" class="btn btn-custom-color">Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          
        </div></form>
      </div>
    </div>
</div>