<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Student Main Page</title>
        <style type="text/css">
          table{
            border: 3px solid #f1f1f1;
            padding: 5px ;
            width:100%;
          }
          tr{
            padding: 2px;
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
          .re{
            font-size: 12px;
            font-weight: bold;
            background-color: #1a1aff;
            color: white;
            padding: 5px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 8px;
            margin: 4px 2px;
            cursor: pointer;
          }
          .option {
            font-size: 14px;
            font-weight: bold;
            color: black;
            padding: 10px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 8px;
            margin: 4px 2px;
            cursor: pointer;
          }
          .sp{
            background-color: #d5ff80;
          }
          .cl{
            background-color: #d699ff;
          }
          .ad{
            background-color: #ffc299;
          }

          .re:hover, a:hover, button:hover{
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
              position: fixed;
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

          .content{
            padding-left: 5px;
            position: absolute;
            float: left;
            padding-right: 25%;
          }
          .announcement{
            background-color: #e6ffe6;
            border: 2px solid #f0f0f5;
            border-radius: 8px;
            padding: 8px;
            margin-left:75%;
            position: absolute;
            float: right;
          }
          .title{
            padding-left: 10px;
            padding-top: 5px;
            float: left;
          }
        </style>
        <script src="{{ URL::asset('js/fontsize2.js') }}"></script>
    </head>
    <body>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId      : '592577770938052',
            xfbml      : true,
            version    : 'v2.8'
          });
        };
      </script>
      <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=592577770938052";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>

      <div id="id_header">
        <div class="title">School App/Drop System</div>
  			<a onclick="small_size()"><font size="2">A</font></a>
  			<a onclick="medium_size()"><font size="4">A</font></a>
  			<a onclick="large_size()"><font size="5">A</font></a>
  		</div>
  		<h2 id="s1">Welcome, {{Session::get('name')}} ({{Session::get('uid')}})</h2>
  		<form><button  class="logout" type="submit" formaction="/logout" id="logout">Logout</button></form>
  		<hr/>
  		<br/>

      <div class="content">
        <a href="/studentProfile" class="option sp" id="sp" >Student Profile</a>

        <a href="/viewAllCourses" class="option cl" id="cl">Course List</a>

        <a href="/viewCoursesAvailable" class="option ad" id="ad">Add/Drop Courses</a>
        <br/><br/>
      <u id="s2">My Timetable</u>
      <br/><br/>
        <table cellpadding="2" border="1" id="s3">
          <tr>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Lecturer</th>
            <th>Day</th>
            <th>Start time</th>
            <th>End time</th>
            <th>Campus</th>
            <th>Room</th>
            <th>Recommend</th>
          </tr>

          <?php

            foreach ($timetable as $row) { ?>

              <tr>
                <td><?= $row -> ccode?></td>
                <td><?= $row -> cname?></td>
                <td><?= $row -> lecturer?></td>
                <td><?= $row -> day?></td>
                <td><?= $row -> start_time?></td>
                <td><?= $row -> end_time?></td>
                <td><?= $row -> campus?></td>
                <td><?= $row -> room?></td>
                <td><input class="re" type="submit" onclick="postToFeed('<?= $row -> ccode?>')" value="Yes"/></td>
              </tr>

          <?php  } ?>
        </table>
        <br/>

        </div>
        <div class="announcement" >
          <h3 id="announ">School Announcement</h3>
          <iframe src="ajax" height="350"></iframe>
        </div>

        <div id="id_footer">COMPS480F - Web 2.0 Project: A Web-based Course Add/Drop Application</div>

        <script>function postToFeed(ccode) {
          var obj = {
            method: 'feed',
            link: 'https://www.ouhk.edu.hk',
            description: 'I recommend this course - '+ccode+' to you!',
            name: 'Recommendation: '+ccode
          };
           FB.ui(obj);
         };
        </script>
    </body>
</html>
