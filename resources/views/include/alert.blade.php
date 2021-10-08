@if(session('error'))
<div id="alert" class="alert alert-danger alert-top">
    <div class="d-flex justify-content-end">
        <button class="btn" onclick="closeAlert()">X</button>
    </div>
    <h5>{{ session('error') }}</h5>
</div>
@endif

@if(session('success'))
<div id="alert" class="alert alert-success alert-top">
    <div class="d-flex justify-content-end">
        <button class="btn" onclick="closeAlert()">X</button>
    </div>
    <h5>{{ session('success') }}</h5>
</div>
@endif

@if(count($errors) > 0)
<div id="alert" class="alert alert-danger alert-top">
    <div class="d-flex justify-content-end">
        <button class="btn" onclick="closeAlert()">X</button>
    </div>
    <h5>There were {{ count($errors) }} errors with your submission</h5>
    <ul class="fa-ul">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<script>
    function closeAlert() {
        document.getElementById('alert').style.display = "none";
    }

</script>
