<html>
<head>
	<title>School Add/Drop System</title>
  <style>
    table{
      table-layout: fixed;
      width: 100%;
      text-align: center;
      border: 1px solid #ccc;
    }
    body{
      padding: 20px;
    }
  </style>
</head>
<body>
<div style="text-align:center;"><h1>Web 2.0 Project (2016-17 Fall Semester)</h1></div>
<div style="text-align:center;"><h1>Title: School Add/Drop System</h1></div>
<div style="text-align:center;"><p>Kwok Pui Hei, Ng Tsz Ching Nicola, and Liu Ka Kin</p></div>
<div style="text-align:center;"><p>BSc. Web Tech Year 4 student, Open University of Hong Kong</p></div>

<h2><u>Web 2.0 technologies:</u></h2>
<h3>Software as a Service</h3>

<p>Admin does not need to install any application. They just need to upload the CSV document which about student information and the website will help they to create a new XML document to save the data per student.

Also, students can share the course information in facebook if they interested on this course.</p>

<h3>Asynchronous Particle Update</h3>

<p>When the student selects the type of the course in the searching box, the courses available table will change to searching result. Another thing, if student add/drop course success, the student course table will also update the result.

Those functions are achieved by AJAX.</p>

<h3>Synchronized Web</h3>

<p>All students can read the course quote in the courses available table at the same time. If the course quote has any changing like student add/drop this course, this course's quote will be updated in another student browser immediately.</p>

<h3>Persistent Right Management</h3>

<p>Admin has the CRUD (Create, Read, Update, Delete) right on student information in the admin page. They allow to change or create a new student information record.</p>

<h3>Structured Information</h3>

<p>Student profile is stored in the XML format document. So, the website can get the precise student information within the document.</p>

<h3>Mashup</h3>

<P>The student can read school announcement in an RSS reader and timetable which is in content on the same page.</P>
<h2><u>How to use:</u></h2>
<table cellpadding="5" border="1">
  <tr>
    <td>
      <figcaption>Login Page</figcaption>
      <img src="{{ URL::asset('captures/login.jpg') }}" alt="Login" height="300" width="500">
      <p>User should enter their user id and password on this page</p>
    </td>
    <td>
      <figcaption>Student List</figcaption>
      <img src="{{ URL::asset('captures/admin_main.jpg') }}" alt="view student profile" height="300" width="500">
      <p>Student list will be shown in Admin main page</p>
    </td>
  </tr>
  <tr>
    <td>
      <figcaption>Updata Student data</figcaption>
      <img src="{{ URL::asset('captures/update_form.jpg') }}" alt="update student profile" height="300" width="500">
      <p>Admin can edit or delete a student record when they have action</p>
    </td>
    <td>
      <figcaption>Create Student</figcaption>
      <img src="{{ URL::asset('captures/create_form.jpg') }}" alt="add student profile" height="300" width="500">
      <p>Admin can create a new student record by filling a form or upload a file</p>
    </td>
  </tr>
  <tr>
    <td>
      <figcaption>Student Information</figcaption>
      <img src="{{ URL::asset('captures/student_view_profile.jpg') }}" alt="view own profile" height="300" width="500">
      <p>Student can view their own profile but not edit</p>
    </td>
    <td>
      <figcaption>Student Timetable</figcaption>
      <img src="{{ URL::asset('captures/student_main.jpg') }}" alt="view own time" height="300" width="500">
      <p>Student main page will show the timetable for student</p>
    </td>
  </tr>
  <tr>
    <td>
      <figcaption>Recommend Course</figcaption>
      <img src="{{ URL::asset('captures/facebook.jpg') }}" alt="recommond on facebook" height="300" width="500">
      <p>Student can recommend course on facebbook if they enrolled that course</p>
    </td>
    <td>
      <figcaption>School Announcement</figcaption>
      <img src="{{ URL::asset('captures/announ.jpg') }}" alt="view school announcement" height="300" width="500">
      <p>School Announcement will be shown in student main page</p>
    </td>
  </tr>
  <tr>
    <td>
      <figcaption>Add Course</figcaption>
      <img src="{{ URL::asset('captures/add.jpg') }}" alt="add course" height="300" width="500">
      <p>Student can add the course after you are confirm the message</p>
    </td>
    <td>
      <figcaption>Drop Course</figcaption>
      <img src="{{ URL::asset('captures/drop.jpg') }}" alt="credit hour" height="300" width="500">
      <p>Student can drop the course after you are confirm the message</p>
    </td>
  </tr>
  <tr>
    <td>
      <figcaption>Select Category</figcaption>
      <img src="{{ URL::asset('captures/select.jpg') }}" alt="add filter to add" height="300" width="500">
      <p>Student can select the desired category to view the course list.</p>
    </td>
    <td>
      <figcaption>Alert 1: Course no quota</figcaption>
      <img src="{{ URL::asset('captures/no_quota.jpg') }}" alt="alert: no quota" height="300" width="500">
      <p>When the course have not quota, an alert box will show the error message.</p>
    </td>
  </tr>
  <tr>
    <td>
      <figcaption>Alert 2: Student not enough credit hour</figcaption>
      <img src="{{ URL::asset('captures/no_credit.jpg') }}" alt="alert: not enough credit hour" height="300" width="500">
      <p>When the requried credit hour of the course is larger than user's remaining credit hour, an alert box will show the error message.</p>
    </td>
    <td>
      <figcaption>Alert 3: Course already exist</figcaption>
      <img src="{{ URL::asset('captures/already.jpg') }}" alt="course already exist" height="300" width="500">
      <p>When the course you want to add is already enroll, an alert box will show the error message.</p>
    </td>
  </tr>
</table>
</body>
</html>
