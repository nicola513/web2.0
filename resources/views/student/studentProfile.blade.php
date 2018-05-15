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
		<h2 id="s1">Welcome, {{Session::get('name')}} ({{Session::get('uid')}})</h2>
		<form><button  class="logout" type="submit" formaction="/logout">Logout</button></form>
		<hr/>
		<br/>
		<fieldset>
			<legend class="sp"><div id="s2">My Information</div></legend>


    <table>
      <tr>
        <th>Student ID:</th>
        <td>
          <div class="myinfo"><?=$data['student_id']?></div>
        </td>
      </tr>
      <tr>
        <th>First Name:</th>
        <td>
          <div class="myinfo"><?=$data['first_name']?></div>
        </td>
      </tr>
      <tr>
        <th>Last Name:</th>
        <td>
          <div class="myinfo"><?=$data['last_name']?></div>
        </td>
      </tr>
      <tr>
        <th>Sex:</th>
        <td>
          <div class="myinfo"><?=$data['sex'] ?></div>
        </td>
      </tr>
      <tr>
        <th>Phone Number:</th>
        <td>
          <div class="myinfo"><?=$data['phone_number']?></div>
        </td>
      </tr>
      <tr>
        <th>Address:</th>
        <td>
          <div class="myinfo"><?=$data['address']?></div>
        </td>
      </tr>
      <tr>
        <th>University:</th>
        <td>
          <div class="myinfo"><?=$data['university']?></div>
        </td>
      </tr>
      <tr>
        <th>Subject:</th>
        <td>
          <div class="myinfo"><?=$data['subject']?></div>
        </td>
      </tr>
      <tr>
        <th>Class:</th>
        <td>
          <div class="myinfo"><?=$data['class']?></div>
        </td>
      </tr>
      <tr>
        <th>Enter year:</th>
        <td>
          <div class="myinfo"><?=$data['year']?></div>
        </td>
      </tr>

    </table>
	</fieldset>
<br/>
    <a class ="back" href="/student">Back</a>

	<div id="id_footer">COMPS480F - Web 2.0 Project: A Web-based Course Add/Drop Application</div>

	</body>
</html>
