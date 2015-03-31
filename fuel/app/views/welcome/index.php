<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Schoolcom Report</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::js('jscolor/jscolor.js'); ?>
	<?php echo Asset::js('script.js'); ?>
	<?php echo Asset::js('dropzone/dropzone.js'); ?>
	
	<style>
		#parent{
			float:left;
		}
		.page{
			/*background-color: black !important;
			color:white;*/
			
			
		}
		#control{
			float: right;
			
		}
		#property_control{
			display: none
		}
		
	</style>
</head>
<body style="background-color:red !important">
	<div id="parent">
		
		
	</div>
	<div id='control'>
		<button id="add_page">Add Page</button>
		<div id="property_control">
			<button data-position='Top' class='decrease' id="top_decrease">Top -</button><br/>
			<button data-position='Top' class='increase' id="top_increase">Top +</button><br/>
			<button data-position='Bottom' class='increase' id="bottom_increase">Bottom +</button><br/>
			<button data-position='Bottom' class='decrease' id="bottom_decrease">Bottom -</button><br/>
			<button data-position='Right' class='increase' id="right_increase">Right increase</button><br/>
			<button data-position='Right' class='decrease' id="right_decrease">Right decrease</button><br/>
			<button data-position='Left' class='increase' id="left_increase">Left increase</button><br/>
			<button data-position='Left' class='decrease' id="left_decrease">Left decrease</button><br/>	
			<select id='type_selector'>
			<option value='margin'>	Margin</option>
			<option value='padding'>Padding</option>
			<option value='border'>Border</option>
			</select><br/>
			Text Transform:<select id='text_style_selector'>
			<option value='initial'>Initial</option>
			<option value='capitalize'>Capitalize</option>
			<option value='uppercase'>Uppercase</option>
			<option value='lowercase'>Lowercase</option>
			</select><br/>
			<button  id="font_increase">Font increase</button><br/>
			<button  id="font_decrease">Font decrease</button><br/>
			Font Color:<input id="font_color" class='color' /><br/>
			Background Color:<input id="background_color" class='color' /><br/>
			Border Color:<input id="border_color" class='color' /><br/>
			Border Style:<select id='border_style'>
			<option value='solid'>Solid</option>
			<option value='dotted'>Dotted</option>
			<option value='dashed'>Dashed</option>
			<option value='double'>Double</option>
			<option value='groove'>Groove</option>
			<option value='ridge'>Ridge</option>
			<option value='inset'>Inset</option>
			<option value='double'>Outset</option>
			</select><br/>
			<div id='background_dropzone'>Drag or Click here to upload background image</div>
			<div id='previews' style="display:none"></div>
		</div>
	</div>
<script>


	
	var select='';
	
	createObject = function(){
		
		var element = this;
		select = new manipulate_element(element);
		$('#property_control').style.display = 'block';
		
	}
	//Variable to store interval
	var interval;
	//Binding Events to Controller

	var increaseClass = document.getElementsByClassName("increase");
	console.log(increaseClass)
	for(i=0;i<increaseClass.length;i++){
		increaseClass[i].addEventListener('mousedown',function(){
			position = this.getAttribute('data-position');
			interval = setInterval(function(){
				select.increaseSize(position)},100)
		});
		increaseClass[i].addEventListener('mouseup',function(){
			clearInterval(interval)
		});
	}
	var decreaseClass = document.getElementsByClassName("decrease");
	for(i=0;i<decreaseClass.length;i++){
		decreaseClass[i].addEventListener('mousedown',function(){
			position = this.getAttribute('data-position');
			interval = setInterval(function(){
				select.decreaseSize(position)},100)
		});
		decreaseClass[i].addEventListener('mouseup',function(){
			clearInterval(interval)
		});
	}
	//Event listeners for font size increase and decrease
	document.getElementById("font_increase").addEventListener('mousedown',function(){
		interval = setInterval(function(){
			select.increaseFont()},100);
	});
	document.getElementById("font_increase").addEventListener('mouseup',function(){
		clearInterval(interval);
	});
	document.getElementById("font_decrease").addEventListener('mousedown',function(){
		interval = setInterval(function(){
			select.decreaseFont()},100);
	});
	document.getElementById("font_decrease").addEventListener('mouseup',function(){
		clearInterval(interval);
	});
	document.getElementById("type_selector").addEventListener('change',function(){
		select.sbm = this.options[this.selectedIndex].value;
	});
	document.getElementById("border_style").addEventListener('change',function(){
		select.bs = this.options[this.selectedIndex].value;
		select.style.setProperty('border-style',select.bs,'important');
	});
	document.getElementById("text_style_selector").addEventListener('change',function(){
		select.style.textTransform = this.options[this.selectedIndex].value;
	});
	document.getElementById("font_color").addEventListener('change',function(){
		select.style.setProperty('color','#'+this.value,'important');
	});
	document.getElementById("background_color").addEventListener('change',function(){
		select.style.setProperty('background-color','#'+this.value,'important');
	})
	document.getElementById("border_color").addEventListener('change',function(){
		select.bc = '#'+this.value;
		select.style.setProperty('border-color','#'+this.value,'important');
	})








	//////////////////////////Code to add elements///////////////////////////////
	document.getElementById("add_page").addEventListener('click',function(){
		var element = document.createElement('div');
		element.style.width = '742px';
		element.style.height = '1050px';
		element.style.backgroundColor = '#000000';
		element.className = 'page';
		element.innerHTML = 'hello';
		$("#parent").appendChild(element);
		element.onclick = createObject;
	})

	//query selector

	var $ = function (selector) {
	  return document.querySelector(selector);
	};


	//Dropzone

	var myDropzone = new Dropzone("#background_dropzone", { 
		url: "customize/upload",
		previewsContainer: "#previews",
		success: function(file, response){
		      var output = JSON.parse(response);
		      console.log(output);
		      select.style.removeProperty('background-color');
		      select.style.setProperty('background-image','url('+output['filename']+')','important');
		                  //console.log(response);
		    }
		});
</script>
</body>
</html>
