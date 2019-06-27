<?php
$PageID = 4;
include('include/header.php');
?>
<div class="container">
			<div class="top-text">
				<h3>
					Our industry has been around for a long time, and with that has come some standards for how STUDIO BASIC practices. Although technology and material lead to occasional changes, but the general principles stay the same. The most important thing to understand is that getting a project designed and built is a process, it takes time.<span> Decisions are not made all at once, but throughout the course of a project.</span>
				</h3>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-2 col-lg-2 offer-d3">
					<h1 id="flex-line"><br>WHAT WE OFFER</h1>
				</div>
				<div class="col-12 col-md-10 col-lg-10 offer-margin">
					<h3 class="vl3 ">
				 		<p>
				 			<ul id="text-ul-style2"><li>We are organized, personable and easy to work with. We guide you through the process and adapt to your needs. We are readily <span>accessible by phone and email </span> throughout the project.</li>
				 			</ul> 
				 		</p> 
				 		<p>
				 			<ul id="text-ul-style2"><li>We work with a <span> talented team who understands and shares our goals.</span> This includes our in-house interior design team, as well as strong collaborations with contractors, landscape architects, metal fabricators, wood workers and concrete fabricators</li>
				 			</ul> 
				 		</p> 
				 		<p>
				 			<ul id="text-ul-style2"><li><span>3d renderings </span> provide a virtual tour of how a project will look throughout the design process and when complete. This ensures that everyone involved has the same shared vision</li>
				 			</ul>
				 		</p>
				 	</h3>
				</div>
			</div>		 	
		 </div>
		 <div class="container">
		 	<div class="Standard-line">
			 	<h3>
					<span>Standard phases bring an order to the design process.</span> Each phase has a purpose and a level of expectation. In general the phases are sequential and you will sign off on the completion of each phase, permitting the project to move forward based on the decisions made up to that point. The time frame to complete each phase varies depending on the complexity of your project. 
				</h3>
			</div>	
		 </div>
		 <div class="container">
		 	<div class="phase">
				<h3>Here are the five phases:</h3>
			</div>
		 </div>
		 <div class="container">
		 	<div class="hide_contents">
				<div class="bgcontent-text">
					<button class="tablink" onclick="openPage('Home', this, 'gray')" id="defaultOpen">Conceptual Design</button><br>
					<div id="Home" class="tabcontent">
					  <p>GOAL: RESEARCH AND DETERMINE THE OWNER’S CRITERIA FOR THE PROJECT FEE BREAKDOWN: ~15% OF TOTAL FEE
						</p>
					</div>
					<button class="tablink" onclick="openPage('News', this, 'gray')" >Schematic Design</button><br>
					<div id="News" class="tabcontent">
					  <p>GOAL: EXPLORE DESIGN CONCEPTS. PRESENT OPTIONS AND NARROW DOWN TO ONE PREFERRED CONCEPT. FEE BREAKDOWN: ~10% OF TOTAL FEE
						</p> 
					</div>
					<button class="tablink" onclick="openPage('Contact', this, 'gray')">Design Development</button><br>
					<div id="Contact" class="tabcontent">
					  <p>GOAL: REFINE & DEVELOP DESIGN SO MOST MAJOR DECISIONS ARE MADE. PRELIMINARY LAYOUT OF STRUCTURAL & MECHANICAL SYSTEMS.
						FEE BREAKDOWN: ~20% OF TOTAL FEE
						</p>
					</div>
					<button class="tablink" onclick="openPage('About', this, 'gray')">Construction Drawings</button><br>
					<div id="About" class="tabcontent">
					  <p>GOAL: SELECT FINISHES & FIXTURES AND PREPARE TECHNICAL DRAWINGS REQUIRED FOR CONSTRUCTION.
						FEE BREAKDOWN: ~30% OF TOTAL FEE
						</p>
					</div>
					<button class="tablink" onclick="openPage('Abouts', this, 'gray')">	Construction Admin</button><br>
		  
					<div id="Abouts" class="tabcontent">
					  <p>GOAL: OBSERVE CONSTRUCTION FOR CONSISTENCY W/ CONSTRUCTION DOCS. ANSWER CONTRACTOR QUESTIONS, RESOLVE DESIGN DETAILS, HANDLE CHANGES.
						FEE BREAKDOWN: ~25% OF TOTAL FEE
 
						</p>
					</div>
				</div>
			</div>
		</div>

<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<?php
include('include/footer.php');
?>

<script type="text/javascript" src="jsapp/contactus.js?t=<?=time()?>"></script>