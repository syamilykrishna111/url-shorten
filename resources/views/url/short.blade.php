<h1>URL Short</h1>

<form method="post" action="{{ url('/short') }}">
	{{ csrf_field() }}
	<input type="text" name="url" id="url"><br>
	<button type="submit">Short URL</button>
	
</form>