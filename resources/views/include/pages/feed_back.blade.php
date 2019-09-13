@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul> 
    </div>
@elseif(session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            <ul>
                @foreach (session('error') as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul> 
    </div>
@elseif(session('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            <ul>
                {{session('message')}}
            </ul> 
    </div>    
@endif