
<html>
	<head>
		<style type="text/css">
		  /* Height & width for the container - The rest is done by the jQuery part. */
		  div[rel='scrollcontent1'] { width: 60%; height: 280px;}
		  
		  /* Basic CSS for the elements - If rel is "scrollcontent1", style its scrollbar by referring to ".scrollcontent-content", ".scrollcontent-bar", etc. */
		  .scrollcontent1-content { /* background: #eee; */ } /* for vertical content, no explicit width is required for inner DIV */
		  .scrollcontent1-bar { width: 11px; background: #fffeda; border-radius: 4px; box-shadow: inset 0px 0px 5px #444444; overflow: hidden; }
		  .scrollcontent1-drag { background: #ad5134; border-radius: 4px; cursor: pointer; }
		  
		  div[rel='scrollcontent2'] { width: 300px; height: 300px; }
		  
		  /* Basic CSS for the elements - If rel is "scrollcontent2", style its scrollbar by referring to ".scrollcontent2-content", ".scrollcontent2-bar", etc. */
		  .scrollcontent2-content { width: 999px; } /* for horizontal content, width should be set to total width of all floated inner container elements */
		  .scrollcontent2-bar { height: 15px; background: #ccc; border-radius: 5px; box-shadow: inset 0px 0px 5px #444444; overflow: hidden; }
		  .scrollcontent2-drag { background: #425a8a; border-radius: 5px; cursor: pointer; }
		  
		  /* Not needed elements */
		  #contentwrap { padding: 5px; border: 1px #444444 solid; display: block; width: 300px; border-radius: 10px; }
		  .scrollcontent1-content p, .scrollcontent2-content p {margin:0; padding:0}
			
		</style>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="jquery.mousewheel.min.js"></script>
		<script src="slickcustomscroll.js"></script>
		<script type="text/javascript">
			$( document ).ready( function() {
				$( "div[rel='scrollcontent1']" ).customscroll( { direction: "vertical" } );
				$( "div[rel='scrollcontent2']" ).customscroll( { direction: "vertical" } );
			});
		</script>
	</head>
	<body>
		<style>
		a img{
			border:0px;
		}
		a{text-decoration:none}
		table{
			border-collapse:collapse;
		}
		#slide_container{
			background:white;height:350px;
			overflow:hidden;
			width:780px;
		}
		#tab_slide td{
			width:780px;background:white;text-align:center;vertical-align:top;
		}
		#tab_slide img{
			cursor:pointer;
		}
		.slide_img{
			width:780px;
		}
		.nav_square{
			padding:0 6px 0 6px;background:red;border-radius:5px;cursor:pointer;
		}
		.nav_text{
			color:red;//font:14px 'trebuchet ms';
			cursor:pointer;font:bold 12px 'helvetica'
		}
		
		
		@font-face {
			font-family: misoBold;
			src: url('fonts/misobold.eot');
			src: local(misoBold), url('fonts/miso-bold.otf') format('opentype');
		}
		@font-face {
			font-family: misolight;
			src: url('fonts/misolight.eot');
			src: local(misolight), url('fonts/miso-light.otf') format('opentype');
		}
		@font-face {
			font-family: miso;
			src: url('fonts/misoregular.eot');
			src: local(miso), url('fonts/miso-regular.otf') format('opentype');
		}
		@font-face {
			font-family: raleway_thin;
			src: url('fonts/raleway_thinwebfont.eot');
			src: local(raleway_thin), url('fonts/raleway_thin-webfont.ttf') format('opentype');
		}
		@font-face {
			font-family: helvetica;
			src: url('fonts/Helvetica.eot');
			src: local(helvetica), url('fonts/Helvetica.otf') format('opentype');
		}
		@font-face {
			font-family: helveticaBold;
			src: url('fonts/HelveticaBold.eot');
			src: local(helveticaBold), url('fonts/Helvetica-Bold.otf') format('opentype');
		}
		
		@font-face {
			font-family: helveticaNarrow;
			src: url('fonts/HelveticaCENarrow.eot');
			src: local(helveticaNarrow), url('fonts/HelveticaCE-Narrow.otf') format('opentype');
		}
		
		li,p{
			text-align:justify;
			text-justify:inter-word;
		}
	</style>
	
	<script type="text/javascript" src="scripts/script.js" ></script>
			
	<div style="position:absolute;top:0;left:0;width:100%;">
	
		<div style="background:#1f1f1f;text-align:center;padding:10px;color:white">
			<input type=image alt="FashionSponge" src="images/logo-small.png" /><br>
			<?php
				$b=$_SERVER['HTTP_USER_AGENT'];
				if($b=="Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; InfoPath.2; .NET CLR 1.1.4322; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; handyCafeCln/3.3.21)")
					$b="ie";
				else
					$b="ch";
			?>	
		</div>	
		<div style="background:#2d2d2d;padding:10px;text-align:center;">
			<div style="width:788px;margin:0 auto;padding:25px;text-align:left;">
				<img src="images/fs-looking.png" /><br><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.fashionsponge.com" target="_"><img src="images/learn.png" title="Learn About FashionSponge" /></a>
			</div>
		</div>
		<div style="background:#202020 url('images/back.png') center bottom no-repeat ;text-align:justify;text-justify:inter-word;">
			<center><img src="images/down-arr.png" /></center><br>
			<div style="width:788px;margin:0 auto;color:white;font:20px helvetica">
			<style>
				span{  
					font:bold 25px helvetica;
				}
			</style>
			<p align=justify>
					<b style='font:40px raleway_thin' >	2012 Worlds Most Stylish Contest Rules</b><br><br><br>
					<span>DESCRIPTION OF CONTEST</span> <br><br>
					<b>“The World's Most Stylish”</b> is a contest that will allow people from all over the world to showcase their styling ability. Over the course of 30 days, the top 25 entrants will upload looks to have them voted and critiqued by the public. This is a skill based contest and chance plays no part in the determination of winners.
					<br><br>
					<span>SPONSOR</span><br><br>
					Sponsor is M3 Innovations LLC, a Florida corporation with principal place of business in Thonotosassa, FL  33592, USA 
					<br><br>
					<span>BINDING AGREEMENT:</span><br><br>
					To enter the contest you must agree to these Official Rules. Please read the following rules prior to entry to ensure you understand and agree. You agree that that submission of an entry to the contest constitutes agreement to the rules. You may not submit an entry to the contest and are not eligible to receive the prizes described in the official rules, unless you agree to the official rules. These official rules form a binding legal agreement between and the contest sponsors with respect to the contest.
					<br><br>
					<span>ACCEPTING ENTRIES PERIOD</span><br><br>
					Entries can be submitted from October 1, 2012 at 12:00 a.m. US Eastern Time to November 26, 2012  11:59:59 p.m. US Eastern Time. By submitting an entry, each entrant agrees to the Official Rules and warrants that his or her entry complies with all requirements set out in the Official Rules.
					<br><br>
					<span>WHO MAY ENTER</span>
					<ol>
						<li>Contest is open only to individuals who have reached the age of majority (16 years of age) in their jurisdiction of residence at the time of entry and who do NOT reside in , Rhode Island, The Province of Quebec, Cuba, Iran, Syria, North Korea, Sudan, Myanmar (Burma), or to other individuals restricted by U.S. export controls and sanctions, and is void in any other nation, state, or province where prohibited or restricted by U.S. or local law. <br><br></li>
						<li>Employees of FashionSponge, selected judges, affiliated companies, advertising and promotion companies, and their immediate family members are not eligible. The term “immediate family member” includes spouse, parent, grandparent, children, siblings, and grandchildren. </li>
					</ol>
					<br><br>
					<span>HOW TO ENTER</span><br><br>
					To enter, visit <a style='color:#fff17a' href="javascript:window.open('http://fashionsponge.com','_blank')" >www.fashionsponge.com</a><br>
					There is only one entry per person. Entry must comply with the following photograph requirements: your name, email address, and photo caption; and submit along with your photograph the instructions that follow:
					<ol>	
						<li>Photograph must be in digital format.  All digital files must be 5 megabytes or smaller, must be in JPEG or JPG format, and must be at least 480 pixels wide if a horizontal image and 480 pixels tall if a vertical image.<br><br></li>
						<li>Photographs must have been taken (1) month before the date of entry and not previously won in any other photography contest or online voting fashion site. Only full body close up shots will be accepted. Any changes to the original photograph not itemized are unacceptable, in which the photograph will be deemed ineligible for a prize.<br><br></li>
						<li>Photographs that include sculptures, statues, paintings, and other works of art will be accepted as long as they do not constitute copyright infringement or fraud; provided entrants must be prepared to provide a release form as described below in "Release."<br><br></li> 
						<li>The photograph and  its entirety must be a single work of original material taken by the entrant. By entering the contest, the entrant represents, acknowledges, and warrants all photographs are original work created solely by the entrant, and does not infringe on the copyrights, trademarks, moral rights, rights of privacy/publicity or intellectual property rights of any person or entity, and that no other party has any right, title, claim, or interest in the photograph.<br><br></li>
						<li>The photograph must not, in the sole and unfettered discretion of the Sponsor, contain obscene, provocative, defamatory, sexually explicit, or otherwise objectionable or inappropriate content.<br><br></li>
					</ol>
					<br><br>
					<span>ELIMINATION</span> <br><br>
					Any false information provided in the context of the contest by any participant concerning identity or ownership of right or non-compliance with these Official Rules or the like may result in the immediate elimination of the participant from the contest. The contest sponsor further reserve the right to disqualify any entry that it believes in its sole and unfettered discretion infringes upon or violates the right of any third party, otherwise does not comply with these Official Rules, or violates U.S. or applicable state or local law.
					<br><br>
					<span>RELEASES</span><br><br>
					If the photograph contains any material or elements that are not owned by the entrant and/or which are subject to the rights of third parties, and/or if any persons appear in the photograph, the entrant is responsible for obtaining, prior to submission of the photograph, any and all releases and consents necessary to permit the exhibition and use of the photograph in the manner set forth in these Official Rules without additional compensation. If any person appearing in any photograph is under the age of majority in their state/province/territory of residence the signature of a parent or legal guardian is required on each release.
					<br>Upon the Sponsor’s request, each entrant must be prepared to provide (within seven (7) calendar days of receipt of Sponsor's request) a signed release from all persons who appear in the photograph submitted, and/or from the owner of any material that appears in the photograph entry, authorizing Sponsor and its licensees ("Authorized Parties") to reproduce, distribute, display, and create derivative works of the entry in connection with the Contest and promotion of the Contest, in any media now or hereafter known. All releases must be in the form provided by Sponsor. Failure to provide such releases upon request may result in disqualification at any time during the Contest and selection of an alternate winner. Similarly, upon Sponsor's request, each entrant must be prepared to provide (within seven (7) calendar days of receipt of Sponsor's request) a signed written license from the copyright owner of any sculpture, artwork, or other copyrighted material that appears in the photograph entry, authorizing any Authorized Party to reproduce, distribute, display, and create derivative works of the entry in connection with the Contest and promotion of the Contest, in any media now or hereafter known. All releases must be in the form provided by Sponsor. Failure to provide such releases upon request may result in disqualification and selection of an alternate winner. Finally, upon Sponsor's request, each entrant must be prepared to provide (within seven (7) calendar days of receipt of Sponsor's request) a signed written license from the owner of any private property included in the photograph entry, authorizing any Authorized Party to reproduce, distribute, display, and create derivative works of the entry in connection with the Contest and promotion of the Contest, in any media now or hereafter known. All releases must be in the form provided by Sponsor. Failure to provide such releases upon request may result in disqualification and selection of an alternate winner. For the purposes of these Official Rules, the entrant will be deemed to be in receipt of Sponsor's request or notification, (a) in the event that Sponsor sends the request by email, five business days after the request was sent by Sponsor.
					<br><br>
					<span>CONTEST PRIZES</span><br><br>
						<ul>
							<li>1st Place winner receives $2,000 USD, 2nd Place winner receives $1,000 USD, and 3rd Place winner receive $500 USD, The winners of the most viral prizes will win $250, $125 and $75 and the entrant photograph will be published on www.FashionSponge.com and www.djddw.com. The 1st place winner, in addition to the 1st Place prizes, being named 2012’s “World's Stylist” which is priceless. A $575 credit towards classes offered by the School of Style, located in either Los Angeles, CA or New York, NY. Trip to the School of Style is not  included. Round-trip air transportation between a major airport near winner’s home and Los Angeles, CA or New York, NY; Hotel accommodations in Los Angeles or New York, NY is not included. The Grand Prize is non-transferable and no cash alternative is available. Potential winners shall be required to sign and return within ten (10) days following an attempted notification, an Affidavit, Declaration or Certificate of Eligibility, Liability Release, and where legally permissible, a Publicity Release and Warranty of Ownership and License in which the entrant warrants that he/she is the owner of the photographs (and all the intellectual property rights in the photograph submitted) and grants to Sponsor and its licensees the irrevocable, perpetual, worldwide non-exclusive license to reproduce, distribute, display, and create derivative works of the entry (along with a name credit) in connection with the Contest and promotion of the Contest without additional compensation. If the prize winner is subject to U.S. taxes, a Form 1099 will be required in January of the following year. Failure to execute and deliver any required documents to Sponsor by the specified deadline may result in disqualification from the Contest, and selection of an alternate potential winner. <br><br></li>
							<li>NONCOMPLIANCE OR RETURN OF PRIZE NOTIFICATION AS UNDELIVERABLE, BY EMAIL, MAY RESULT IN DISQUALIFICATION AND SELECTION OF AN ALTERNATE POTENTIAL WINNER.<br><br></li>
							<li>No prize transfer, assignment, or substitution by winners permitted. If a prize (or part of a prize) is unavailable, the Sponsor, in its discretion, reserves the right to substitute the original prize (or that part of the prize) with an alternative prize to the equal monetary value and/or specification, unless to do so would be prohibited by law.<br><br></li>
						</ul>
					<br>
					<span>JUDGING</span><br><br>
					The entries in will judged separately, in accordance with the Judging Criteria, as defined below. All entries must be submitted and received by November 26, 2012 at 12:00:00 a.m. ET. Proof of submission is not proof of receipt. Sponsor reserves the right to examine the original photograph/source material in order to confirm compliance with these rules. Contest consists of three (3) rounds of evaluation. In Round One, FashionSponge will judge entrants based on the judging criteria selecting the top 50 entrants. In Round Two FashionSponge and guest judges (whom will be independent of Sponsor) (“Judges”) will select judge the (50) entries from among all eligible entries based on the following criteria (“Judging Criteria”): (1) Photography: Visual impact and clarity of photo.(2) Wardrobe: Success in communicating styling ability. (3) Appearance: The presence of the individual (Hair, Make-up, Grooming) (4) Originality: Making a style your own while still showcasing great styling. (5) Consistency: Showcasing great styling, photography, appearance. The entries selected in Round One will proceed to Round Two. In Round Two, the entrants are required to upload a single look everyday to showcase consistent styling to FashionSponge starting December 10, 2012 at 12:00:00 a.m. US Eastern Time until January 9, 2013, 12:00:00 a.m. US Eastern Time (“ET”) In Round Three the judges will be the community. Each selected entrant will have the ability to promote themselves via social networks. After January 9, 2013 12:00 a.m. US Eastern Time. The top three (3) scored entrants from Round Two will be reevaluated by FashionSponge in-house style team. The Judges from FashionSponge style team will select a 1st, 2nd and 3rd place winners based on the Judging Criteria out of the top three entrants. In the event of a tie, the tied entries will be re-submitted to the Judges for a re-judging between the tied entries alone. In the event that a tie remains after re-judging, the entry with the highest score in the creativity criteria will be declared the winner. Winners will be chosen on or around January 12, 2013, and notified by email or their participating social network. Decisions of the judges are final and binding.
					<br><br>
					<span>LICENSE</span><br><br>
					By entering the Contest, all entrants grant an irrevocable, perpetual, worldwide non-exclusive license to Authorized Parties, to reproduce, distribute, display and create derivative works of the entries (along with a name credit) in connection with the Contest and promotion of the Contest, in any media now or hereafter known, including, but not limited to: Display at a potential exhibition of winners; publication of a book featuring select entries in the Contest; publication on FashionSponge.com or any online site highlighting entries or winners of the Contest. Entrants consent to the Sponsor doing or omitting to do any act that would otherwise infringe the entrant’s “moral rights” in their entries. Display or publication of any entry on an Authorized Party’s website does not indicate the entrant will be selected as a winner. Authorized Parties will not be required to pay any additional consideration or seek any additional approval in connection with such use. Additionally, by entering, each entrant grants to Authorized Parties the unrestricted right to use all statements made in connection with the Contest, and pictures or likenesses of Contest entrants, or choose not to do so, at their sole discretion. Authorized Parties will not be required to pay any additional consideration or seek any additional approval in connection with such use.
					<br><br>
					<span>LIMITATION OF LIABILITY</span><br><br>
					By entering this Contest, all entrants agree to release, discharge, and hold harmless FashionSponge and its partners, affiliates, subsidiaries, advertising agencies, agents and their employees, officers, directors, and representatives from any claims, losses, and damages arising out of their participation in this Contest or any Contest-related activities and the acceptance and use, misuse, or possession of any prize awarded hereunder.
					<br>FashionSponge assumes no responsibility for any error, omission, interruption, deletion, defect, or delay in operation or transmission; communications line failure; theft or destruction of or unauthorized access to Contest entries or entry forms; or alteration of entries or entry forms. FashionSponge is not responsible for any problems with or technical malfunction of any telephone network or lines, computer online systems, servers or providers, computer equipment, software, failure of any email entry to be received on account of technical problems or traffic congestion on the Internet or at any website, human errors of any kind, or any combination thereof, including any injury or damage to entrant's' or any other persons' computers related to or resulting from participation, uploading or downloading of any materials related to in this Contest.
					<br>In the case of entrants who are Australian or U.K. residents, the preceding two clauses do not operate in respect of any implied condition or warranty the exclusion of which from these Official Rules would contravene any Australian or U.K. statute or cause any part of these Official Rules to be void.
					<br><br>
					<span>CONDITIONS</span><br><br>
					<b>THIS CONTEST IS VOID WHERE PROHIBITED.</b><br> Entrants agree that this Contest shall be subject to and governed by the laws of Florida and the forum for any dispute shall be in the Florida, United States of America. To the extent permitted by law, the right to litigate, to seek injunctive relief or to make any other recourse to judicial or any other procedure in case of disputes or claims resulting from or on connection with this Contest are hereby excluded and any entrant expressly waives any and all such rights. Certain restrictions may apply. Entries void if the Sponsor determines the photograph to not be an original, or if the entries are illegible, incomplete, damaged, irregular, altered, counterfeit, produced in error or obtained through fraud or theft.
					<br>By entering, entrants also agree (a) to be bound by these Official Rules; (b) that the decisions of the Judges are final and binding with respect to all matters relating to the Contest; and (c) if the entrant wins that Sponsor may use the winning photographs and each winner's name, photograph, likeness, and/or voice in any publicity or advertising relating to the Contest or future promotions without compensation or approval (except where prohibited by law). All federal, state/provincial/territorial, and local taxes, fees and surcharges and taxes (whether foreign or domestic, and including income, sales, and import taxes) on prizes are the sole responsibility of the prize winners. In the event that the selected winner(s) of any prize is/are ineligible, cannot be traced or does/do not respond within ten (10) days to a winner notification as required by the "Contest Prizes" Rules above, or refuses the prize, the prize will be forfeited and Sponsor, in its sole discretion, may choose whether to award the prize to another entrant.
					<br>The Sponsor reserves the right to verify the validity and originality of any entry and/or entrant (including an entrant's identity and address) and to disqualify any entrant who submits an entry that is not in accordance with these Official Rules or who tampers with the entry process. Failure by the Sponsor to enforce any of its rights at any stage does not constitute a waiver of those rights.
					<br><br>
					<span>RIGHT TO CANCEL OR SUSPEND CONTEST</span><br><br>
					If for any reason the Contest is not capable of running as planned, due to infection by computer virus, bugs, worms, trojan horses, denial of service attacks, tampering, unauthorized intervention, fraud, technical failures, or any other causes beyond the control of FashionSponge that corrupt or affect the administration, security, fairness, integrity, or proper conduct of this Contest, FashionSponge reserves the right, at its sole discretion, to disqualify any individual(s) who tamper with the entry process, and/or to cancel, terminate, modify, or suspend the Contest. If Sponsor elects to cancel or terminate the Contest, Sponsor will not retain any rights in the submitted photographs, and will return the fees submitted with each entry.
					<br><br>
					<span>WINNERS LIST</span><br><br>
					Entrants are responsible for complying with these Official Rules. Winners' names will be available online at www.fashionsponge.com on or about January 12, 2013.
					<br><br>
					<span>DATA PRIVACY</span><br><br>
					Entrants agree that personal data, especially name and address, may be processed, shared, and otherwise used for the purposes and within the context of the Contest and any other purposes outlined in these Official Rules. The data may also be used by the Sponsor in order to verify the participant's identity, postal address, and telephone number or to otherwise verify the participant's eligibility to participate in the Contest. Participants have the right to access, review, rectify, or cancel any personal data held by Sponsor by emailing  FashionSponge, at info@fashionsponge.com. Personal data will be used by Sponsor and its affiliates exclusively for the purposes stated herein.
			</p>
			<br><br>
			</div>
		</div>
	</div>
	</body>
</html>


