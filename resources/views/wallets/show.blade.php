@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
        <h2 class="mt-2">Charge money</h2>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item text-danger">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('wallets.update',auth()->user()->id)}}" enctype="multipart/form-data">

            <div class="form-group">
                @csrf
                @method('PUT')
                <label for="number">Seri number:</label>
                <input type="text" class="form-control" name="seriNumber" placeholder="Enter your seri number" required />
            </div>
            <div class="form-group">
                <label for="object">Charge for:</label>&nbsp;&nbsp;&nbsp;
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="hidden" class="form-control" name="yourSelf" id="yourSelf_id" value=1>
                    <input type="radio" id="object1" name="chargeObject1" class="custom-control-input" onclick="handleClick1()" checked>
                    <label class="custom-control-label" for="object1">Yourself</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="object2" name="chargeObject1" class="custom-control-input" onclick="handleClick2()">
                    <label class="custom-control-label" for="object2">Your friend</label>
                </div>
                <div class="collapse" id="friendEmailCollapse">
                    <input type="text" class="form-control" id="friendEmail" name="friendEmail" placeholder="Enter your friend's email">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Confirm</button>
        </form>

    </div>
</div>
@endsection

@section('scripts')
<script>
    function handleClick1() {
        $('#friendEmailCollapse').collapse('hide')
        document.getElementById("yourSelf_id").value = 1
        document.getElementById("friendEmail").required = false

    }

    function handleClick2() {
        $('#friendEmailCollapse').collapse('show')
        document.getElementById("yourSelf_id").value = 0
        document.getElementById("friendEmail").required = true
    }
</script>
@endsection