<div class="row">
    <div class="col-md-6">
<div class="form-group">
    {!! Form::label('geoloc', 'Geographical Location:') !!}
    {!! Form::select('geoloc', $geolocs, $selectedGeoLocs,['id'=>'geoloc','onChange'=>'showDivAndConstructSelect2();','class'=>'form-control',  'required']) !!}

<script type="text/javascript">

</script>
</div>
    </div>
        <div class="col-md-6">
            <div class="form-group" hidden id="countryDiv">
                {!! Form::label('Country') !!}
                {!! Form::select('countries[]', $countries, null, ['class' => 'form-control', 'id' => 'countries', 'multiple']) !!}
            </div>
            <script type="text/javascript">

            </script>
</div>
</div>
