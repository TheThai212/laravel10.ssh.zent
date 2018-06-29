<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@foreach( $categories as $cate)
		<h1>{{$cate->name}}</h1>
	@endforeach()
	
</body>
</html>