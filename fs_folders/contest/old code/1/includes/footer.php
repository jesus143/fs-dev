<div id="footer">
        <div class="colcontainer">
           <div class="col1">
               <h3>BE THE FIRST</h3>
               <p>Join a fashion community of<br/> tastemakers and creators.<br/> FashionSponge is an<br/> environment of diverse and<br/> unrehearsed fashion inspiration. </p>
           </div>
           <div class="col2">
           

               <form name="myForm" action="index.php" onsubmit="return validateForm()" method="post">
               <input type="text" value="NAME" onfocus="if(this.value  == 'NAME') { this.value = ''; } " onblur="if(this.value == '') { this.value = 'NAME'; } " name="name" id="name" />
               <input type="text" value="E-MAIL" onfocus="if(this.value  == 'E-MAIL') { this.value = ''; } " onblur="if(this.value == '') { this.value = 'E-MAIL'; } " name="email" id="email" />
               <input type="text" value="WEBSITE" onfocus="if(this.value  == 'WEBSITE') { this.value = ''; } " onblur="if(this.value == '') { this.value = 'WEBSITE'; } " name="website" id="website" />
               <input type="submit" value="" name="submit" id="pop" />
               </form>

              
           </div>
        </div>
        <div style="clear:both;"></div>    
	<p><?php echo $footer ?></p>
</div> <!-- end #footer -->