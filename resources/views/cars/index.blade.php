@extends('layouts.app')

@section('content')
	<div class="container mx-auto px-40 mt-10">
		
		<div class="mb-8">
			<a
					class="px-4 py-2 bg-green-700 text-white rounded-md"
					href="{{ route('car.create') }}">
				สร้าง
			</a>
		</div>
		<table class="border-collapse table-auto w-full text-sm">
			<thead>
			<tr>
				<th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">
					Car name
				</th>
				<th class="border-b font-medium p-4 pt-0 pb-3 text-slate-400 text-left">
					Model Car
				</th>
				<th class="border-b font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 text-left">
					Car No
				</th>
				<th class="border-b font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 text-left">
					Price
				</th>
				<th class="border-b font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 text-left">
					Stock
				</th>
				<th class="border-b font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 text-left">
					Edit
				</th>
				<th class="border-b font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 text-left">
					Delete
				</th>
			</tr>
			</thead>
			<tbody class="bg-white ">
			
			@forelse($cars as $car)
				<tr>
					<td class="border-b border-slate-100 p-4 pl-8 text-slate-500">
						{{ $car->car_name }}
					</td>
					<td class="border-b border-slate-100 p-4 text-slate-500">
						{{ $car->modelCar->name }}
					</td>
					<td class="border-b border-slate-100 p-4 pr-8 text-slate-500">
						{{ $car->no_car }}
					</td>
					<td class="border-b border-slate-100 p-4 pr-8 text-slate-500">
						{{ $car->price }}
					</td>
					<td class="border-b border-slate-100 p-4 pr-8 text-slate-500">
						{{ $car->stock }}
					</td>
					<td class="border-b border-slate-100 p-4 pr-8 text-slate-500">
						<a
								class="px-4 py-2 bg-blue-700 text-white rounded-md"
								href="{{ route('car.edit',$car) }}">
							แก้ไข
						</a>
					</td>
					<td class="border-b border-slate-100 p-4 pr-8 text-slate-500">
						<form action="{{ route('car.destroy',$car) }}" method="post">
							@csrf
							@method('DELETE')
							<button type="submit"
							        class="px-4 py-2 bg-red-700 text-white rounded-md">
								ลบ
							</button>
						</form>
					</td>
				</tr>
			
			@empty
				<tr>
					<td class="py-4 text-center " colspan="7">ไม่มีข้อมูล</td>
				</tr>
			@endforelse
			
			</tbody>
		</table>
	</div>
@endsection