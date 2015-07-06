<div class="form-group">
    <label class="col-md-4 control-label">Select User</label>

    <div class="col-md-6">
        <select name="user_id" select="{{$transaction['user_id']}}" id="user_name" class="form-control select2">
            @foreach($users as $user)
                <option value="{{$user['id']}}">{{$user['name']}}-{{$user['email']}} ({{$user['id']}})</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Cashback</label>

    <div class="col-md-6">
        <input type="text" name="amount" value="{{$transaction['amount']}}" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Transaction ID</label>

    <div class="col-md-6">
        <input type="text" name="transaction_id" value="{{$transaction['transaction_id']}}" class="form-control">
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Retailer</label>

    <div class="col-md-6">
        <select name="retailer" select="{{$transaction['retailer']}}" id="user_name" class="form-control select2">
            @foreach($stores as $store)
                <option value="{{$store['name']}}">{{$store['name']}}</option>
            @endforeach
        </select>
    </div>
</div>


<div class="form-group">
    <label class="col-md-4 control-label">Status</label>
    <div class="col-md-6">
        <select name="status" select="{{$transaction['status']}}" class="form-control">
            <option value="Cancelled">Cancelled</option>
            <option value="Confirmed">Confirmed</option>
            <option value="Pending">Pending</option>
            <option value="Voided">Voided</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Transaction Date</label>
    <div class="col-md-6">
        <input type="date" name="date" value="@if($transaction['date']){{$transaction['date']->format('Y-m-d')}}@else{{date('Y-m-d')}}@endif" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Confirmation Date</label>
    <div class="col-md-6">
        <input type="date" name="confirmation_date" value="@if($transaction['confirmation_date']){{$transaction['confirmation_date']->format('Y-m-d')}}@else{{Date('Y-m-d',strtotime('+3 months'))}}@endif" class="form-control">
    </div>
</div>


<div class="form-group">
    <label class="col-md-4 control-label">Transaction Type</label>
    <div class="col-md-6">
        <select name="type" select="{{$transaction['type']}}" class="form-control">
            <option value="cashback">Cashback Tracked</option>
            <option value="payment">Payment</option>
        </select>
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            {{$submitButtonText}}
        </button>
        <button type="reset" class="btn btn-primary">
            Reset
        </button>
    </div>
</div>

