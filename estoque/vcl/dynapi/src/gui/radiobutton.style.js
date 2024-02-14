/*
	DynAPI Distribution
	RadioButtonStyle (Default)

	The DynAPI Distribution is distributed under the terms of the GNU LGPL license.
	
	Requires: StyleManager, RadioButton
*/

function RadioButtonStyle(){
	var style = new Style(); // create basic style object
	style.styleName='RadioButtonStyle';
	style.loadImages = function(){
		if(!this.imageOn) this.imageOn = Styles.getImage('radio_on.gif',13,13);
		if(!this.imageOff) this.imageOff = Styles.getImage('radio_off.gif',13,13);
	};
	// initStyle will act as a function of the DynLayer object
	style.initStyle = function(){
		this.renderStyle();
	};
	// renderStyle will act as a function of the DynLayer object
	style.renderStyle = function(act) {
		var all=!act;
		var img,tbl;
		var id=this.id+'imgrad';
		var ion = this.getStyleAttribute('imageOn');
		var ioff = this.getStyleAttribute('imageOff');
		
		if(all||act=='caption'){
			img='<a tabindex="-1" href="javascript:;" onclick="'+this+'.setSelected(true);return false;">';
			if (this._selected && ion) {
				img+='<img id="'+id+'" name="'+id+'" border=0 src="'+ion.src+'"';
			}else if(ioff){
				img+='<img id="'+id+'" name="'+id+'" border=0 src="'+ioff.src+'"';
			}
			img+=' width="'+ioff.width+'" height="'+ioff.height+'"></a>';
			if(!this._caption) tbl=img;
			else{
				tbl='<table border=0 cellspacing=1 cellpadding=0><tr><td valign="top">'
				+img+'</td><td valign="top"'+((this._nowrap)?' nowrap':'')+'>'
				+'<a href="javascript:;" onclick="'+this+'.setSelected(true);return false;" style="text-decoration:none">'
				+this._getCapHTML()+'</a></td></tr></table>';
			}
			this.setHTML(tbl);
		};		
	};
	return style;	
};

StyleManager.addStyle('RadioButton',RadioButtonStyle);