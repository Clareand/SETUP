@extends('baseStudent.main')
@section('content')
<div class="row">
	@foreach ($module as $item)
	<div class="col-lg-4 order-2">
		<div class="row">
			<div class="col-lg-10">
				<div class="card bg-lighter">
				   <div class="card-body">
					   <div class="row">
						   <div class="col-md-6 text-lg">Progress</div>
						   <div class="col-md-6 text-lg text-right text-bold">{{count($counts)}}/{{count($user)}}</div>
						   {{-- {{$total}} --}}
					   </div>
				   </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			   <h1 class="display-4" style="font-weight: 400 !important">Material List</h1>
			</div>
			<div class="col-lg-10">
				<div class="table-responsive">
					<table class="table align-items-center table-flush">
						<thead>
							<tr>
								<th>Name</th>
								<th class="text-right">Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($list as $items)
									<tr>
										@if ($items['type']=='material')
										<th>{{$items['material']['title']}}</th>
										@else
										<th>{{$items['task']['name']}}</th>
										@endif
										<th>
											@if ($items['id']==$user[$loop->iteration-1]['id_module'])
												@if ($user[$loop->iteration-1]['status']==1)
													<h3 class="text-right">Done</h3>
												@endif
											@endif
										</th>
									</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
   </div>
   <div class="col-lg-8 order-2">
	   @if ($item['type']=='material')
		   {{-- material --}}
			<div class="row">
				<div class="col-lg-12">
				<div class="text-center">
					<h1 class="display-3">
						{{$item['material']['title']}}
					</h1>
				</div>
				<div id="editor">{!! html_entity_decode($item['material']['material_text']) !!}</div>
				</div>
			</div>
		   {{-- /material --}}
	   @else
		   {{-- task --}}
			<div class="row">
				<div class="col-lg-12">
					<div class="text-center">
						<h1 class="display-3">
							{{$item['task']['name']}}
						</h1>
					</div>
				<br>
					<div class="less">
						<p>Lorem Nunc orci mi, ultricies ut efficitur eget, lobortis id nunc. Etiam scelerisque vehicula vehicula. 
							Quisque nec ultricies ligula, sit amet consequat leo. Donec quis malesuada lectus, eget molestie augue. 
							Ut efficitur in arcu in rutrum. Curabitur purus ante, viverra quis mi quis, euismod dapibus dolor. 
							Duis vulputate ligula eros, non semper dolor malesuada id. Pellentesque faucibus augue nec molestie rutrum. 
							Cras dignissim porta felis, et pulvinar lectus ornare vitae. Aenean euismod hendrerit lorem, eu posuere ante 
							imperdiet sed. Ut sapien nunc, facilisis nec nulla a, ultricies placerat velit. Fusce vulputate nisl nisl, 
							euismod leo convallis eu. Nam varius diam vel arcu varius :
						</p>
						<br>
						<form action="{{url('app/check/task/'.$item['id_task'])}}" method="post" enctype="multipart/form-data">
						@if ($status==1)
							{{-- if already done --}}
							@foreach ($item['task']['task_fields'] as $items)
							<h2>{{$loop->iteration}}. {{$items['field_question']}}</h2>
								@foreach ($answer as $ans)
									@if ($items['id']==$ans['id_task_field'])
										@if ($items['field_type']=='multiple')
										<div class="row">
											@foreach ($items['task_field_options'] as $opt)
											<div class="col-md-3">
												<div class="form-group custom-control custom-radio custom-control-inline">
													<input type="radio" id="customRadioInline{{$opt['id']}}" name="multiple_answer{{$items['id']}}" class="custom-control-input selected " value="{{$opt['id']}}" {{ ($opt['id']==$ans['answer_multiple'])? "checked" : "" }} disabled>
													@if ($opt['option_value']=='true')
													<label class="custom-control-label text-green text-md" for="customRadioInline{{$opt['id']}}">{{$opt['option_text']}}</label>
													@else
													<label class="custom-control-label" for="customRadioInline{{$opt['id']}}" class="text-red">{{$opt['option_text']}}</label>
													@endif
												</div>
											</div>
											@endforeach 
										</div> 
										<br>
										@elseif($items['field_type']=='short answer')
										<div class="row">
											<div class="col-lg-8">
												<div class="form-group">
													<label class="form-control-label" for="input-email">Answer</label>
													<input type="text" class="form-control" placeholder="..." value="{{$ans['answer_short']}}" disabled>
													<br>
													@if ($ans['status']==1)
													<p class="text-md">Correct Answer : <span class="text-green"><strong>{{$items['task_field_options'][0]['option_value']}}</strong></span></p>
													@else
													<p class="text-md">Correct Answer : <span class="text-red"><strong>{{$items['task_field_options'][0]['option_value']}}</strong></span></p>
													@endif
												</div>
											</div>	
										</div>
										<br>
										@else
										<div class="row">
											<div class="col-lg-8">
												<div class="form-group">
													<label class="form-control-label" for="input-username">Upload file</label>
													<br> 
													<p class="text-md">status:
														@if ($ans['status']==1)
														<span class="text-green"><strong>Accepted</strong></span>
														@elseif($ans['status']==2)
														<span class="text-Red"><strong>Rejected</strong></span>
														@elseif($ans['status']==3)
														Under Review
														@endif
															   
													</p>
													{{-- <div class="invalid-feedback">
														Please insert class name.
													</div> --}}
												</div>
											</div>
										</div> 
										@endif
									@endif
								@endforeach
							@endforeach
							{{-- /if already done --}}
						@else
						{{-- if not done --}}
						@csrf
						<input type="hidden" name="id_task" value="{{$item['id_task']}}">
						<input type="hidden" name="id_class" value="{{$item['id_class']}}">
						@foreach ($item['task']['task_fields'] as $items)
						<h2>{{$loop->iteration}}. {{$items['field_question']}}</h2>
						@if ($items['field_type']=='multiple')
						<div class="row">
							@foreach ($items['task_field_options'] as $opt)
							<div class="col-md-3">
								<div class="form-group custom-control custom-radio custom-control-inline">
									<input type="radio" id="customRadioInline{{$opt['id']}}" name="multiple_answer{{$items['id']}}" class="custom-control-input" value="{{$opt['id']}}">
									<label class="custom-control-label" for="customRadioInline{{$opt['id']}}">{{$opt['option_text']}}</label>
								</div>
							</div>
							@endforeach 
						</div> 
						<br>
					@elseif($items['field_type']=='short answer')
						<div class="row">
							<div class="col-lg-8">
								<div class="form-group">
									<label class="form-control-label" for="input-email">Answer</label>
									<input type="text" class="form-control" placeholder="..." name="short_answer{{$items['id']}}" required>
									<div class="invalid-feedback">
										Please insert the Answer.
									</div>
								</div>
							</div>	
						</div>
						<br>
					@else
						<input type="hidden" name="file{{$items['id']}}">
						<div class="row">
							<div class="col-lg-8">
								<div class="form-group">
									<label class="form-control-label" for="input-username">Upload file</label>
									<input type="file" id="input-username" class="form-control" placeholder="Basic programing" name="upload">
									{{-- <div class="invalid-feedback">
										Please insert class name.
									</div> --}}
								</div>
							</div>
						</div>
						@endif
						<br>
						@endforeach
							{{-- /if not --}}
						@endif
						<br>
						@if ($status==0)
						<button type="submit" class="btn btn-olive btn-small text-right">Submit</button>
						@else
						<button disabled type="button" class="btn btn-olive btn-small text-right">Submit</button>
						@endif
					</form>
					</div>
				</div>
			</div>
		   {{-- task --}}
	   @endif
	   <br>
	   <br>
	   @if ($item['type']=='material')
	   <div class="row">
			<div class="col-lg-6">
				@if ($item['step']==1)
				<a class="btn btn-outline-olive btn-lg disabled" style="width: 200px">Previous</a>
				@else
				<a href="{{url('app/class/material/'.$item['id_class'].'/'.'tutorials/'.($item['step']-1))}}" class="btn btn-outline-olive btn-lg" style="width: 200px">Previous</a>
				@endif
			</div>
			<div class="col-lg-6 text-right">
				@if ($item['step']==count($list))
				<button type="button" class="btn btn-olive btn-lg" style="width: 150px" onclick="getChecked({{$item['id']}},{{$item['id_class']}},{{$item['step']}},true)">Done</button>
				@else
				<button type="button" class="btn btn-olive btn-lg" style="width: 150px" onclick="getChecked({{$item['id']}},{{$item['id_class']}},{{$item['step']}},false)">Next</button>
				@endif
			</div>
		</div>
	   @else
	   <div class="row">
			<div class="col-lg-6">
				@if ($item['step']==1)
				<a class="btn btn-outline-olive btn-lg disabled" style="width: 200px">Previous</a>
				@else
				<a href="{{url('app/class/material/'.$item['id_class'].'/'.'tutorials/'.($item['step']-1))}}" class="btn btn-outline-olive btn-lg" style="width: 200px">Previous</a>
				@endif
			</div>
			<div class="col-lg-6 text-right">
				@if ($status==0)
				<button type="button" class="btn btn-olive btn-lg disabled" style="width: 150px" onclick="getChecked({{$item['id']}},{{$item['id_class']}},{{$item['step']}},false)">Next</button>
				@else
				@if ($item['step']==count($list))
				<button type="button" class="btn btn-olive btn-lg" style="width: 150px" onclick="getChecked({{$item['id']}},{{$item['id_class']}},{{$item['step']}},true)">Done</button>
				@else
				<button type="button" class="btn btn-olive btn-lg" style="width: 150px" onclick="getChecked({{$item['id']}},{{$item['id_class']}},{{$item['step']}},false)">Next</button>
				@endif
				@endif
			</div>
		</div>
	   @endif
   </div>
	<!-- Modal -->
	<div class="modal fade" id="ModalFailed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Failed!</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
				Sorry, Something went Wrong.
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-olive" data-dismiss="modal">Close</button>
			</div>
		</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="ModalSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Success!</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
				Congratulation, You got Point!
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-outline btn-olive" data-dismiss="modal">Close</button>
			<a href="{{url('app/class/material/'.$item['id_class'].'/'.'tutorials/'.($item['step']+1))}}" class="btn btn-olive">Next</a>
			</div>
		</div>
		</div>
	</div>
	<div class="modal fade" id="ModalDone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Success!</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
				Congratulation, You Have Finished this Class!
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-outline btn-olive" data-dismiss="modal" onclick="reloadPage()">Finish</button>
			</div>
		</div>
		</div>
	</div>
	<div class="modal fade" id="ModalDonePath" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Success!</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
				Congratulation, You Have Finished this Class and you got new Badge!
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-outline btn-olive" data-dismiss="modal" onclick="reloadPage()">Finish</button>
			</div>
		</div>
		</div>
	</div>
	@endforeach
