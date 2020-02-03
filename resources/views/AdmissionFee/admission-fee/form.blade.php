<div class="form-group {{ $errors->has('my_class_id') ? 'has-error' : ''}}">
    <label for="my_class_id" class="control-label">{{ 'My Class Id' }}</label>
    <input class="form-control" name="my_class_id" type="number" id="my_class_id" value="{{ $admissionfee->my_class_id or ''}}" >
    {!! $errors->first('my_class_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fee') ? 'has-error' : ''}}">
    <label for="fee" class="control-label">{{ 'Fee' }}</label>
    <input class="form-control" name="fee" type="number" id="fee" value="{{ $admissionfee->fee or ''}}" >
    {!! $errors->first('fee', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
