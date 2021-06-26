<!DOCTYPE html>
<html lang="en">

	<?php include("includes/header.inc"); ?>

      <!--   same code from assignment 1 and 2, changed to php file and used include function to display common basic items such as menu, footer and header -->
<body>

<?php include("includes/menu.inc"); ?>

<article>
	<section class="content">
		<section id="about_1">
			<h1>About me</h1>
			<dl id="myprofile">
                <dt>Name:</dt>						<dd>Duy Phuong Nguyen</dd>
                <dt>Student ID:</dt>					<dd>101204984</dd>
                <dt>Course:</dt>						<dd>Bachelor of Software Engineering</dd>
                <dt>Email:</dt>						<dd><a href="mailto:101204984@student.swin.edu.au">101204984@student.swin.edu.au</a></dd>
                <dt>Tutor:</dt>						<dd>Gamunu Dassanayake</dd>
                <dt>Home Town:</dt>					<dd>Ha Noi, capital city of Vietnam</dd>
                <dt>Favorite TV Series:</dt>			<dd>Game of Thrones</dd>
                <dt>Favorite music artist:</dt>		<dd>Ed Sheeran, Twice</dd>
 			</dl>	

 			<figure id="about_photo">
 				<img src="images/me.jpg" alt="Photo of me" title="Duy Phuong Nguyen">
 			</figure>
		</section>

<section id="about_2">
	<h1>Timetable</h1>

<table>
				<tr>
                    <th></th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                </tr>
                <tr>
                    <th>08:30</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td rowspan="2"><strong>EEE40002</strong><br>Lecture: AGSE202</td>
                </tr>
                <tr>
                    <th>09:30</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>10:30</th>
                  	<td></td>
                  	<td></td>
                    <td></td>
                    <td></td>
                    <td></td>
       
                </tr>
                <tr>
                    <th>11:30</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>12:30</th>
                    <td rowspan="2"><strong>COS30008</strong><br>Lecture: AMDC301</td>
                    <td rowspan="2"><strong>SWE20001</strong><br>Lecture: AMDC301</td>
                    <td rowspan="2"><strong>COS30008</strong><br>Lab: BA603</td>
                    <td></td>
                    <td rowspan="2"><strong>SWE20001</strong><br>Lab: EN301</td>
                </tr>
                <tr>
                    <th>13:30</th>
                    <td></td>
                    

                </tr>
                <tr>
                    <th>14:30</th>
                    <td rowspan="2"><strong>COS10001</strong><br>Lecture: BA302</td>
                    <td rowspan="3"><strong>EEE40002</strong><br>Lab: AD208</td>
                    <td rowspan="2"><strong>COS10001</strong><br>Lab: BA604</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>15:30</th>
                    <td></td>
                    <td></td>

                </tr>
                <tr>
                    <th>16:30</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>17:30</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </table>

</section>


	</section>

	



</article>


<?php include("includes/footer.inc"); ?>

</body>


</html>