<html>
<head>
<link rel="stylesheet" type="text/css" href="{{ URL::to('css/style.css') }}">
<script src="{{ URL::asset('js/fontsize.js') }}"></script>
</head>

</body>
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
	<legend><div id="s2">Upload File</div></legend>

<form method="POST" action="/registration" enctype="multipart/form-data">
{!! csrf_field() !!}
	<table id="s3">
		<tr>
			<th>Your file:</th>
			<td>
				<input type="file" name="file" accept="media_type/csv"
				value="{{ csrf_token() }}"/>
				@if ($errors->has('file_error'))
	                                    <span class="help-block">
	                                    <img src="{{ URL::asset('error.png') }}">
	                                        <strong>{{ $errors->first('file_error') }}</strong>
	                                    </span>
	                                @endif
			</td>
			<td>
				<button class ="fileUpload" type="submit" name="upload" value="file">
					Upload
				</button>
			</td>
		</tr>
	</table>
</form>
</fieldset>
<br/>
<hr/>
<br/>
<fieldset>
	<legend><div id="s2_1">Create Student Data</div></legend>

<form method="POST" action="/registration" >
{!! csrf_field() !!}
	<table id="s3_1">
		<tr>
			<th>Student ID:</th>
			<td>
				<input type="text" name="student_id" >
				@if ($errors->has('sid_error'))
	                                    <span class="help-block">
	                                    <img src="{{ URL::asset('error.png') }}">
	                                        <strong>{{ $errors->first('sid_error') }}</strong>
	                                    </span>
	                                @endif
			</td>
		</tr>
		<tr>
			<th>First Name:</th>
			<td>
				<input type="text" name="first_name" >
				@if ($errors->has('first_error'))
	                                    <span class="help-block">
	                                    <img src="{{ URL::asset('error.png') }}">
	                                        <strong>{{ $errors->first('first_error') }}</strong>
	                                    </span>
	                                @endif
			</td>
		</tr>
		<tr>
			<th>Last Name:</th>
			<td>
				<input type="text" name="last_name" >
				@if ($errors->has('last_error'))
	                                    <span class="help-block">
	                                    <img src="{{ URL::asset('error.png') }}">
	                                        <strong>{{ $errors->first('last_error') }}</strong>
	                                    </span>
	                                @endif
			</td>
		</tr>
		<tr>
			<th>Sex:</th>
			<td>
				<select name="sex" class="seloption">
					<option value="F">F</option>
					<option value="M">M</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Phone Number:</th>
			<td>
				<input type="text" name="phone" >
				@if ($errors->has('phone_error'))
	                                    <span class="help-block">
	                                    <img src="{{ URL::asset('error.png') }}">
	                                        <strong>{{ $errors->first('phone_error') }}</strong>
	                                    </span>
	                                @endif
			</td>
		</tr>
		<tr>
			<th>Address:</th>
			<td>
				<input type="text" name="address" >
				@if ($errors->has('address_error'))
	                                    <span class="help-block">
	                                    <img src="{{ URL::asset('error.png') }}">
	                                        <strong>{{ $errors->first('address_error') }}</strong>
	                                    </span>
	                                @endif
			</td>
		</tr>
		<tr>
			<th>University:</th>
			<td>
				<input type="text" name="university" >
				@if ($errors->has('university_error'))
	                                    <span class="help-block">
	                                    <img src="{{ URL::asset('error.png') }}">
	                                        <strong>{{ $errors->first('university_error') }}</strong>
	                                    </span>
	                                @endif
			</td>
		</tr>
		<tr>
			<th>Subject:</th>
			<td>
				<input type="text" name="subject" >
				@if ($errors->has('subject_error'))
	                                    <span class="help-block">
	                                    <img src="{{ URL::asset('error.png') }}">
	                                        <strong>{{ $errors->first('subject_error') }}</strong>
	                                    </span>
	                                @endif
			</td>
		</tr>
		<tr>
			<th>Class:</th>
			<td>
				<input type="text" name="class" >
				@if ($errors->has('class_error'))
	                                    <span class="help-block">
	                                    <img src="{{ URL::asset('error.png') }}">
	                                        <strong>{{ $errors->first('class_error') }}</strong>
	                                    </span>
	                                @endif
			</td>
		</tr>
		<tr>
			<th>Enter year:</th>
			<td>
				<input type="text" name="yaer" >
				@if ($errors->has('year_error'))
	                                    <span class="help-block">
	                                    <img src="{{ URL::asset('error.png') }}">
	                                        <strong>{{ $errors->first('year_error') }}</strong>
	                                    </span>
	                                @endif
			</td>
		</tr>
		<tr>
			<td>
				<input type="reset" class="subUpload" style="background-color:#ffb380" value="Reset">
			</td>
			<td>
				<button class="subUpload" type="submit" name="upload" value="data">
					Upload
				</button>
			</td>
		</tr>
	</table>
</form>
</fieldset>
<br/>
<form>
	<button type="submit" class= "back" formaction="/adminIndex">
				Back
	</button>
</form>
<div id="id_footer">COMPS480F - Web 2.0 Project: A Web-based Course Add/Drop Application</div>
</body>
</html>
