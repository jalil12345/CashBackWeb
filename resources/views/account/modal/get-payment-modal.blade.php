
<div class="modal fade" 
     id="getPaymentModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="getPaymentModalLabel" 
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content  shadow border-light rounded-3">
        <div class="modal-header border-light">
          <h5 class="modal-title " id="getPaymentModalLabel">Get payment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
      
        
      @if ($email_verified === null)
        <div class="modal-body border-light">
        <form action="{{ route('email.send') }}" method="post">
          @csrf
          <div class="input-group align-items-center">
              <p class="">your email is not verified yet 
                click send to get email verification
              </p>
          </div>
        <div class="modal-footer border-light">
          <button type="submit" class="btn btn-custom-color">Send</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          
        </div></form>
      </div>
      @else
        @if ($payableBalance <= 0.01)
       <p class="text-center h5">You didn't reach the minimum amount yet.</p>
       <p class="text-center ">the minimum amount is 0.01$</p>
       @else
      <div class="modal-body border-light">
          <p class="h5  text-center">your payable amount :
            <span class="h5 fw-bold text-success text-center">{{$payableBalance}} $ </span> </p>
          <p class="text-center">we will send you code verification to your email </p>
          <div class="modal-footer border-light justify-content-center">
            <a href="{{ url('get-payment') }}"
              class="btn btn-custom-color text-center">Send Code</a>
            </div>
        </div>
        @endif
        @endif
    </div>
</div>