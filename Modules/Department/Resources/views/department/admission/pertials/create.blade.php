<div class="col-md-4"></div>
<div class="col-md-4"><br>
    <div class="row">
    	
    	<div class="col-md-12">
    		<h3>New Admission</h3>
    	</div>
    </div>
    <form class="login-form" action="{{route($route ?? 'department.admission.register')}}" method="post">
        @csrf
        <div class="form-group">
        	<label>Student Type</label>
            <select name="type" class="form-control">
            	<option value=""></option>
            	@foreach(department()->studentTypes() as $student_type)
                    <option value="{{$student_type->code}}">{{$student_type->name}}</option>
            	@endforeach
            </select>
            @error('student_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Student Session</label>
            <select name="session" class="form-control">
                <option value=""></option>
                @foreach(department()->studentSessions() as $student_session)
                    <option value="{{$student_session->code}}">{{$student_session->name}}</option>
                @endforeach
            </select>
            @error('student_session')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="button-fullwidth cws-button bt-color-3">Generate Admission Number</button>
    </form><br><br>
</div>