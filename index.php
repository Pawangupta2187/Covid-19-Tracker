<?php







$url = "https://corona.lmao.ninja/countries";



//call api for all countries

$json = file_get_contents($url);



$data = json_decode($json,true); 

//call api for total case.

$url_total = "https://corona.lmao.ninja/all";


$json_total = file_get_contents($url_total);



$data_total = json_decode($json_total,true); 

  
//bar garph

$dataPoints = array();
	
	/*array("y" => 3373.64, "label" => "Germany" ),
	array("y" => 2435.94, "label" => "France" ),
	array("y" => 1842.55, "label" => "China" ),
	array("y" => 1828.55, "label" => "Russia" ),
	array("y" => 1039.99, "label" => "Switzerland" ),
	array("y" => 765.215, "label" => "Japan" ),
	array("y" => 612.453, "label" => "Netherlands" )
);
*/
$count=0;
       foreach ($data as $key) 
{ $count++;
        array_push($dataPoints, array("y"=> $key['cases'],"label" => substr($key['country'] ,0)       ));//"x"=> $row['Cur_sales']));
        if($count>45)
        	break;
}
?>

<html>

<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-161590291-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-161590291-1');
</script>
	<title>Covid-19 Report</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">





<style type="text/css">

    



    * {

  box-sizing: border-box;

}



.step_for_cure{

  font-family: Montserrat,sans-serif;

  margin: 10px;

  background-image: linear-gradient(90deg, #9274b7, #3b4a8d);

}

.step_for_cure > h1, body > p {

  text-align: center;

}

.step_for_cure > h1 {

  margin: 40px;

  color: #ffffff;

}

.step_for_cure > p {

  font-size: 20px;

  margin-top: 10px;

  margin-bottom: 40px;

}



.card-container {

  display: flex;

}

.card-container .card {

  margin: 20px;

  border-radius: 10px;

  background-color: #ffffff;

  overflow: hidden;

  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4);

}

.card-container .card .card-count-container {

  display: flex;

  align-items: center;

  width: 100%;

  height: 200px;

  padding: 20px 0px;

}

.card-container .card .card-count {

  font-weight: bold;

  font-size: 100px;

  width: 150px;

  height: 150px;

  display: flex;

  align-items: center;

  justify-content: center;

  border-radius: 50%;

  margin: auto;

  margin-right: -50px;

  padding-right: 25px;

  overflow: hidden;

  color: #ffffff;

  box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);

  text-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);

  transition: all 0.2s ease-in-out;

}

.card-container .card .card-content {

  padding: 20px;

  padding-top: 0px;

}

.card-container .card .card-content > h2 {

  margin-top: 0px;

  text-align: center;

}

.card-container .card .card-footer {

  padding: 20px;

  color: #ffffff;

}

