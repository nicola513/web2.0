<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <title>View Courses</title>
        <style type="text/css">
        table{
          border: 3px solid #f1f1f1;
          padding: 5px ;
          width:100%;
        }
        .search{
          border: 2px solid grey;
          padding: 2px ;
          width:40%;
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

        .action:hover, .back:hover, button:hover{
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

        .action{
          font-size: 12px;
          font-weight: bold;
          background-color: #3377ff;
          color: white;
          padding: 8px 20px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          border-radius: 8px;
          margin: 4px 2px;
          cursor: pointer;
        }
        .reload{
          background-image:reload.png;
          display: inline-block;
          border-radius: 8px;
          margin: 4px 2px;
          cursor: pointer;
          float: right;
          background-color: inherit;

        }
				.title{
				  padding-left: 10px;
				  padding-top: 5px;
				  float: left;
				}
				.creditInfo{
					border: 0;
          width:25%;
					text-decoration: none;
				}
				.creditInfo th{
						color: black;
						background-color: white;
					  text-align: right;
					  padding-right: 25px;
					  font-weight: bold;
				}

				.creditInfo td{
					border: none;
					text-align: left;
				}
				tr:hover{
					background-color:#fff
				}
				.creditInfo tr:nth-child(even) {
					background-color: #fff
				}


        </style>
				<script src="{{ URL::asset('js/fontsize.js') }}"></script>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>

        	function confirmDropCourse(anchor)
                {
                    var conf = confirm('Are you sure want to drop this course?');
                    if(conf){
                       window.location=anchor.attr("href");
                       $.ajax({
                          type:'GET',
                          url:'/updateCredit',
                          data:'_token = <?php echo csrf_token() ?>',
                          success:function(data){
                             $("#credit").html(data.credit);
                          }
                       });
                    }
                 };

            $('')

            function confirmAddCourse(ccode){
            var course_code = ccode
            if (confirm("Are you sure want to add "+course_code+" course?"))
                {
                     $.ajax({
                         type:'POST',
                         url:'getQuota',
                         data:{data:ccode},
                         success:function(data){
                              console.log(data.quota_value);
                              checkQuota(data.quota_value,data.hour,ccode);
                          }

                      });
               console.log('sendCourse function finished');
                }
            };

            function checkQuota(quota_value,hour,ccode){
               console.log('The quota is '+quota_value);
               console.log('The hour is '+hour);
               if(quota_value==0){
                    alert("No quota of this course!");
                  }else{
                    if(hour==0){
                      alert("You have no credit hour! ");
                    }else{
                      $.ajax({
                        type:'POST',
                        url:'getCourseHour',
                        data:{data:ccode},
                        success:function(data){
                          if(hour-data.credit_hour<0){
                            alert("You have not enough credit hour!");
                          }else{
                           checkHasCourse(ccode);
                          }
                        }
                      });
                    }

            }
          };

          function checkHasCourse(ccode){
              console.log('I am in add course ' + ccode);
              $.ajax({
                        type:'POST',
                        url:'hasClass',
                        data:{data:ccode},
                        success:function(data){
                          if(data.hasClass==null){
                            console.log('no Class');
                            addCourse(ccode);
                          }else{
                            alert("You enroll this course already! Or this time slot have class already!");
                          }
                        }
                      });
          }

          function addCourse(ccode){
            console.log('I am in add course ' + ccode);
              $.ajax({
                         type:'POST',
                         url:'addCourse',
                         data:{data:ccode},
                         success:function(data){
                          }

                      });

											window.location.reload();
          };

        $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

			window.onload = function(){
              var word = 'hour';
              $.ajax({
                        type:'POST',
                        url:'getStuHour',
                        data:{data: word},
                        success:function(data){
                           console.log(data.hour);
                           document.getElementById("credit").innerHTML = data.hour;
                        }
                      });
              };

        </script>
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
      <u id="s2">Enrollment information</u>
      <br/><br/>
			<table class="creditInfo">
				<tr>
					<th>Enrollment Status:</th>
					<td>In Progress</td>
				</tr>
				<tr>
					<th>Total credit hour:</th>
					<td>15</td>
				</tr>
				<tr>
					<th>Remaining credit hour:</th>
					<td><div id="credit">0</div></td>
				</tr>
			</table>

      <hr/>

      <u id="s2_1">My Course</u>
      <br/><br/>
      <table cellpadding="2" border="1">
        <tr>
          <th>Course Code</th>
          <th>Course Name</th>
          <th>Lecturer</th>
          <th>Day</th>
          <th>Class</th>
          <th>Lab</th>
          <th>Start time</th>
          <th>End time</th>
          <th>Campus</th>
          <th>Room</th>
          <th style="background-color:#3377ff">Action</th>
        </tr>

        <?php

          foreach ($timetable as $row) { ?>

            <tr>
              <td><?= $row -> ccode?></td>
              <td><?= $row -> cname?></td>
              <td><?= $row -> lecturer?></td>
              <td><?= $row -> day?></td>
              <td><?= $row -> class?></td>
              <td><?= $row -> lab?></td>
              <td><?= $row -> start_time?></td>
              <td><?= $row -> end_time?></td>
              <td><?= $row -> campus?></td>
              <td><?= $row -> room?></td>
              <td><a class ="action" onclick='javascript:confirmDropCourse($(this));return false;' href="/dropCourse?ccode=<?= $row -> ccode?>">Drop</a></td>
            </tr>

        <?php  } ?>
      </table>

      <br/>
      <hr/>


      <u id="s2_2">Courses Available </u>
      <br/><br/>
      <form action="/viewCoursesAvailable" method="post" >
        {!!csrf_field()!!}
        <table class="search">
          <tr>
            <th>
              Search:
            </th>
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
              <input type="submit" value="Submit" >
            </td>
            </tr>
            </table>
            </form>
            <br/>

            <button type="button" onclick="javascript:location.href='/updatePage'" class="reload"><img src="reload.png" style="width:20px;height:20px;"></button>

        <table cellpadding="2" border="1">
          <tr>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Credit Hour</th>
            <th>Class</th>
            <th>Day</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Campus</th>
            <th>Room</th>
            <th>Lecturer</th>
            <th>Type</th>
            <th>Year</th>
            <th>Quota</th>
            <th>Pre-req</th>
            <th>Actions</th>
          </tr>

            @foreach ($courseList as $row)
              <tr>
                <td><?= $row -> ccode?></td>
                <td><?= $row -> cname?></td>
                <td><?= $row -> credit_hour?></div></td>
                <td><?= $row -> class?></td>
                <td><?= $row -> day?></td>
                <td><?= $row -> start_time?></td>
                <td><?= $row -> end_time?></td>
                <td><?= $row -> campus?></td>
                <td><?= $row -> room?></td>
                <td><?= $row -> lecturer?></td>
                <td><?= $row -> type?></td>
                <td><?= $row -> year?></td>
                <td><?= $row -> quota?></div></td>
                <td><?= $row -> pre_req?></td>
                <td><button class ="action" onclick="confirmAddCourse('<?= $row -> ccode?>')" >Add</button></td>

              </tr>
            @endForeach

        </table>
        <br/>
        <a class="back"href="/student">Back</a>
        <br/>
        <div id="id_footer">COMPS480F - Web 2.0 Project: A Web-based Course Add/Drop Application</div>
</body>
</html>
