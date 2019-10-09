@extends('department::layouts.master')

@section('page-content')
    <div class="col-md-4">
     	<div class="card">
     		<div class="card-header">
     			{{$result->session->name}} {{$result->lecturerCourse->course->code}} Results Uploaded at {{$result->created_at}}
     		</div>
     		<div class="card-body">
     			<table>
     				<tr>
     					<td>Registered Students</td>
     					<td>{{count($result->results)}}</td>
     				</tr>
     				<tr>
     					<td>A</td>
     					<td>{{$result->numberOfAs()}}</td>
     				</tr>
     				<tr>
     					<td>AB</td>
     					<td>{{$result->numberOfABs()}}</td>
     				</tr>
     				<tr>
     					<td>B</td>
     					<td>{{$result->numberOfBs()}}</td>
     				</tr>
     				<tr>
     					<td>BC</td>
     					<td>{{$result->numberOfBCs()}}</td>
     				</tr>
     				<tr>
     					<td>C</td>
     					<td>{{$result->numberOfCs()}}</td>
     				</tr>
     				<tr>
     					<td>CD</td>
     					<td>{{$result->numberOfCDs()}}</td>
     				</tr>
     				<tr>
     					<td>D</td>
     					<td>{{$result->numberOfDs()}}</td>
     				</tr>
     				<tr>
     					<td>E</td>
     					<td>{{$result->numberOfEs()}}</td>
     				</tr>
     				<tr>
     					<td>F</td>
     					<td>{{$result->numberOfFs()}}</td>
     				</tr>
     				<tr>
     					<td>S</td>
     					<td>{{$result->numberOfSs()}}</td>
     				</tr>
     				<tr>
     					<td>I</td>
     					<td>{{$result->numberOfIs()}}</td>
     				</tr>
     				<tr>
     					<td>X</td>
     					<td>{{$result->numberOfXs()}}</td>
     				</tr>
     				<tr>
     					<td>
     						<form>
		         				<button>Amend This Result</button>
		         			</form>
		         		</td>
     					<td>
     						<form>
		         				<button>Approve This Result</button>
		         			</form>
		         		</td>
     				</tr>
     			</table>
     		</div>
     	</div>
    </div>
@endsection