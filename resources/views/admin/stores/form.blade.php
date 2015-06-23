
<div class="form-group">
    <label class="col-md-4 control-label">Store Name</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="name" value="{{$store['name']}}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Link / URL</label>

    <div class="col-md-6">
        <input type="url" class="form-control" name="link" value="{{$store['link']}}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Logo</label>

    <div class="col-md-6">
        <input type="file" name="image">
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Description (About the Store)</label>

    <div class="col-md-6">
        <textarea class="form-control" name="description" style="height: 300px;">{{$store['description']}}</textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Featured</label>

    <div class="col-md-6">
        <input type="checkbox" name="featured" @if($store['featured']) {{'checked="true"'}} @endif style="margin-top: 4px;" value="1">
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