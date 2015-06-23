{{--<div class="form-group">--}}
{{--<label class="col-md-4 control-label">Category</label>--}}

{{--<div class="col-md-6">--}}
{{--<select name="category_id" index="{{$current_category}}" class="form-control">--}}
{{--@foreach($categories as $store_name => $cats)--}}
{{--<optgroup label="{{$store_name}}">--}}
{{--@foreach($cats as $category)--}}
{{--<option value="{{$category['id']}}">{{$category['name']}}</option>--}}
{{--@endforeach--}}
{{--</optgroup>--}}
{{--@endforeach--}}
{{--</select>--}}
{{--</div>--}}
{{--</div>--}}

<div class="form-group">
    <label class="col-md-4 control-label">Store</label>

    <div class="col-md-6">
        <select name="store" class="form-control" id="parent_selection" select="{{$store_name}}">
            @foreach($categories as $storename => $cats)
                <option @if(strcmp($storename,$store_name)==0) {{"selected='selected'"}} @endif>{{$storename}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Category</label>

    <div class="col-md-6">
        <select name="category_id" class="form-control" id="child_selection" index="{{$category_id}}">
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Offer Name</label>

    <div class="col-md-6">
        <input type="text" name="name" value="{{$offer['name']}}" class="form-control">
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Link (URL)</label>

    <div class="col-md-6">
        <input type="url" name="link" value="{{$offer['link']}}" class="form-control">
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Expiry Date</label>

    <div class="col-md-6">
        <input type="date" name="expiry_date"
               value="@if($offer['expiry_date']){{$offer['expiry_date']->format('Y-m-d')}}@else{{date('Y-m-d')}}@endif"
               class="form-control">
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Description</label>

    <div class="col-md-6">
        <textarea name="description" class="form-control">{{$offer['description']}}</textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Featured</label>

    <div class="col-md-6">
        <input type="checkbox" name="featured" @if($offer['featured']) {{'checked="true"'}} @endif style="margin-top: 4px;" value="1">
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
