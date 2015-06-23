
<div class="form-group">
    <label class="col-md-4 control-label">Store</label>

    <div class="col-md-6">
        <select class="form-control" name="store_id"  select="{{$current_store['name']}}">

            @foreach($stores as $store)
                <option value="{{$store['id']}}">{{$store['name']}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Category Name</label>

    <div class="col-md-6">
        <select name="name" select="{{$category['name']}}" class="form-control">
            <option>Electronics</option>
            <option>Clothing</option>
            <option>Kitchen</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Cashback</label>

    <div class="col-md-6">
        <input type="text" name="cashback" value="{{$category['cashback']}}" class="form-control">
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