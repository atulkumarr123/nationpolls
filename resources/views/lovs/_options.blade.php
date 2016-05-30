<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('category', 'Category:') !!}
            {!! Form::select('category', $categories, $selectedCategory,['id'=>'category','class'=>'form-control',  'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        @if($mode=='edit')
            <div class="form-group">
                {!! Form::label('options', 'Options:') !!}
                <h6  hidden id="validateOptions" style="color: red"> add atleast 2 items</h6>
                {!! Form::select('options[]', $options, $selectedOptions,['value'=>'old("options")', 'id'=>'options','class'=>'form-control', 'multiple', 'required']) !!}
            </div>
        @elseif($mode=='create')
            <div class="form-group">
                {!! Form::label('options', 'Options:') !!}
                <h6  hidden id="validateOptions" style="color: red"> add atleast 2 items</h6>
                <select name="options[]" id="options" class="form-control" multiple>
                    @if (is_array(old('options')))
                        @foreach (old('options') as $option)
                            <option value="{{ $option }}" selected="selected">{{ $option }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        @endif
    </div>
</div>
