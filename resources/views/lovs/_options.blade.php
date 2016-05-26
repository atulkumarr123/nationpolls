<div class="row">
    <div class="col-md-6">
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category', $categories, $selectedCategory,['id'=>'category','class'=>'form-control',  'required']) !!}

<script type="text/javascript">

</script>
</div>
    </div>
        <div class="col-md-6">
<div class="form-group">
    {!! Form::label('options', 'Options:') !!}
    <h6  hidden id="validateOptions" style="color: red"> add atleast 2 items</h6>
    {!! Form::select('options[]', $options, $selectedOptions,['id'=>'options','class'=>'form-control', 'multiple', 'required']) !!}
</div>
<script type="text/javascript">

</script>

</div>
</div>
