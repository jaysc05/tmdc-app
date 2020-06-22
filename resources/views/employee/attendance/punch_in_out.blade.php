@extends('layouts.app')

@section('content')
	<div id="app">
		<section>
			<div class="row">
				<div class="col-sm-6 m-auto">
					<div class="card">
						<div class="card-body">
							<form method="POST" action="{{ route('attendance.store') }}">
								<div class="row">
									<div class="col-sm-7 text-center">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="datetime" value="{{ Carbon\Carbon::now() }}">
										<i class="fas fa-clock"></i>
										<hr>
										<p>{{ Carbon\Carbon::parse($date)->format('F j, Y') }} {{ Carbon\Carbon::parse($time)->format('H:i') }} </p>
									</div>
									<div class="col-sm-5">
										<button type="submit" class="btn btn-primary w-100 h-100">{{ $btnText }}</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-4 m-auto">
									<h2>LAST LOGIN</h2>
								</div>
								<div class="col-sm-4 text-center">
									<h3>IN</h3>
									<hr>
									<p>16 June, 2020 at 17:00</p>
								</div>
								<div class="col-sm-4 text-center">
									<h3>OUT</h3>
									<hr>
									<p>16 June, 2020 at 17:00</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection