<div class="row">
    <div class="col-md-6">
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category', $categories, $selectedCategory,['id'=>'category','class'=>'form-control',  'required']) !!}

<script type="text/javascript">
    $('#category').select2({
        placeholder: 'Choose a category',
        minimumResultsForSearch:-1,
    });
</script>
</div>
    </div>
        <div class="col-md-6">
<div class="form-group">
    {!! Form::label('options', 'Options:') !!}
    <h6  hidden id="validateOptions" style="color: red"> add atleast 2 items</h6>
    {!! Form::select('options[]', $options, $selectedOptions,['value'=>'{{old(options)}}', 'id'=>'options','class'=>'form-control', 'multiple', 'required']) !!}
</div>
<script type="text/javascript">
    $('#options').select2({
            placeholder: 'Add atleast 2 options',
            tags:true,
            minimumInputLength: 1,
            });
    $('form').on('submit', function(){
        var minimum = 2;
        if($("#options").select2('data').length>=minimum){
            return true;
        }else {
           $('#validateOptions').show();
            return false;
        }
    })
</script>

</div>
</div>
