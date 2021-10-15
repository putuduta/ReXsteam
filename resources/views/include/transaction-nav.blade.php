<div class="row">
    <div class="col-lg-4">
        <div class="card bg-transparent border border-white">
            <div class="card-body d-flex align-items-center">
                <div style="width:50px;height:50px"
                    class="d-flex align-items-center justify-content-center border rounded-circle border-white">
                    @if(Route::currentRouteName() == 'cart.index')
                    01
                    @else
                    <i class="fa fa-check fa-2x text-dark"></i>
                    @endif
                </div>
                <h4 class="font-weight-bold text-dark ml-4">Shopping Cart</h4>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card bg-transparent border border-white">
            <div class="card-body d-flex align-items-center">
                <div style="width:50px;height:50px"
                    class="d-flex align-items-center justify-content-center border rounded-circle border-white">
                    @if(Route::currentRouteName() == 'transactions.receipt')
                    <i class="fa fa-check fa-2x text-dark"></i>
                    @else
                    02
                    @endif
                </div>
                <h4 class="text-dark ml-4">Transaction Information</h4>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card bg-transparent border border-white">
            <div class="card-body d-flex align-items-center">
                <div style="width:50px;height:50px"
                    class="d-flex align-items-center justify-content-center border rounded-circle border-white">
                    03
                </div>
                <h4 class="text-dark ml-4">Transaction Receipt</h4>
            </div>
        </div>
    </div>
</div>