</div>    
@endsection

@section('custom-script')
	<script>
		function getChecked($id,$class,$step,$last){
			var token = "{{csrf_token()}}";
			// console.log($step);
			$.ajax({
					type:'POST',
					url:"<?php echo url('app/check/status')?>",
					data:"_token="+token+"&id="+$id+"&class="+$class,
					success:function(data){
						// console.log(data)
						if(data=='true'){
							if($last==false){
								// console.log('ok')
								$('#ModalSuccess').modal('show');
							}else{
								checkPaths($class);
							}
						}else if(data=='done'){
							if($last==false){
							const url = "{{URL::to('app/class/material')}}"+"/"+$class+"/"+"tutorials"+"/"+($step+1);
							window.location.href = url
							console.log(url);
							}
						}else{
							console.log('fail')
							$('#ModalFailed').modal('show');
						}
					},
					error:function(data,textStatus,errorThrown){
						console.log(data)
					}
			});
		}

		function checkPaths($class){
			console.log('ok');
			var token = "{{csrf_token()}}";
			$.ajax({
				type:'POST',
					url:"<?php echo url('app/check/path')?>",
					data:"_token="+token+"&id_class="+$class,
					success:function(data){
						console.log(data)
						// console.log('he');
						if(data=='true'){
							$('#ModalDonePath').modal('show');
						}else{
							$('#ModalDone').modal('show');
						}
					},
					error:function(data,textStatus,errorThrown){
						console.log(data)
					}
			})
		}
		function reloadPage(){
			location.reload();
		}
	</script>
	<script type="text/javascript">
	if({{ Session::get('modal') }}){
		var type = "{{ Session::get('modal') }}";
		console.log(type)
		if(type=='true'){
			$(window).on('load', function() {
				$('#ModalSuccess').modal('show');
			});
		}
	{{Session::forget('modal')}}
	}
	</script>
@endsection