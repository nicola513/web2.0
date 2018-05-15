<html>
	<head>
		<link rel="stylesheet" type="text/css" href="{{ URL::to('css/style.css') }}">
		<script src="{{ URL::asset('js/fontsize.js') }}"></script>
	</head>
	<body>

		<div id="id_header">
			<div class="title">School App/Drop System</div>
			<a onclick="small_size()"><font size="2">A</font></a>
			<a onclick="medium_size()"><font size="4">A</font></a>
			<a onclick="large_size()"><font size="5">A</font></a>
		</div>
		<h2 id="s1">Welcome, {{Session::get('name')}}</h2>
		<form><button  class="logout" type="submit" formaction="/logout">Logout</button></form>
		<hr/>
		<br/>

		<fieldset>
			<legend><div id="s2">Update Student Data</div></legend>
	<form method="POST" action="/update" >
	{!! csrf_field() !!}
		<table id="s3">
			<tr>
				<th>Student ID:</th>
				<td>
					<input  type="text" name="student_id" value="<?=$data['student_id']?>"  readonly>
				</td>
			</tr>
			<tr>
				<th>First Name:</th>
				<td>
					<input type="text" name="first_name" value="<?=$data['first_name']?>">
				</td>
			</tr>
			<tr>
				<th>Last Name:</th>
				<td>
					<input type="text" name="last_name" value="<?=$data['last_name']?>">
				</td>
			</tr>
			<tr>
				<th>Sex:</th>
				<td>
					<select name="sex" class="seloption">
					@if($data['sex'] =='F')
						<option value="F" selected>F</option>
					@else
						<option value="F" >F</option>
					@endif
					@if($data['sex']=='M')
						<option value="M" selected>M</option>
					@else
						<option value="M" >M</option>
					@endif
					</select>
				</td>
			</tr>
			<tr>
				<th>Phone Number:</th>
				<td>
					<input type="text" name="phone" value="<?=$data['phone_number']?>">
				</td>
			</tr>
			<tr>
				<th>Address:</th>
				<td>
					<input type="text" name="address" value="<?=$data['address']?>">
				</td>
			</tr>
			<tr>
				<th>University:</th>
				<td>
					<input type="text" name="university" value="<?=$data['university']?>">
				</td>
			</tr>
			<tr>
				<th>Subject:</th>
				<td>
					<input type="text" name="subject" value="<?=$data['subject']?>">
				</td>
			</tr>
			<tr>
				<th>Class:</th>
				<td>
					<input type="text" name="class" value="<?=$data['class']?>">
				</td>
			</tr>
			<tr>
				<th>Enter year:</th>
				<td>
					<input type="text" name="yaer" value="<?=$data['year']?>">
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Update"/></td>
			</tr>
		</table>
	</form>
</fieldset>
				<br/>
	<form>
		<button class= "back" type="submit" formaction="/adminIndex">
				Back
		</button>
	</form>

	<div id="id_footer">COMPS480F - Web 2.0 Project: A Web-based Course Add/Drop Application</div>

	</body>
</html>
