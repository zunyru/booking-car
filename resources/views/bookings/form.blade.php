@extends('layouts.app')

@section('title', 'Car crate')

@section('content')
	<div class="container mx-auto px-40">
		<form action="{{ route('booking') }}"
		      method="POST"
		      class="mt-10"
		      enctype="multipart/form-data"
		>
			@csrf
			@method('POST')
			
			<img class="w-1/4"
			     src="{{ Storage::disk(config('filesystems.default'))->url($car->image) }}" alt="">
			
			<input type="hidden" name="car_id" value="{{ $car->id }}">
			
			<div class="mb-6">
				<label for="booking_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
					วันที่จอง</label>
				<input type="date"
				       name="booking_date"
				       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
				       placeholder="วันที่จอง" required>
			</div>
			<div class="mb-6">
				<label for="customer_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
					ชื่อผู้จอง</label>
				<input type="text"
				       name="customer_name"
				       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
				       placeholder="ชื่อผู้จอง" required>
			</div>
			<div class="mb-6">
				<label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
					จำนวน</label>
				<input type="number"
				       min="1"
				       max="{{ $car->stock }}"
				       name="amount"
				       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
				       placeholder="จำนวน" required>
			</div>
			
			<button type="submit"
			        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
				ทำการจอง
			</button>
		</form>
	</div>

@endsection