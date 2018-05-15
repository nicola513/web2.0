<head>
	<style type="text/css">

		form {
		margin:50px 100px ;
		}
		hr {
		background-color: #f0f0f5;
		}
		table{
			border: 3px solid #f1f1f1;
			border-radius: 8px;
			padding: 16px ;
			width:100%;
			font-size: 18px;
		}
		input[type=text],input[type=password]{
   			padding: 10px 15px;
    		margin: 8px 0;
    		width:100%;
    		border: 1px solid #ccc;
    		box-sizing: border-box;
		}

		input[type=submit]:hover{
				box-shadow: 0 1px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
		}

		.help-block img{
			height:20px;
			width:20px;
		}

		u{
			font-size: 26px;
		}

		.col{
			width:20%;
			text-align: right;
			padding-right: 30px;
			font-weight: bold;
		}

		.help-block{
			color:red;

		}

		input[type=submit]{
			  background-color: #ccc;
		    color: black;
		    padding: 10px 28px;
		    margin: 8px 0;
		    border: none;
		    cursor: pointer;
		    width: 100%;
				font-weight: bold;
				font-size: 18px;
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

		#id_footer {
		    height: 40px;
		    box-sizing: border-box;
		    position: absolute;;
		    bottom: 0;
		    width: 100%;
				background-color: #ccccff;
				padding: 10px;
		}

		h2{
			padding-top: 40px;
			padding-left: 100px;
		}
		.title{
		  padding-left: 10px;
		  padding-top: 5px;
		  float: left;
		}

	</style>
	<script src="{{ URL::asset('js/fontsize.js') }}"></script>
</head>
<body>

	<div id="id_header">
		<div class="title">School App/Drop System&nbsp;&nbsp;|&nbsp;&nbsp;
		<a href="/index">index</a></div>
		<a onclick="small_size()"><font size="2">A</font></a>
		<a onclick="medium_size()"><font size="4">A</font></a>
		<a onclick="large_size()"><font size="5">A</font></a>
	</div>
	<h2 id="s1">School App/Drop System</h2>
	<hr/>
	<form method="POST" action="/login">
	{!! csrf_field() !!}
		<table>
			<tr>
				<th colspan="2">
				<u id="s2">	Login </u>
				</th>
			</tr>
			<tr>
				<td colspan="2">
					@if ($errors->has('account_error'))
	                                    <span class="help-block">
	                                    <img src="{{ URL::asset('error.png') }}">
	                                        <strong>{{ $errors->first('account_error') }}</strong>
	                                    </span>
	                                @endif
				</td>
			</tr>
			<tr>
				<td class="col" id="f1">User ID :</td>
				<td>
					<input type="text" name="uid" placeholder="Enter User ID"/>
					@if ($errors->has('uid'))
																				<span class="help-block">
																				<img src="{{ URL::asset('error.png') }}">
																						<strong>{{ $errors->first('uid') }}</strong>
																				</span>
																		@endif</td>
				</td>
			</tr>
			<tr>
				<td colspan="2">

				</td>
			</tr>
			<tr>
				<td class="col" id="f2">Password :</td>
				<td>
					<input type="password" name="password" placeholder="Enter Password">
					@if($errors->has('password'))
	                                    <span class="help-block">
	                                    <img src="{{ URL::asset('error.png') }}">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Login"></td>
			</tr>
			</table>
	</form>

	<footer id="id_footer">
		COMPS480F - Web 2.0 Project &nbsp;
			Group Member: &nbsp;
			NG Tsz Ching Nicola (s11535522)&nbsp;
			KWOK Pui Hei (s11512858)&nbsp;
			LIU Ka Kin (s11516857)&nbsp;

	</footer>
</body>
