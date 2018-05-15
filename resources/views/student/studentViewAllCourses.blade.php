<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <style type="text/css">
        .title{
          padding-left: 10px;
          padding-top: 5px;
          float: left;
        }
    			table{
    				border: 3px solid #f1f1f1;
    				padding: 5px ;
    				width:100%;
    			}
          .search{
            border: 2px solid grey;
            padding: 2px ;
            width:50%;
            text-align: right;
            padding-right: 25px;
            font-weight: bold;
          }

          .search tr:hover{
            background-color:#ffffff;
          }
          .search th{
            background-color:#ffffff;
            color: black;
            border-right: 1px solid grey;
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

          .back:hover, button:hover{
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

          #id_footer {
              height: 40px;
              box-sizing: border-box;
              position: relative;;
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
          .back{
            font-size: 12px;
            font-weight: bold;
            background-color: #b3ffb3;
            color: black;
            padding: 10px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 8px;
            margin: 4px 2px;
            cursor: pointer;
          }

          </style>

        <title>Course List</title>
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
      <u id="s2">Course List</u>
      <br/><br/>

      <form action="/viewAllCourses" method="post" >
        {!!csrf_field()!!}
        <table class="search" id="s3">
          <tr>
            <th>
              Search:
            </th>
            <td>
              Year:
              <select name="year">
                <option value="*" selected></option>
                <option value="1" >1</option>
                <option value="2" >2</option>
                <option value="3" >3</option>
                <option value="4">4</option>
              </select>
            </td>
            <td>
              Type:
              <select name="type">
                <option value="*" selected></option>
                <option value="fundamental_elective" >Fundamental Elective</option>
                <option value="core" >Core</option>
                <option value="advanced_elective" >Advanced Elective</option>
                <option value="GE_core">GE Core</option>
              </select>
            </td>
            <td>
              Pre-Req:
              <select name="pre_req">
                <option value="*" selected></option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
            </td>
            <td>
              <input type="submit" value="Submit">
            </td>
            </tr>
            </table>
            </form>
        <br/>
        <table border="1" cellpadding="2" id="s3_1">
          <tr>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Credit Hour</th>
            <th>Type</th>
            <th>Year</th>
            <th>Pre-req</th>

          </tr>



            @foreach ($courseList as $row)
              <tr>
                <td><?= $row -> ccode?></td>
                <td><?= $row -> cname?></td>
                <td><?= $row -> credit_hour?></td>
                <td><?= $row -> type?></td>
                <td><?= $row -> year?></td>
                <td><?= $row -> pre_req?></td>
              </tr>
            @endForeach

        </table>



        <br/>
        <a class ="back" href="/student">Back</a>

        <div id="id_footer">COMPS480F - Web 2.0 Project: A Web-based Course Add/Drop Application</div>
    </body>
</html>