.card-container .card:nth-child(1) .card-count, .card-container .card:nth-child(1) .card-footer {

  background-image: linear-gradient(90deg, #f6671f, #c01b1c);

}

.card-container .card:nth-child(2) .card-count, .card-container .card:nth-child(2) .card-footer {

  background-image: linear-gradient(90deg, #fec22f, #ea9826);

}

.card-container .card:nth-child(3) .card-count, .card-container .card:nth-child(3) .card-footer {

  background-image: linear-gradient(90deg, #6fc6a9, #058ba9);

}

.card-container .card:hover .card-count {

  width: 160px;

  height: 160px;

}

@media (max-width: 767px) {

  .card-container {

    flex-wrap: wrap;

  }

}



  </style>



  <!--circle image-->

  <style type="text/css">

  	.caption div {

    box-shadow: 0 0 5px #C8C8C8;

    transition: all 0.3s ease 0s;

}

.img-circle {

    border-radius: 50%;

}

.img-circle {

    border-radius: 0;

}



.ratio {

    background-position: center center;

    background-repeat: no-repeat;

    background-size: cover;



    height: 0;

    padding-bottom: 100%;

    position: relative;

    width: 100%;

}

.img-circle {

    border-radius: 50%;

}

.img-responsive {

    display: block;

    height: auto;

    max-width: 100%;

}

  </style>
<!--script for bar graph-->

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Total Covid'19 Cases "
	},
	axisY: {
		title: "Cases"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

<!----->


</head>

<body>

	<div class="step_for_cure" style="color:#ffffff;padding:10px;margin:0px">

	<h1 style="margin:10px">COVID-19 Tracker</h1>

</div>

	

	<!--<div class="step_for_cure" style="margin:0px;">

		<h1 >Covid-19 Detail</h1>

	</div>-->


<!--table for total cases-->

	<table class="table table-hover  ">

		<thead class="thead-dark">

		<tr >			

			<th scope="col">Total Cases</th>

			<th scope="col">Death</th>

			<th scope="col">Recovered</th>

			<th scope="col">Active</th>

			
		</tr>

	</thead>

	<tbody>

		<tr style="font-weight: bold" >

			<td><?php echo $data_total['cases'] ?></td>

			<td><?php echo $data_total['deaths']  ?></td>

			<td><?php echo $data_total['recovered']  ?></td>

	<td><?php echo $data_total['active']  ?></td>

			

		</tr>

	</tbody>

	</table>


<!---graph -->

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

		<!---->
<!--table for countries data-->
	<table class="table table-hover table-responsive-sm ">

		<thead class="thead-dark">

	<table class="table table-hover table-responsive-sm ">

		<thead class="thead-dark">

		<tr>			

			<th scope="col">Country</th>

			<th scope="col">Cases</th>

			<th scope="col">Today Cases</th>

			<th scope="col">Death</th>

			<th scope="col">Today Death</th>

			<th scope="col">Recovered</th>

			<th scope="col">Active</th>

			<th scope="col">Critical</th>

			<th scope="col">Cases Per Million</th>

		</tr>

	</thead>

	<tbody>

		<tr <?php 

					$count=0;

		 foreach ($data as $row) {

		 $count++;

		 if($count>45)break; ?> >

			<td><?php echo $row['country'] ?></td>

			<td><?php echo $row['cases'] ?></td>

			<td><?php echo $row['todayCases'] ?></td>

			<td><?php echo $row['deaths'] ?></td>

			<td><?php echo $row['todayDeaths'] ?></td>

			<td><?php echo $row['recovered'] ?></td>

			<td><?php echo $row['active'] ?></td>

			<td><?php echo $row['critical'] ?></td>

			<td><?php echo $row['casesPerOneMillion'] ?></td>

			

		</tr <?php   }  ?> >

	</tbody>

	</table>
	

<div class="step_for_cure" style="color:#ffffff;padding:15px">

	<h1>About  COVID-19</h1>



<p>Coronavirus disease (COVID-19) is an infectious disease caused by a new virus.

The disease causes respiratory illness (like the flu) with symptoms such as a cough, fever, and in more severe cases, difficulty breathing. You can protect yourself by washing your hands frequently, avoiding touching your face, and avoiding close contact (1 meter or 3 feet) with people who are unwell.

</p>

<p>HOW IT SPREADS</p>

<p>

Coronavirus disease spreads primarily through contact with an infected person when they cough or sneeze. It also spreads when a person touches a surface or object that has the virus on it, then touches their eyes, nose, or mouth.</p>

</div>



	<div class="step_for_cure">

						<h1> Protect Yourself</h1>



						<div class="card-container">

						  <div class="card">

						    <div class="card-count-container">

						      <div class="card-count">1</div>

						    </div>

						    

						    <div class="card-content">

						      <h2>HandWash</h2>

						      Wash your hands often with soap and water for at least 20 seconds especially after you have been in a public place, or after blowing your nose, coughing, or sneezing.

						    </div>

						    

						    <div class="card-footer">

						        20 Seconds

						    </div>

						  </div>

						  

						  <div class="card">

						    <div class="card-count-container">

						      <div class="card-count">2</div>

						    </div>

						    <div class="card-content">

						      <h2>Avoid Close Contact</h2>

						    Avoid close contact with people who are sick. Put distance between yourself and other people if COVID-19 is spreading in your community. This is especially important for people who are at higher risk of getting very sick.

						    </div>

						    

						    <div class="card-footer">

						        Don't Touch

						    </div>

						  </div>

						  

						  <div class="card">

						    <div class="card-count-container">

						      <div class="card-count">3</div>

						    </div>

						    <div class="card-content">

						      <h2>Stay At Home</h2>

						      Stay home if you are sick, except to get medical care. Learn what to do if you are sick. 

						     

						    </div>

						    

						    <div class="card-footer">

						      Self Quarantine

						    </div>

						  </div>

						  

						</div>







						<div class="card-container">

						<div class="card">

						    <div class="card-count-container">

						      <div class="card-count">4</div>

						    </div>

						    <div class="card-content">

						      <h2>Cover Cough & Sneezes</h2>

						     Cover your mouth and nose with a tissue when you cough or sneeze or use the inside of your elbow.

						    </div>

						    

						    <div class="card-footer">

						        Don't Spread

						    </div>

						  </div>

						  <div class="card">

						    <div class="card-count-container">

						      <div class="card-count">5</div>

						    </div>

						    <div class="card-content">

						      <h2>Wear Facemask</h2>

						      If you are sick: You should wear a facemask when you are around other people (e.g., sharing a room or vehicle) and before you enter a healthcare provider’s office.

						    </div>

						    

						    <div class="card-footer">

						       Simple Mask is required

						    </div>

						  </div>

						  <div class="card">

						    <div class="card-count-container">

						      <div class="card-count">6</div>

						    </div>

						    <div class="card-content">

						      <h2>Clean and Disinfect</h2>

						      Clean & disinfect frequently touched surfaces daily. This includes tables, doorknobs, light switches, countertops, handles, desks, phones, keyboards, toilets, faucets, and sinks.

						    </div>

						    

						    <div class="card-footer">

						        Frequently

						    </div>

						  </div>

						</div>







</div>



<div class="step_for_cure" style="padding: 20px;">

						<h1> Symptoms</h1>

						<p style="text-align: left;font-size: 20px;color:#ffffff">

							These symptoms may appear 2-14 days after exposure (based on the incubation period of MERS-CoV viruses).

						</p>

						<ul style="text-align: left;font-size: 20px;color:#ffffff">

							<li>Fever</li>

							<li>Cough</li>

							<li>Shortness of breath</li>

						</ul>





						<div class="container">

	

    <div class="row" style="align-items: center;">

        <div class="col-sm-3">

            

            <div  class="ratio img-responsive img-circle" style="background-image: url(download.jpg);"></div>

             </div>

     	<div class="col-sm-3">

            

            <div  class="ratio img-responsive img-circle" style="background-image: url(cough.jpg);"></div>

           

        </div>

        <div class="col-sm-3">

            

            <div  class="ratio img-responsive img-circle" style="background-image: url(lungs.jpg);"></div>

           

        </div>



    </div>

						

</div>



</div>

<div class="step_for_cure" style="padding: 20px;">

	<h1>Know More..</h1>

	<div class="row">

			<div class="col-sm-6">

				<div class="embed-responsive embed-responsive-16by9">

				<iframe width="853" height="480" src="https://www.youtube.com/embed/mOV1aBVYKGA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

				</div>

			</div>

			<div class="col-sm-6">

				<div class="embed-responsive embed-responsive-16by9">

				  <iframe width="853" height="480" src="https://www.youtube.com/embed/OOJqHPfG7pA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

				</div>

			</div>



	</div>

	<div class="row" style="margin-top:20px">

			<div class="col-sm-6">

				<div class="embed-responsive embed-responsive-16by9">

				<iframe width="853" height="480" src="https://www.youtube.com/embed/1APwq1df6Mw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

			</div>

			</div>

			<div class="col-sm-6">

				<div class="embed-responsive embed-responsive-16by9">

				  <iframe width="853" height="480" src="https://www.youtube.com/embed/-LKVUarhtvE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

				</div>

			</div>



	</div>



</div>



<div class="step_for_cure"  style="background-color:red;margin:0px;text-align: center;color:white">

	Thankyou For Visit<br>

	Protect Your Self<br>

	<u>References</u><br>

	<a href="https://www.who.int/">https://www.who.int/</a><br>

	<a href="https://github.com/novelcovid/api">https://github.com/novel/api</a><br>

	<a href="https://www.youtube.com/user/who">Who Youtube Channel</a>



</div>



</body>

</html>