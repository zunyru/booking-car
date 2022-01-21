@extends('layouts.app')

@section('title', 'Car crate')

@section('content')

	<div class="container mx-auto px-40">
		<form action="{{ (Route::currentRouteName() === 'car.create') ? route('car.store') :  route('car.update',@$car) }}"
		      method="POST"
		      class="mt-10">
			@csrf
			@if((Route::currentRouteName() === 'car.create'))
				@method('POST')
			@else
				@method('PUT')
			@endif
			
			<div class="mb-6">
				<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
					ชื่อรถ</label>
				<input type="text"
				       name="car_name"
				       value="{{ !empty($car) ? $car->car_name : '' }}"
				       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
				       placeholder="ชื่อรถ" required>
			</div>
			<div class="mb-6">
				<label for="model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
					ประเภทรถ</label>
				<select name="model_car_id">
					<option value="">--กรุณาเลือกยี่ห้อรถ--</option>
					@foreach($model_cars as $model_car)
						<option
								{{ (!empty($car) && $car->model_car_id == $model_car->id) ? 'selected' : '' }}
								value="{{ $model_car->id }}">{{ $model_car->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="mb-6">
				<label for="no_car" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
					ทะเบียนรถ</label>
				<input type="text"
				       name="no_car"
				       value="{{ !empty($car) ? $car->no_car : '' }}"
				       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
				       placeholder="ทะเบียนรถ" required>
			</div>
			<div class="mb-6">
				<label for="no_car" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
					ราคา</label>
				<input type="number"
				       min="0"
				       name="price"
				       value="{{ !empty($car) ? $car->price : '' }}"
				       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
				       placeholder="ราคา" required>
			</div>
			
			<div class="mb-6">
				<label for="no_car" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
					จำนวน</label>
				<input type="number"
				       min="0"
				       name="stock"
				       value="{{ !empty($car) ? $car->stock : '' }}"
				       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
				       placeholder="จำนวน" required>
			</div>
			
			
			<button type="submit"
			        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
				Submit
			</button>
		</form>
	</div>

@endsection