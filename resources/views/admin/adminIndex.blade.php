<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
			table{
				border: 3px solid #f1f1f1;
				padding: 5px ;
				width:100%;
			}
			form{
				margin-left: 10px;
			}
			tr{
				border: 2px solid grey;
				text-align: center;
			}
			tr:hover{
				background-color:#cce6ff
			}
			tr:nth-child(even) {
				background-color: #f2f2f2
			}
			th{
				background-color: #99bbff;
    		color: white;
				font-size: 16px;
			}


			.regi_button{
				font-size: 15px;
				font-weight: bold;
				background-color: #ccffe6;
			  color: black;
		    padding: 12px 26px;
		    text-align: center;
		    text-decoration: none;
				display: inline-block;
				border-radius: 8px;
		    margin: 4px 2px;
		    cursor: pointer;
				right: 16px;
				top:120px;
				position: absolute;
			}

			.logout {
				font-size: 12px;
				font-weight: bold;
				background-color: #ffcce0;
			  color: black;
		    padding: 10px 24px;
		    text-align: center;
		    text-decoration: none;
				display: inline-block;
				border-radius: 8px;
		    margin: 4px 2px;
		    cursor: pointer;
				top: 35px;
			  right: 16px;
				position: absolute;
			}

			button:hover{
			    box-shadow: 0 1px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
			}

			#id_header {
					height: 30px;
					box-sizing: border-box;
					position: absolute;
					top: 0;
					width: 100%;
					background-color: #ccccff;
					text-align-last: right;
					padding-top: 2px;
					padding-right: 24px;
					text-align: right;
			}

			.title{
				padding-left: 10px;
				padding-top: 5px;
				float: left;
			}

			#id_footer {
			    height: 40px;
			    box-sizing: border-box;
			    position: fixed;;;
			    bottom: 0;
			    width: 100%;
					background-color: #ccccff;
					padding: 10px;
			}
			h2{
				padding-top: 40px;
				padding-left: 10px;
			}
			u{
				padding-left: 10px;
				font-size: 24px;
				font-weight: bold;
			}
		</style>
		<meta name="_token" content="{!! csrf_token() !!}"/>
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="{{ URL::asset('js/admin.js') }}"></script>
			<script src="{{ URL::asset('js/fontsize.js') }}"></script>
		<title>Admin Index</title>
	</head>
	<body class="msg">
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
		<u id="s2">Student List</u>
		<form>
		<button class="regi_button" type="submit" formaction="/registration" >Add Student</button></form>
		<br/><br/>
		<table cellpadding="5" id="s3">
		<tr>
			<th>Student ID</th>
			<th>Name</th>
			<th>Sex</th>
			<th>Phone Number</th>
			<th>Address</th>
			<th>University</th>
			<th>Subject</th>
			<th>Class</th>
			<th>Year</th>
			<th colspan="2" style="background-color:#3377ff">Action</th>
		</tr>



		@if($array!=null)
			@foreach($array as $array)
					<tr>
						<td><?=$array['student_id']?></td>
						<td><?=$array['first_name']." ".$array['last_name']?></td>
						<td><?=$array['sex']?></td>
						<td><?=$array['phone_number']?></td>
						<td><?=$array['address']?></td>
						<td><?=$array['university']?></td>
						<td><?=$array['subject']?></td>
						<td><?=$array['class']?></td>
						<td><?=$array['year']?></td>
						<td>
						<form method="POST" action="/updateStuData" >
							{!! csrf_field() !!}
							<button class="button" name="stuId" type="submit" value="<?=$array['student_id']?>">Edit</button>
						</form>
						</td>
						<td>
							<button class="button" onclick="getDeleteData('<?=$array['student_id']?>')">
								Delete
							</button>
						</td>
					</tr>
			@endforeach
		@endif


	</table>
	<div id="id_footer">COMPS480F - Web 2.0 Project: A Web-based Course Add/Drop Application</div>
	</body>
</html>
