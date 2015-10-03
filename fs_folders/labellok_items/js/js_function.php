<script type="text/javascript">
	function remove_space(str){ 
		for (var i = 0; i < str.length; i++) {
			if (str[i]==' ') {
				newstr1 = str.substring(0,i);
				newstr2 = str.substring(i+1,str.length);
				str=newstr1+newstr2;
			};
		};
		return str;
	}

	function provide_hash(str){ 
		var strs;

		if (str.length==0) {
			return '';
		}
		else {  

			 myarr = str.split(",");

			for (var i = 0; i < myarr.length; i++) {
				 strs+=' #'+myarr[i];
			}; 


			 
			return strs.replace('undefined','');
		}
	}	
	function str_convert_to_array_1d(str,split_by){ 
		 myarr_str = str.split(split_by);
		 return myarr_str;
		 // alert(myarr_str);
	}

	function colorname_to_htmlcolorcode(colorname){ 

		if (colorname == 'RustyRed') return '660000';
		if (colorname == 'RedOrange') return 'de6318';
		if (colorname == 'YellowGreen') return 'd3d100';
		if (colorname == 'Peagreen') return '8c8c00';
		if (colorname == 'DarkGreen') return '293206';
		if (colorname == 'Lightblue') return '34e3e5';
		if (colorname == 'LightSeaGreen') return '205260';
		if (colorname == 'Darkblue') return '07194d';
		if (colorname == 'Indigo') return '46008c';
		if (colorname == 'BurgundyBrown') return '33151a'; 
		if (colorname == 'Darkpink') return 'e30e5c'; 
		if (colorname == 'Darkbrown') return '3d1f00';
		if (colorname == 'Espresso') return '5e1800';
		if (colorname == 'Black') return '000000';

		if (colorname == 'Maroon') return '980000';
		if (colorname == 'DarkOrange') return 'ff7f00';
		if (colorname == 'Yellow') return 'ffff00';
		if (colorname == 'Green') return '88ba41';
		if (colorname == 'ForestGreen') return '006700';
		if (colorname == 'Aquablue') return '65f3c9';
		if (colorname == 'Teal') return '318c8c';
		if (colorname == 'Royalblue') return '0033ab';
		if (colorname == 'Purple') return '5e318c';
		if (colorname == 'DarkPurple') return '520f41'; 
		if (colorname == 'HotPink') return 'ff59ac';
		if (colorname == 'Brown') return '8c5e31';
		if (colorname == 'Mocha') return '8c4600';
		if (colorname == 'Charcoal') return '505050';

		if (colorname == 'Red') return 'ff0000';
		if (colorname == 'Orange') return 'ffa000';
		if (colorname == 'Gold') return 'eed54f';
		if (colorname == 'Armygreen') return '778c62';
		if (colorname == 'Green') return '00ae00';
		if (colorname == 'Turquoise') return '77f5a7';
		if (colorname == 'GreyGreen') return '628c8c';
		if (colorname == 'CelestialBlue') return '4a73bd';
		if (colorname == 'Lightpurple') return '77628c';
		if (colorname == 'Violet') return '840e47'; 
		if (colorname == 'Babypink') return 'ef8cae';
		if (colorname == 'RustGold') return '8e7032';
		if (colorname == 'Tan') return 'd1b45b';
		if (colorname == 'DarkGray') return '828283';
		    
		if (colorname == 'DarkRed') return 'e32636';
		if (colorname == 'LightOrange') return 'ffc549';
		if (colorname == 'LightYellow') return 'ffff6d';
		if (colorname == 'OliveGreen') return '8c8c62';
		if (colorname == 'NeonGreen') return '00ff00';
		if (colorname == 'LightBaby Blue') return 'b2ffff';
		if (colorname == 'BlueGrey') return '62778c';
		if (colorname == 'CaputMortuum') return '589ad5';
		if (colorname == 'Brightpurple') return 'ac59ff';
		if (colorname == 'PurpleGrey') return '8c6277'; 
		if (colorname == 'Offwhite') return 'ead0cd';
		if (colorname == 'Pewter') return '8c7762';
		if (colorname == 'Lighttan') return 'e2db9a';
		if (colorname == 'Grey') return 'b5b5b6';
		    
		if (colorname == 'OrangeRed') return 'fa624d';
		if (colorname == 'YellowOrange') return 'ffc898';
		if (colorname == 'LightPink') return 'fff2d3';
		if (colorname == 'Mintgreen') return '96d28a';
		if (colorname == 'LimeGreen') return 'a9ff00';
		if (colorname == 'Lightgreen Blue') return 'd8ffb2';
		if (colorname == 'JuneBud') return 'bdd6bd';
		if (colorname == 'BabyBlue') return 'a1c4e9';
		if (colorname == 'Softpurple') return 'a297e9';
		if (colorname == 'PurplePink') return 'c6a5b6'; 
		if (colorname == 'Lightpink') return 'ffdfef';
		if (colorname == 'Lightbrown') return 'c69c7b';
		if (colorname == 'White') return 'ffffff';
		if (colorname == 'Lightgrey') return 'e7e7e7';
	}
</script>
 