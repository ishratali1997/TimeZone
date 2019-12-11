@extends('layouts.app')
@section('styles')

<link
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
    rel="stylesheet">

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @foreach ($teachers as $teacher)
                    <h3>{{$teacher->user->name}}</h3>
                    <p><strong>{{ $teacher->sunday->format('l')}}</strong> {{ $teacher->sunday->format('g:i a')}}</p>
                    <p><strong>{{ $teacher->monday->format('l')}}</strong> {{ $teacher->monday->format('g:i a')}}</p>
                    <p><strong>{{ $teacher->tuesday->format('l')}}</strong> {{ $teacher->tuesday->format('g:i a')}}</p>
                    <p><strong>{{ $teacher->wednesday->format('l')}}</strong> {{ $teacher->wednesday->format('g:i a')}}
                    </p>
                    <p><strong>{{ $teacher->thursday->format('l')}}</strong> {{ $teacher->thursday->format('g:i a')}}
                    </p>
                    <p><strong>{{ $teacher->friday->format('l')}}</strong> {{ $teacher->friday->format('g:i a')}}
                    </p>
                    <br>
                    @endforeach
                </div>

                <div class="card-body">
                    <form action="/save-teacher" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Title">Sunday</label>
                            <input id="datetimepicker2" type="text" name="sunday" class="form-control timepicker" />
                        </div>
                        <div class="form-group">
                            <label for="Title">Monday</label>
                            <input id="datetimepicker2" type="text" name="monday" class="form-control timepicker" />
                        </div>

                        <div class="form-group">
                            <label for="Title">Tuesday</label>
                            <input id="datetimepicker2" type="text" name="Tuesday" class="form-control timepicker" />
                        </div>

                        <div class="form-group">
                            <label for="Title">Wednesday</label>
                            <input id="datetimepicker2" type="text" name="wednesday" class="form-control timepicker" />
                        </div>

                        <div class="form-group">
                            <label for="Title">Thursday</label>
                            <input id="datetimepicker2" type="text" name="thursday" class="form-control timepicker" />
                        </div>

                        <div class="form-group">
                            <label for="Title">Friday</label>
                            <input id="datetimepicker2" type="text" name="friday" class="form-control timepicker" />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <br><br><br><br><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.3/jquery.timepicker.min.js"></script> --}}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
</script>
<script type="text/javascript">
    // $(document).ready(function(){
    // $('#time').timepicker();
    // });
    $('.timepicker').datetimepicker({
    format: 'hh:mm:ss a'

    });
    
    
</script>
@endsection