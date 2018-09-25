<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
		<link href="{{asset('css/app.css')}}" type="text/css" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
		<div class="container" style="padding-top:20px" id="app">
			<div class="row">
				<div class="panel panel-success col-md-10 col-md-offset-1">
					<div class="panel-heading"><h3 class="panel-title">ADD Your Data</h3></div>
					<div class="panel-body">
						<form class="form form-success " method="post" v-on:submit.prevent="saveData">
							<input type="text" required name="Name" class="form-control" placeholder="Enter Name..."><br>
							<input type="number" required name="Price" class="form-control" placeholder="Enter Price">
							<button type="submit" class="btn btn-success" style="margin-top:5px;">ADD</button>
						</form>
					</div>
					<div class="panel-foote">
						<div class="alert alert-danger col-md-12" style="margin-top:10px;display:none">
							
						</div>
					</div>
				</div>
				</div>
			
				<hr class="hr col-md-12">
				<div class="row">
					<div class="col-md-10">
						<button class="btn btn-primary" v-on:click="getData">getdata</button>
						<table class="table table-striped" >
							<thead>
								<tr><th>Name</th><th>Price</th></tr>
							</thead>
							<tbody>
							</tbody>
						</table>
						<p class="alert alert-primary">Sum Of Sales : 0</p>
					</div>
				</div>
		</div>
		<script src="{{asset('js/jquery-3.1.0.min.js')}}"></script>
		<script src="{{asset('js/app.js')}}"></script>

    </body>
</html>
