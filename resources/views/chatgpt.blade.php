<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chat GPT integration</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style type="text/css">
	
</style>
<body>
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
	<div class="row ">
		<div class="col-md-3 bg-dark text-light">
			@if(isset($data['qustion']))
			<label>last question is :{{$data['qustion']}}</label><br>
			@if(isset($data['answer']))
			<span>answer is:{{$data['answer']}}</span>
			@endif
			@endif
		</div>
		<div class="col-md-9">
			<div id="message ">
				
			</div>
			<form action="{{ route('get.message')}}" method="POST">
				@csrf
				<div class="">
				<div class="form-group col-md-9">
				<label>enter your message</label>
				<textarea name="question" class="form-control"></textarea>
				</div>
				<button class="btn btn-primary  col-md-9" type="submit">Ask to GPT</button>
				</div>
				
			</form>
		</div>

	</div>
		
</body>
</html>