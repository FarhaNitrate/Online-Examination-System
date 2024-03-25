<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Teacher Portal</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ url('css/style.css')}}">

</head>

<body>
	<div class="container p-5">
		<div class="profile card p-5 rounded">
			<div>
                <a href="{{ route('teachers') }}"><button class="btn btn-sm btn-primary">Back</button></a>
            </div>
			<form class="text-right" method="POST" action="{{ route('logout') }}">
				@csrf
				<button class="btn btn-danger btn-sm" type="submit">Logout</button>
			</form>

			<h3 class="text-center">Message</h3>
			<div class="message">
				<div class="col col-md-10 col-lg-9 col-xl-8 mx-auto my-auto">
					<div class="card mt-4 mb-2 msgcard">
						<div class="card-body">
							<div class="container-fluid">
                                <div id="messages_container" class="chat-log">
                                @foreach ($messages as $message)
                                    <div class="chat-log_item chat-log_item-{{ $message->sender_id == Auth::id() ? 'own' : '' }} z-depth-0">
                                        <div class="row justify-content-{{ $message->sender_id == Auth::id() ? 'end' : 'start' }} mx-1 d-flex">
                                            <div class="col-auto px-0">
                                                <span class="chat-log_author">
                                                    {{ $message->sender->name }} - <span class="chat-log_time">{{ $message->created_at->format('H:i') }}</span>
                                                </span>
                                            </div>
                                            <div class="col-auto px-0"></div>
                                        </div>
                                        <hr class="my-1 py-0 col-10 m-auto" style="opacity: 0.8">
                                        <div class="chat-log_message">
                                            <p class="m-0">{{ $message->content }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
							</div>
						</div>
						<div class="card-footer border-0 bottom-rounded z-depth-0" style="background-color: #97E3C2">
							<div class="row">
								<div class="col col-md-10 col-lg-9 mx-auto">
									<form  method="POST" action="{{ route('student-message.store') }}">
										@csrf
										<input type="hidden" name="to" value="{{ $to }}">
										<div class="row d-flex justify-content-center">
											<div class="col-12 col-md-9 align-self-center my-0">
												<div class="row d-flex align-self-center justify-content-center">
													<div class="col-12 d-flex">
														<div class="form-group col-12 my-0 mx-0">
															<textarea rows="1" id="content" name="content"
																placeholder="Type message!"
																class="form-control textarea"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-3 d-flex align-self-center justify-content-center justify-content-md-end my-0">
												<div class="md-form my-1">
													<button type="submit" class="btn btn-sm btn-success">Send</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<script>
		function scrollToBottom() {
			var chatContainer = document.getElementById('messages_container');
			chatContainer.scrollTop = chatContainer.scrollHeight;
		}
		window.onload = scrollToBottom;
	</script>
</body>

</html>